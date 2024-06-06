<?php

// run ni -- composer require --dev phpunit/phpunit
// if dh download, run ./vendor/bin/phpunit RpnCalculatorTest.php
function factorial($n) {
    if ($n == 0) return 1;
    return $n * factorial($n - 1);
}

function rpn_calculate($expression) {
    $stack = [];
    $tokens = explode(' ', $expression);
    
    foreach ($tokens as $token) {
        if (is_numeric($token)) {
            array_push($stack, $token);
        } else {
            switch ($token) {
                case '+':
                    $b = array_pop($stack);
                    $a = array_pop($stack);
                    array_push($stack, $a + $b);
                    break;
                case '-':
                    $b = array_pop($stack);
                    $a = array_pop($stack);
                    array_push($stack, $a - $b);
                    break;
                case '*':
                    $b = array_pop($stack);
                    $a = array_pop($stack);
                    array_push($stack, $a * $b);
                    break;
                case '/':
                    $b = array_pop($stack);
                    $a = array_pop($stack);
                    array_push($stack, $a / $b);
                    break;
                case 'sqrt':
                    $a = array_pop($stack);
                    array_push($stack, sqrt($a));
                    break;
                case '^':
                    $b = array_pop($stack);
                    $a = array_pop($stack);
                    array_push($stack, pow($a, $b));
                    break;
                case '!':
                    $a = array_pop($stack);
                    array_push($stack, factorial($a));
                    break;
                default:
                    return "Invalid operator";
            }
        }
    }
    
    return array_pop($stack);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $expression = $_POST['expression'];
    echo rpn_calculate($expression);
}
?>
