<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

error_reporting(0);

$config = require __DIR__ . '/config.php';

$loggerFactory = new \MyApp\Logger\LoggerFactory($config);
$logger = $loggerFactory->createLogger();

(new \MyApp\Tasks\BinarySum($logger))->binarySum('1', '10');
(new \MyApp\Tasks\BinarySum($logger))->binarySum('1', '');
(new \MyApp\Tasks\BinarySum($logger))->binarySum('1', '2');

(new \MyApp\Tasks\Fibonacci($logger))->fib(7);

exit;

$ex = new \MyApp\Tasks\BinarySum();

try {
    echo ($ex->binarySum("10", "1")) . PHP_EOL;
} catch (\TypeError $e) {
    echo "Type mismatch" . PHP_EOL;
} catch (\InvalidArgumentException $e) {
    echo $e->getMessage();
} catch (\Throwable $e) {
    echo 'Global exception' . $e->getMessage() . PHP_EOL;
}
