<?php

// @codingStandardsIgnoreStart

use Alura\Cursos\Entity\Formacao;
use Alura\Cursos\Exceptions\DescricaoInvalidaException;
use Behat\Behat\Context\Context;

class FormacaoEmMemoria implements Context
{
    // @codingStandardsIgnoreEnd

    /**
     * @var Formacao
     */
    private $formacao;
    /**
     * @var string
     */
    private $mensagemDeErro = '';
    
    /**
     * @When eu tentar criar uma formação com a descrição :arg1
     */
    public function euTentarCriarUmaFormacaoComADescricao(string $descricaoFormacao)
    {
        $this->formacao = new Formacao();
        
        try {
            $this->formacao->setDescricao($descricaoFormacao);
        } catch (DescricaoInvalidaException $error) {
            $this->mensagemDeErro = $error->getMessage();
        }
    }

    /**
     * @Then eu vou ver a seguinte mensagem de erro :arg1
     */
    public function euVouVerASeguinteMensagemDeErro(string $mensagemDeErro)
    {
        assert($mensagemDeErro === $this->mensagemDeErro);
    }

    /**
     * @Then eu devo ter uma formação criada com a descrição :arg1
     */
    public function euDevoTerUmaFormacaoCriadaComADescricao(string $descricaoFormacao)
    {
        assert($this->formacao->getDescricao() === $descricaoFormacao);
    }
}
