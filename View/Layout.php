<?php

namespace ProjetoIntegraOMatematica\View;

class Layout
{
    public static function renderHeader(string $titulo): void
    {
        echo <<<HTML
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$titulo}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">Álgebra Linear - PHP</a>
    </div>
</nav>
<div class="container py-2">
HTML;
    }

    public static function renderFooter(): void
    {
        echo <<<HTML
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
HTML;
    }
}