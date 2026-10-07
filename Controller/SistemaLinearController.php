<?php

namespace ProjetoIntegraOMatematica\Controller;

use InvalidArgumentException;

class SistemaLinearController
{
    public function resolver(array $matrixA, array $vectorB): array
    {
        if (empty($matrixA) || !is_array($matrixA[0])) {
            throw new InvalidArgumentException("Matriz de coeficientes inválida.");
        }

        $n = count($matrixA);
        if ($n !== count($matrixA[0]) || $n !== count($vectorB)) {
            throw new InvalidArgumentException("Matriz A deve ser quadrada e compatível com o Vetor B.");
        }

        $aug = [];
        for ($i = 0; $i < $n; $i++) {
            $aug[$i] = array_merge($matrixA[$i], [(float)$vectorB[$i]]);
        }

        for ($i = 0; $i < $n; $i++) {
            $maxRow = $i;
            for ($k = $i + 1; $k < $n; $k++) {
                if (abs($aug[$k][$i]) > abs($aug[$maxRow][$i])) {
                    $maxRow = $k;
                }
            }

            $temp = $aug[$i];
            $aug[$i] = $aug[$maxRow];
            $aug[$maxRow] = $temp;

            if (abs($aug[$i][$i]) < 1e-9) {
                throw new InvalidArgumentException("Sistema sem solução única (matriz singular ou indeterminado/impossível).");
            }

            for ($k = $i + 1; $k < $n; $k++) {
                $factor = $aug[$k][$i] / $aug[$i][$i];
                for ($j = $i; $j <= $n; $j++) {
                    $aug[$k][$j] -= $factor * $aug[$i][$j];
                }
            }
        }

        $x = array_fill(0, $n, 0.0);
        for ($i = $n - 1; $i >= 0; $i--) {
            $sum = 0.0;
            for ($j = $i + 1; $j < $n; $j++) {
                $sum += $aug[$i][$j] * $x[$j];
            }
            $x[$i] = ($aug[$i][$n] - $sum) / $aug[$i][$i];
        }

        return $x;
    }
}