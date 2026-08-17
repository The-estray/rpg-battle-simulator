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
        echo "⚔️ ДА НАЧНЕТСЯ БИТВА: {$this->fighter1->getName()} ПРОТИВ {$this->fighter2->getName()}! ⚔️\n";
        usleep(800000);

        while ($this->fighter1->isAlive() && $this->fighter2->isAlive()) {
            echo "\n=== РАУНД {$this->round} ===\n";
            usleep(500000);
            echo $this->fighter1->attack($this->fighter2) . "\n";
            usleep(500000);

            if (!$this->fighter2->isAlive()) {
                break;
            }

            echo $this->fighter2->attack($this->fighter1) . "\n";
            usleep(500000);
            $this->round++;
        }

        echo "\n==============================\n";
        usleep(500000);
        if ($this->fighter1->isAlive()) {
            echo "🏆 ПОБЕДИЛ {$this->fighter1->getName()}!\n";
        } else {
            echo "🏆 ПОБЕДИЛ {$this->fighter2->getName()}!\n";
        }
        echo "==============================\n";
    }
}