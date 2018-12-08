<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lovingOne;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="players")
     * @ORM\JoinColumn(nullable=false)
     */
    private $role;

    /**
     * @ORM\Column(type="integer")
     */
    private $lifePoints;

    /**
     * @ORM\Column(type="integer")
     */
    private $bonusDamage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasWin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hasStartedGame;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $action;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $round;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Monster", cascade={"persist"})
     */
    private $enemy;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lastDamage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lastBonus;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lastHeal;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Monster", cascade={"persist", "remove"})
     */
    private $lastEnemy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasSlainEnemy;

    public function __construct()
    {
        $this->hasStartedGame = false;
        $this->bonusDamage = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLovingOne(): ?string
    {
        return $this->lovingOne;
    }

    public function setLovingOne(string $lovingOne): self
    {
        $this->lovingOne = $lovingOne;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getLifePoints(): ?int
    {
        return $this->lifePoints;
    }

    public function setLifePoints(int $lifePoints): self
    {
        $this->lifePoints = $lifePoints;

        return $this;
    }

    public function getBonusDamage(): ?int
    {
        return $this->bonusDamage;
    }

    public function setBonusDamage(int $bonusDamage): self
    {
        $this->bonusDamage = $bonusDamage;

        return $this;
    }

    public function getHasWin(): ?bool
    {
        return $this->hasWin;
    }

    public function setHasWin(?bool $hasWin): self
    {
        $this->hasWin = $hasWin;

        return $this;
    }

    public function getHasStartedGame(): ?bool
    {
        return $this->hasStartedGame;
    }

    public function setHasStartedGame(bool $hasStartedGame): self
    {
        $this->hasStartedGame = $hasStartedGame;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(?string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getRound(): ?int
    {
        return $this->round;
    }

    public function setRound(?int $round): self
    {
        $this->round = $round;

        return $this;
    }

    public function getEnemy(): ?Monster
    {
        return $this->enemy;
    }

    public function setEnemy(?Monster $enemy): self
    {
        $this->enemy = $enemy;

        return $this;
    }

    public function getLastDamage(): ?int
    {
        return $this->lastDamage;
    }

    public function setLastDamage(?int $lastDamage): self
    {
        $this->lastDamage = $lastDamage;

        return $this;
    }

    public function getLastBonus(): ?int
    {
        return $this->lastBonus;
    }

    public function setLastBonus(?int $lastBonus): self
    {
        $this->lastBonus = $lastBonus;

        return $this;
    }

    public function getLastHeal(): ?int
    {
        return $this->lastHeal;
    }

    public function setLastHeal(?int $lastHeal): self
    {
        $this->lastHeal = $lastHeal;

        return $this;
    }

    public function getLastEnemy(): ?Monster
    {
        return $this->lastEnemy;
    }

    public function setLastEnemy(?Monster $lastEnemy): self
    {
        $this->lastEnemy = $lastEnemy;

        return $this;
    }

    public function getHasSlainEnemy(): ?bool
    {
        return $this->hasSlainEnemy;
    }

    public function setHasSlainEnemy(?bool $hasSlainEnemy): self
    {
        $this->hasSlainEnemy = $hasSlainEnemy;

        return $this;
    }
}
