<?php

namespace App\Command;

class Ping
{
    private $commandTime;

    public function __construct()
    {
        $this->commandTime = time();
    }

    public function getCommandTime()
    {
        return $this->commandTime;
    }
}
