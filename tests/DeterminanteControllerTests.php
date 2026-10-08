<?php

namespace Test;

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use ProjetoIntegraOMatematica\Controller\DeterminanteController; // <- Altere aqui
use InvalidArgumentException;

class DeterminanteControllerTests extends TestCase
{
    private DeterminanteController $controller;

    protected function setUp(): void
    {
        $this->controller = new DeterminanteController();
    }

    // ... restante do código

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