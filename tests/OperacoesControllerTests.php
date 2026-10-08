<?php

namespace ProjetoIntegraOMatematica\Test;

use ProjetoIntegraOMatematica\Controller\OperacoesController;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;


class OperacoesControllerTests extends TestCase 
{
    private OperacoesController $controller;

    protected function setUp(): void
    {
        $this->controller = new OperacoesController();
    }


    public function testSomaDeMatrizesValidas(): void
    {
        $a = [[1, 2], [3, 4]];
        $b = [[5, 6], [7, 8]];
        $this->assertEquals([[6, 8], [10, 12]], $this->controller->somar($a, $b));
    }

    public function testSomaMatrizUmaPorUma(): void
    {
        $this->assertEquals([[10]], $this->controller->somar([[3]], [[7]]));
    }

    public function testSomaDimensoesIncompativeisLancaExcecao(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->controller->somar([[1, 2]], [[1, 2], [3, 4]]);
    }

    public function testMultiplicacaoMatrizesValidas(): void
    {
        $a = [[1, 2], [3, 4]];
        $b = [[2, 0], [1, 2]];
        $this->assertEquals([[4, 4], [10, 8]], $this->controller->multiplicar($a, $b));
    }

    public function testMultiplicacaoMatrizIdentidade(): void
    {
        $a = [[4, 9], [2, 1]];
        $identidade = [[1, 0], [0, 1]];
        $this->assertEquals($a, $this->controller->multiplicar($a, $identidade));
    }

    public function testMultiplicacaoMatrizNula(): void
    {
        $a = [[4, 9], [2, 1]];
        $nula = [[0, 0], [0, 0]];
        $this->assertEquals([[0, 0], [0, 0]], $this->controller->multiplicar($a, $nula));
    }

    public function testMultiplicacaoDimensoesIncompativeisLancaExcecao(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->controller->multiplicar([[1, 2, 3]], [[1, 2], [3, 4]]);
    }
}