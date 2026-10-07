<?php
require_once __DIR__ . '/vendor/autoload.php';

use ProjetoIntegraOMatematica\Controller\OperacoesController;
use ProjetoIntegraOMatematica\Controller\DeterminanteController;
use ProjetoIntegraOMatematica\Controller\SistemaLinearController;
use ProjetoIntegraOMatematica\View\Layout;
use ProjetoIntegraOMatematica\View\Formulario;
use ProjetoIntegraOMatematica\View\Resultado;

$resultado = null;
$erro = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $action = $_POST['action'] ?? '';

        if ($action === 'soma') {
            $a = json_decode($_POST['matrixA'] ?? '[]', true);
            $b = json_decode($_POST['matrixB'] ?? '[]', true);
            $controller = new OperacoesController();
            $resultado = $controller->somar($a, $b);
        } elseif ($action === 'multiplica') {
            $a = json_decode($_POST['matrixA'] ?? '[]', true);
            $b = json_decode($_POST['matrixB'] ?? '[]', true);
            $controller = new OperacoesController();
            $resultado = $controller->multiplicar($a, $b);
        } elseif ($action === 'det') {
            $a = json_decode($_POST['matrixA'] ?? '[]', true);
            $controller = new DeterminanteController();
            $resultado = $controller->calcular($a);
        } elseif ($action === 'sistema') {
            $a = json_decode($_POST['matrixA'] ?? '[]', true);
            $vectorB = json_decode($_POST['vectorB'] ?? '[]', true);
            $controller = new SistemaLinearController();
            $resultado = $controller->resolver($a, $vectorB);
        }
    } catch (Throwable $e) {
        $erro = $e->getMessage();
    }
}

Layout::renderHeader("projeto-integra-o-matematica");
Formulario::render($_POST);
Resultado::render($resultado, $erro);
Layout::renderFooter();