<?php

namespace Alura\Cursos\Entity;

use Alura\Cursos\Exceptions\DescricaoInvalidaException;

/**
 * @Entity
 * @Table(name="formacoes")
 */
class Formacao implements
    \JsonSerializable
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $descricao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $descricaoArray = preg_split('/\s/', $descricao);

        if (!isset($descricaoArray[1])) {
            throw new DescricaoInvalidaException();
        }

        $this->descricao = $descricao;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'descricao' => $this->descricao
        ];
    }
}
