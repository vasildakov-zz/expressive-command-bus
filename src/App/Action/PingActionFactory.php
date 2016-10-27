<?php

namespace App\Action;

use Interop\Container\ContainerInterface;
use League\Tactician\CommandBus;

class PingActionFactory
{
    /**
     * @param  ContainerInterface $container
     * @return PingAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $commandBus = $container->get(CommandBus::class);

        return new PingAction($commandBus);
    }
}
