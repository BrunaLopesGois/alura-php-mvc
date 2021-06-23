<?php

namespace Alura\Cursos\Exceptions;

use DomainException;

class DescricaoInvalidaException extends DomainException
{
    public function __construct()
    {
        parent::__construct('Descrição precisa ter pelo menos 2 palavras');
    }
}
