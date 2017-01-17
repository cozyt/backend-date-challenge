<?php 
require __DIR__ . '/vendor/autoload.php';

$difference = \Vice\Challenge\Era::diff('2016-01-23', '2017-12-22');

print_r($difference);

print PHP_EOL;

print('In Years: ' . $difference->getDifferenceInYears() . PHP_EOL);
print('In Months: ' . $difference->getDifferenceInMonths() . PHP_EOL);
print('In Days: ' . $difference->getDifferenceInDays() . PHP_EOL);
print('In Total Days: ' . $difference->getTotalDifferenceInDays() . PHP_EOL);
