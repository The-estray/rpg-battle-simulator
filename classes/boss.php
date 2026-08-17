<?php 
require_once 'character.php';

class Boss extends Character{
    protected bool $isEnraged = false;

    public function __construct(string $name, int $health, int $attackPower, int $defense)
    {
        parent::__construct($name, $health, $attackPower, $defense);
    }

    public function takeDamage(int $rawDamage)
    {
        $damage = parent::takeDamage($rawDamage);

        if (!$this->isEnraged && $this->health <= $this->maxHealth * 0.5) {
            $this->isEnraged = true;
            $this->attackPower *= 2;
            return $damage;
        } else return $damage;
    }

    public function attack(object $target): string
    {
        $damage = $target->takeDamage($this->attackPower);

        if ($this->isEnraged) {
            return "💀 БОСС В ЯРОСТИ! {$this->name} сокрушает {$target->getName()} на {$damage} урона!";
        } else{
            return "Босс наносит удар {$target->getName()} на {$damage} урона!";
        }
    }
}