<?php

namespace Alura\Cursos\Controller;

use Psr\Http\Server\RequestHandlerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class Deslogar implements
    RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        session_destroy();
        return new Response(302, ['Location' => '/login']);
    }
}
