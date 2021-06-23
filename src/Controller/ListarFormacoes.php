<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Formacao;
use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarFormacoes implements
    RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;

    private $repositorioDeFormacoes;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeFormacoes = $entityManager
            ->getRepository(Formacao::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('formacoes/listar-formacoes.php', [
            'formacoes' => $this->repositorioDeFormacoes->findAll(),
            'titulo' => 'Lista de Formações'
        ]);

        return new Response(200, [], $html);
    }
}
