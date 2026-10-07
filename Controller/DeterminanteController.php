<?php

namespace ProjetoIntegraOMatematica\Controller;

use InvalidArgumentException;

class DeterminanteController
{
    public function calcular(array $matrix): float
    {
        if (empty($matrix) || !is_array($matrix[0])) {
            throw new InvalidArgumentException("Matriz inválida ou vazia.");
        }

        $n = count($matrix);
        if ($n !== count($matrix[0])) {
            throw new InvalidArgumentException("A matriz deve ser quadrada para calcular o determinante.");
        }

        $a = $matrix;
        $det = 1.0;

        for ($i = 0; $i < $n; $i++) {
            $pivot = $i;
            for ($j = $i + 1; $j < $n; $j++) {
                if (abs($a[$j][$i]) > abs($a[$pivot][$i])) {
                    $pivot = $j;
                }
            }

            if ($pivot !== $i) {
                $temp = $a[$i];
                $a[$i] = $a[$pivot];
                $a[$pivot] = $temp;
                $det *= -1;
            }

            if (abs($a[$i][$i]) < 1e-9) {
                return 0.0;
            }

            $det *= $a[$i][$i];

            for ($j = $i + 1; $j < $n; $j++) {
                $factor = $a[$j][$i] / $a[$i][$i];
                for ($k = $i; $k < $n; $k++) {
                    $a[$j][$k] -= $factor * $a[$i][$k];
                }
            }
        }

        return $det;
    }
}