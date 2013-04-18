<?php
require 'PrimeVerify.php';

$number = $argv[1];

$verify = new PrimeVerify($number);

echo 'Number "' . $number . '" ' . ($verify->isPrime() ? 'is' : 'isn\'t') . ' prime';

;
?>
