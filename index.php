<?php

require 'vendor/autoload.php';

use App\Calculator\DistanceCalculator;

$calculator = new DistanceCalculator();

var_dump("Для 305 км, ціна подорожі складе: ".$calculator->calculate(305)." zł");
var_dump("Для 123 км, ціна подорожі складе: ".$calculator->calculate(123)." zł");
var_dump("Для 1 км, ціна подорожі складе: ".$calculator->calculate(1)." zł");
var_dump("Для 55 км, ціна подорожі складе: ".$calculator->calculate(55)." zł");
var_dump("Для 455 км, ціна подорожі складе: ".$calculator->calculate(455)." zł");
var_dump("Для 333 км, ціна подорожі складе: ".$calculator->calculate(333)." zł");
var_dump("Для 500 км, ціна подорожі складе: ".$calculator->calculate(500)." zł");
var_dump("Для 250 км, ціна подорожі складе: ".$calculator->calculate(250)." zł");
var_dump("Для 111 км, ціна подорожі складе: ".$calculator->calculate(111)." zł");
var_dump("Для 10 км, ціна подорожі складе: ".$calculator->calculate(10)." zł");
var_dump("Для 23 км, ціна подорожі складе: ".$calculator->calculate(23)." zł");
var_dump("Для 343 км, ціна подорожі складе: ".$calculator->calculate(343)." zł");