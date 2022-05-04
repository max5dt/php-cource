<?php

namespace MyApp\Logger;

class FakeLogger extends AbstractLogger
{
    private string $lastMessage;

    protected function log(string $message): void
    {
        $this->lastMessage = $message;
    }

    public function getLastMessage(): string
    {
        return $this->lastMessage;
    }
}
