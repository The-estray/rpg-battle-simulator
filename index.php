<?php
require_once 'classes/arena.php';

$warrior = new Warrior('Гладиатор', 300, 45, 75, 32);
$boss = new Boss('Свет', 400, 40, 60);

$arena = new Arena($warrior, $boss);
$arena->startFight();
