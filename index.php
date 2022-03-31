<?php
declare(strict_types=1);

require 'src/Tasks/FizzBuzz.php';

$ex = new \MyApp\Tasks\FizzBuzz();

try {
    echo ($ex->fizzBuzz(0.5, 16)) . PHP_EOL;
} catch (\TypeError $e) {
    echo "Type mismatch". PHP_EOL;
}  catch (\InvalidArgumentException $e) {
    echo $e->getMessage();
} catch (\Throwable $e) {
    echo 'Global exception'. $e->getMessage(). PHP_EOL;
}

exit;
