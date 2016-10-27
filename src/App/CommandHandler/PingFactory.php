<?php

namespace App\CommandHandler;

use Interop\Container\ContainerInterface;

class PingFactory
{
    /**
     * @param  ContainerInterface $container
     * @return Ping
     */
    public function __invoke(ContainerInterface $container)
    {
        $logPath = './data/log/ping-command.log';

        return new Ping($logPath);
    }
}
