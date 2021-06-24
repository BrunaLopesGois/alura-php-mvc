<?php

use Alura\Cursos\Entity\Formacao;
use Alura\Cursos\Infra\EntityManagerCreator;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Defines application features from the specific context.
 */
// @codingStandardsIgnoreStart
class FormacaoNoBanco implements Context
{
    // @codingStandardsIgnoreEnd

    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var int
     */
    private $idFormacaoInserida;

    /**
     * @Given que estou conectado ao banco de dados
     */
    public function queEstouConectadoAoBancoDeDados()
    {
        $this->em = (new EntityManagerCreator)->getEntityManager();
    }

    /**
     * @When eu tento salvar uma nova formação com a descrição :arg1
     */
    public function euTentoSalvarUmaNovaFormacaoComADescricao(string $descricaoFormacao)
    {
        $formacao = new Formacao();
        $formacao->setDescricao($descricaoFormacao);

        $this->em->persist($formacao);
        $this->em->flush();

        $this->idFormacaoInserida = $formacao->getId();
    }

    /**
     * @Then se eu buscar no banco, devo encontrar essa formação
     */
    public function seEuBuscarNoBancoDevoEncontrarEssaFormacao()
    {
        /**
         * @var \Doctrine\Persistence\ObjectRepository $repositorio
         */
        $repositorio = $this->em->getRepository(Formacao::class);
        /**
         * @var Formacao $formacao
         */
        $formacao = $repositorio->find($this->idFormacaoInserida);

        assert($formacao instanceof Formacao);
    }
}
