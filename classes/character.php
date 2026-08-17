<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Character{
    public string $name;
    protected int $health;
    protected int $maxHealth;
    protected int $attackPower;
    protected int $defense;

    public function __construct(string $name, int $health, int $attackPower, int $defense)
    {
        $this->name = $name;
        $this->health = $health;
        $this->attackPower = $attackPower;
        $this->defense = $defense;
        $this->maxHealth = $health;
    }

    public function takeDamage(int $rawDamage)
    {
        if ($this->defense >= $rawDamage) {
            $this->defense -= $rawDamage;
            return 0;
        }

        elseif ($this->defense < $rawDamage) {
            $rawDamage -= $this->defense;
            $this->defense = 0;
            if ($this->health >= $rawDamage) {
                $this->health -= $rawDamage;
                return $rawDamage;
            } else {
                $this->health = 0;
                return $rawDamage;
            }
        }
    }

    public function isAlive() : bool
    {
        if ($this->health > 0) return true;
        return false;
    }

    public function attack(object $target): string
    {
        $damage = $target->takeDamage($this->attackPower);
        return "{$this->name} attacked {$target->getName()}, {$this->name} dealt {$damage} damage to {$target->getName()}";
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHealth()
    {
        return $this->health;
    }

    public function getMaxHealth()
    {
        return $this->maxHealth;
    }
}
