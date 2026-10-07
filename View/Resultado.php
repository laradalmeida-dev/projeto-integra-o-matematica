<?php

namespace ProjetoIntegraOMatematica\View;

class Resultado
{
    public static function render($resultado, ?string $erro = null): void
    {
        if ($erro) {
            echo '<div class="alert alert-danger" role="alert"><strong>Erro:</strong> ' . htmlspecialchars($erro) . '</div>';
            return;
        }

        if ($resultado !== null) {
            echo '<div class="card shadow-sm border-success mb-4">';
            echo '<div class="card-header bg-success text-white"><h5 class="mb-0">Resultado</h5></div>';
            echo '<div class="card-body">';
            if (is_array($resultado)) {
                echo '<pre class="bg-dark text-light p-3 rounded font-monospace">' . json_encode($resultado, JSON_PRETTY_PRINT) . '</pre>';
            } else {
                echo '<div class="display-6 text-center py-2"><strong>' . htmlspecialchars((string)$resultado) . '</strong></div>';
            }
            echo '</div></div>';
        }
    }
}