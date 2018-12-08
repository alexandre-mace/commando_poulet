<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Domain\Character;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MonsterRepository")
 */
class Monster extends Character
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lastDamage;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $attackNames = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct($array)
    {
        $this->number = $array['number'];
        $this->name = $array['name'];
        $this->damage = $array['damage'];
        $this->lifePoints = $array['lifePoints'];
        if (array_key_exists('attackNames', $array)) {
            $this->attackNames = $array['attackNames'];
        }
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

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

    public function getAttackNames(): ?array
    {
        return $this->attackNames;
    }

    public function setAttackNames(?array $attackNames): self
    {
        $this->attackNames = $attackNames;

        return $this;
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
}
