<?php

namespace ProjetoIntegraOMatematica\View;

class Formulario
{
    public static function render(array $dados = []): void
    {
        $matrixA = $dados['matrixA'] ?? "[[2, 1], [1, 3]]";
        $matrixB = $dados['matrixB'] ?? "[[5, 6], [7, 8]]";
        $vectorB = $dados['vectorB'] ?? "[5, 10]";

        echo <<<HTML
<div class="card shadow-sm mb-4">
    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Entrada de Dados (Formato JSON)</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="index.php">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Matriz A:</label>
                    <textarea name="matrixA" class="form-control font-monospace" rows="4">{$matrixA}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Matriz B (Para Soma e Multiplicação):</label>
                    <textarea name="matrixB" class="form-control font-monospace" rows="4">{$matrixB}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Vetor B (Para Sistema Linear Ax = B):</label>
                    <input type="text" name="vectorB" class="form-control font-monospace" value="{$vectorB}">
                </div>
            </div>
            <hr>
            <div class="d-flex flex-wrap gap-2">
                <button type="submit" name="action" value="soma" class="btn btn-primary">Soma (A + B)</button>
                <button type="submit" name="action" value="multiplica" class="btn btn-success">Multiplicação (A * B)</button>
                <button type="submit" name="action" value="det" class="btn btn-warning text-dark">Determinante (det A)</button>
                <button type="submit" name="action" value="sistema" class="btn btn-danger">Sistema Linear (Ax = B)</button>
            </div>
        </form>
    </div>
</div>
HTML;
    }
}