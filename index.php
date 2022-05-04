<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

//error_reporting(0);

$stdoutLogger = new \MyApp\Logger\StdoutLogger();
$fileLogger = new \MyApp\Logger\FileLogger(__DIR__ . '/log.txt');

(new \MyApp\Tasks\BinarySum($fileLogger))->binarySum('1', '');

(new \MyApp\Tasks\BinarySum($fileLogger))->binarySum('1', '2');

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
