<?php

namespace ProjetoIntegraOMatematica\Test;

use ProjetoIntegraOMatematica\Controller\DeterminanteController;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class DeterminanteControllerTest extends TestCase
{
    private DeterminanteController $controller;

    protected function setUp(): void
    {
        $this->controller = new DeterminanteController();
    }

    public function testDeterminante2x2(): void
    {
        $matriz = [[4, 6], [3, 8]];
        $this->assertEqualsWithDelta(14.0, $this->controller->calcular($matriz), 1e-6);
    }

    public function testDeterminanteMatrizSingular(): void
    {
        $matriz = [[2, 4], [1, 2]];
        $this->assertEqualsWithDelta(0.0, $this->controller->calcular($matriz), 1e-6);
    }

    public function testDeterminanteNaoQuadradaLancaExcecao(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->controller->calcular([[1, 2, 3], [4, 5, 6]]);
    }
}