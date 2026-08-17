<?php
require_once 'Character.php';

class Mage extends Character{
    protected int $mana;
    protected int $spellCost;

    public function __construct(string $name, int $health, int $attackPower, int $defense, int $mana, int $spellCost)
    {
        parent::__construct($name, $health, $attackPower, $defense);
        $this->mana = $mana;
        $this->spellCost = $spellCost;
    }

    public function attack(object $target): string
    {
        if ($this->mana >= $this->spellCost) {
            $this->mana -= $this->spellCost;
            $attackPower = round($this->attackPower * 1.5);
            $damage = $target->takeDamage($attackPower);
            return "🔮 ФАЕРБОЛ! {$this->name} сжигает {$target->getName()} на {$damage} урона! Осталось маны: {$this->mana}";
        } else {
            $damage = $target->takeDamage($this->attackPower);
            return "{$this->name} наносит удар посохом {$target->getName()} на {$damage} урона!";
        }
    }
}
