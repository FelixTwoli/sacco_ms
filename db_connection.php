<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
->withServiceAccount('saccos-e2ae2-firebase-adminsdk-jel67-74cfcf34fa.json')
->withDatabaseUri('https://saccos-e2ae2-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();

