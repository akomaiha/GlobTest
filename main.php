<?php

### Question 1
/*
 * c'est une fonction qui fusionne plusieurs intervalles et les trie en ordre croissant
 */


### Question 2
/*
 * pour tester, exécuter php main.php avec une version de php >= 7
 */
require_once __DIR__.'/src/Interval.php';

$intervals = readline('entrer votre liste des intervalles (ex : [[0, 3], [6, 10]]): ');
$interval = new Interval();

$result = $interval->foo(json_decode($intervals));

echo 'result: ' . $result;


### Question 3
// 2h30
