<?php 
require_once 'Character.php';

class Warrior extends Character{
    protected int $critChance;

    public function __construct(string $name, int $health, int $attackPower, int $defense, int $critChance)
    {
        parent::__construct($name, $health, $attackPower, $defense);
        $this->critChance = $critChance;
    }

    public function attack(object $target): string
    {
        if ($this->critChance >= rand(1,100)) {
            $attackPower = $this->attackPower * 2;
            $damage = $target->takeDamage($attackPower);
            return "💥 КРИТИЧЕСКИЙ УДАР! {$this->name} сокрушает {$target->getName()} на {$damage} урона!";
        }
        else return parent::attack($target);
    }
}

$warrior = new Warrior('Alex',100,50,50,40);
$warrior1 = new Warrior('Gor',100,50,50,40);

echo $warrior->attack($warrior1) . "\n";
echo $warrior->attack($warrior1) . "\n";
echo $warrior->attack($warrior1) . "\n";