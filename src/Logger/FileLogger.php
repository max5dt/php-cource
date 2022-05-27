<?php

namespace MyApp\Logger;

class FileLogger extends AbstractLogger
{
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    protected function log(string $message): void
    {
        file_put_contents($this->filename, $message . PHP_EOL, FILE_APPEND);
    }
}
