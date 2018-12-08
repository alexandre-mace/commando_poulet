<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 05/12/18
 * Time: 19:35
 */

namespace Domain;


use App\Entity\Monster;
use App\Entity\Player;
use App\Entity\Role;
use App\Entity\Round;

class GameSystem
{
    public function process(Player $player, Monster $monster)
    {
        switch ($player->getAction()) {
            case Action::ATTACK:
                $this->attack($player, $monster);
                break;
            case Action::UPGRADE:
                $this->upgrade($player);
                break;
            case Action::HEAL:
                $this->heal($player);
                break;
            case Action::LEAVE:
                $this->leave();
                break;
        }
        $this->getAttacked($player, $monster);
    }
    public function playerDamageCalculator(Player $player)
    {
        $roleDamage = $player->getRole()->getDamage();
        $bonusDamage = $player->getBonusDamage() ?? 0;
        return rand($roleDamage, (($roleDamage + 1/3 * $roleDamage) + $bonusDamage));
    }
    public function monsterDamageCalculator(Monster $monster)
    {
        $monsterDamage = $monster->getDamage();
        return rand($monsterDamage, (($monsterDamage + 1/3 * $monsterDamage)));
    }
    public function bonusCalculator(Role $role)
    {
        $roleDamage = $role->getDamage();
        $bonus = 0;
        $luck = rand(0, 2);
        if ($luck >= 1) {
            $bonus = rand(0, $roleDamage);
        }
        return $bonus;
    }
    public function healCalculator(Monster $monster)
    {
        $monsterDamage = $monster->getDamage();
        $heal = rand(0, $monsterDamage * 2);
        return $heal;
    }
    public function attack(Player $player, Monster $monster)
    {
        $damage = $this->playerDamageCalculator($player);
        $player->setLastDamage($damage);
        $player->getEnemy()->setLifePoints($monster->getLifePoints() - $damage);
        if ($monster->getLifePoints() < 1) {
            $player->setHasSlainEnemy(true);
            $this->enemyDied($player, $monster);
        } else {
            $player->setHasSlainEnemy(false);
        }
    }
    public function getAttacked(Player $player, Monster $monster)
    {
        $damage = $this->monsterDamageCalculator($monster);
        $player->getEnemy()->setLastDamage($damage);
        $player->setLifePoints($player->getLifePoints() - $damage);
    }
    public function upgrade(Player $player)
    {
        $bonus = $this->bonusCalculator($player->getRole());
        $player->setLastBonus($bonus);
        $player->setBonusDamage($player->getBonusDamage() + $bonus);
    }
    public function heal(Player $player)
    {
        $heal = $this->healCalculator($player->getEnemy());
        $player->setLastHeal($heal);
        $player->setLifePoints($player->getLifePoints() + $heal);
    }
    public function enemyDied(Player $player, Monster $monster)
    {
        $player->setLastEnemy($player->getEnemy());
        if ($monster->getNumber() < 5) {
            $player->setEnemy(new \App\Entity\Monster(\Domain\Monster::MONSTERS[$monster->getNumber() + 1]));
        } elseif ($monster->getNumber() === 5) {
            $player->setHasWin(true);
        }
    }
}
