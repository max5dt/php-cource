<?php

namespace MyApp\Logger;

interface LoggerInterface
{
    public function err(string $message): void;

    public function warn(string $message): void;

    public function info(string $message): void;
}
