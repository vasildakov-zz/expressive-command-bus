<?php

namespace App\Action;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use League\Tactician\CommandBus;
use App\Command\Ping as PingCommand;

class PingAction
{
    /**
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param  ServerRequestInterface $request
     * @param  ResponseInterface      $response
     * @param  callable|null          $next
     * @return JsonResponse
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = null)
    {
        $pingCommand = new PingCommand();

        $time = $pingCommand->getCommandTime();

        $this->commandBus->handle($pingCommand);

        return new JsonResponse(['ack' => $time]);
    }
}
