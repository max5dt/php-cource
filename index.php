<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$ex = new \MyApp\Tasks\FizzBuzz();

try {
    echo ($ex->fizzBuzz(1.4, 16)) . PHP_EOL;
} catch (\TypeError $e) {
    echo "Type mismatch". PHP_EOL;
}  catch (\InvalidArgumentException $e) {
    echo $e->getMessage();
} catch (\Throwable $e) {
    echo 'Global exception'. $e->getMessage(). PHP_EOL;
}
