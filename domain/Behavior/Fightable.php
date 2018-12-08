<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 04/12/18
 * Time: 21:36
 */

namespace Domain\Behavior;

use Doctrine\ORM\Mapping as ORM;

trait Fightable
{
    /**
     * @ORM\Column(type="integer")
     */
    protected $lifePoints;

    /**
     * @ORM\Column(type="integer")
     */
    protected $damage;

    public function getLifePoints(): ?int
    {
        return $this->lifePoints;
    }

    public function setLifePoints(int $lifePoints): self
    {
        $this->lifePoints = $lifePoints;

        return $this;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): self
    {
        $this->damage = $damage;

        return $this;
    }
}