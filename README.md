# Projeto de Integração Matemática - Álgebra Linear em PHP

Aplicação web desenvolvida em PHP para resolução de operações de Álgebra Linear (soma, multiplicação de matrizes, cálculo de determinante e sistemas lineares), validada por testes unitários automatizados com PHPUnit.

---

##  Lista de Algoritmos Implementados

1. **Soma de Matrizes (`OperacoesController::somar`)**
   - Soma elemento a elemento de duas matrizes de mesma dimensão $m \times n$.
   - **Validações:** Verifica se as matrizes possuem dimensões idênticas e formato válido.

2. **Multiplicação de Matrizes (`OperacoesController::multiplicar`)**
   - Produto matricial entre duas matrizes $A_{m \times n}$ e $B_{n \times p}$.
   - **Validações:** Verifica se o número de colunas da Matriz A é igual ao número de linhas da Matriz B.

3. **Determinante de Matriz (`DeterminanteController::calcular`)**
   - Algoritmo de Eliminação de Gauss com pivoteamento parcial para cálculo do determinante.
   - **Validações:** Exige matriz quadrada $n \times n$. Retorna $0.0$ para matrizes singulares.

4. **Resolução de Sistemas Lineares (`SistemaLinearController::resolver`)**
   - Algoritmo de Eliminação de Gauss com substituição regressiva para resolver sistemas no formato $Ax = b$.
   - **Validações:** Verifica compatibilidade das dimensões e lança exceção para sistemas sem solução única (matriz singular ou indeterminado/impossível).

---

##  Requisitos e Ferramentas

- **PHP:** >= 8.4
- **Servidor Web:** Laravel Herd
- **Gerenciador de Dependências:** Composer
- **Framework de Testes:** PHPUnit 11+
- **Estilização:** Bootstrap 5

---
