<?php

namespace ProjetoIntegraOMatematica\Controller;

use InvalidArgumentException;

class OperacoesController
{
    public function somar(array $matrixA, array $matrixB): array
    {
        $this->validarMatriz($matrixA);
        $this->validarMatriz($matrixB);

        if (count($matrixA) !== count($matrixB) || count($matrixA[0]) !== count($matrixB[0])) {
            throw new InvalidArgumentException("Dimensões incompatíveis para soma de matrizes.");
        }

        $resultado = [];
        foreach ($matrixA as $i => $row) {
            foreach ($row as $j => $val) {
                $resultado[$i][$j] = $val + $matrixB[$i][$j];
            }
        }
        return $resultado;
    }

    public function multiplicar(array $matrixA, array $matrixB): array
    {
        $this->validarMatriz($matrixA);
        $this->validarMatriz($matrixB);

        $colsA = count($matrixA[0]);
        $rowsB = count($matrixB);

        if ($colsA !== $rowsB) {
            throw new InvalidArgumentException("O número de colunas da Matriz A deve ser igual ao número de linhas da Matriz B.");
        }

        $rowsA = count($matrixA);
        $colsB = count($matrixB[0]);
        $resultado = [];

        for ($i = 0; $i < $rowsA; $i++) {
            for ($j = 0; $j < $colsB; $j++) {
                $resultado[$i][$j] = 0;
                for ($k = 0; $k < $colsA; $k++) {
                    $resultado[$i][$j] += $matrixA[$i][$k] * $matrixB[$k][$j];
                }
            }
        }
        return $resultado;
    }

    private function validarMatriz(array $matrix): void
    {
        if (empty($matrix) || !is_array($matrix[0])) {
            throw new InvalidArgumentException("Matriz inválida ou vazia.");
        }
        $cols = count($matrix[0]);
        foreach ($matrix as $row) {
            if (!is_array($row) || count($row) !== $cols) {
                throw new InvalidArgumentException("Todas as linhas da matriz devem ter a mesma quantidade de elementos.");
            }
        }
    }
}