<?php

namespace App\CommandHandler;

use App\Command\Ping as PingCommand;

class Ping
{
    private $logPath;

    public function __construct($logPath)
    {
        $this->logPath = $logPath;
    }

    public function __invoke(PingCommand $pingCommand)
    {
        $commandTime = $pingCommand->getCommandTime();

        file_put_contents($this->logPath, $commandTime . PHP_EOL, FILE_APPEND);
    }
}
