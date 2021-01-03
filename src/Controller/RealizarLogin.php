<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

class RealizarLogin extends ControllerComHtml implements InterfaceControladorRequisicao
{
    private $repositorioUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioUsuarios = $entityManager
            ->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );
        if (is_null($email) || $email === false) {
            $titulo = "E-mail";
            require __DIR__ . '/../../view/alerta.php';
            return;
        }

        $senha = filter_input(
            INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING
        );

        /** @var Usuario usuario **/

        $usuario = $this->repositorioUsuarios
            ->findOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)) {
            $titulo = "E-mail ou senha";
            require __DIR__ . '/../../view/alerta.php';
            return;
        }
        session_start();
        $_SESSION['logado'] = true;

        header('Location: /listar-cursos');
    }
}
