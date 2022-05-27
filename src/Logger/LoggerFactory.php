<?php

namespace MyApp\Logger;

class LoggerFactory
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function createLogger(): LoggerInterface
    {
        if ($this->config['logger'] === 'stdout') {
            return new StdoutLogger();
        }

        if ($this->config['logger'] === 'file') {
            return new FileLogger($this->config['filename']);
        }

        throw new \Exception('Unable to create logger');
    }
}
