<?php
require_once 'character.php';
require_once 'boss.php';
require_once 'mage.php';
require_once 'warrior.php';

class Arena{
    protected Character $fighter1;
    protected Character $fighter2;
    protected int $round = 1;

    public function __construct(Character $fighter1, Character $fighter2)
    {
        $this->fighter1 = $fighter1;
        $this->fighter2 = $fighter2;
    }

    public function startFight()
    {
        while ($this->fighter1->isAlive() && $this->fighter2->isAlive()) {
            echo "\n=== РАУНД {$this->round} ===\n";
            echo $this->fighter1->attack($this->fighter2);
            if ($this->fighter2->isAlive()) {
                echo $this->fighter2->attack($this->fighter1);
                $this->round++;
            }
            else {
                break;
            }
        }

        if ($this->fighter1->isAlive()) {
            echo "Победил {$this->fighter1->getName()}🎉\n";
        } else {
            echo "Победил {$this->fighter2->getName()}🎉\n";
        }
    }
}