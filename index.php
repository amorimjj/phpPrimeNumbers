<?php
require_once 'PrimeVerify.php';
require_once 'PrimeGenerator.php';

$number = $argv[1];

$generator = new PrimeGenerator(new PrimeVerify());

$generator->generateUntil($number);

;
?>
