<?php

namespace ProjetoIntegraOMatematica\Test;

use ProjetoIntegraOMatematica\Controller\SistemaLinearController;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class SistemaLinearControllerTest extends TestCase
{
    private SistemaLinearController $controller;

    protected function setUp(): void
    {
        $this->controller = new SistemaLinearController();
    }

    public function testSistemaLinearDuasVariaveis(): void
    {
        $a = [[2, 1], [1, 3]];
        $b = [5, 10];
        $solucao = $this->controller->resolver($a, $b);

        $this->assertEqualsWithDelta(1.0, $solucao[0], 1e-6);
        $this->assertEqualsWithDelta(3.0, $solucao[1], 1e-6);
    }

    public function testSistemaSingularLancaExcecao(): void
    {
        $a = [[1, 1], [2, 2]];
        $b = [3, 5];

        $this->expectException(InvalidArgumentException::class);
        $this->controller->resolver($a, $b);
    }
}