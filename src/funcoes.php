<?php

namespace SRC;


class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int
    {
        $algarismo = '';
        if (mb_strlen($ano) < 4) {
            $algarismo = substr($ano, 0, 1);
        } else {
            $algarismo =  substr($ano, 0, 2);
        }
        $century = $algarismo + 1;
        return $century;
    }









    /*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int
    {
        $numberInt = $numero - 1;
        $i = 1;
        for ($numberInt; $numberInt > 2; $numberInt--) {
            $divisores = 0;
            for ($i = 2; $i < $numberInt; $i++) {
                if ($numberInt % $i == 0) {
                    $divisores += 1;
                }
            }

            if ($divisores == 0 && $numberInt != 0 && $numberInt != 1) {
                return $numberInt;
            }
        }
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int
    {
        $cont = [];
        foreach ($arr as  $item) {
            array_push($cont, array_sum($item));
        }
        sort($cont);
        return $cont[1];
    }








    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */

    public function SequenciaCrescente(array $arr): string
    {
        sort($arr);
        if (count($arr) == 1) {
            return true;
        } else {
            $result =  array_unique(array_diff_assoc($arr, array_unique($arr)));
            if (count($result) > 1) {
                return false;
            } else {
                return true;
            }
        }
    }
}










// --------------------------------------------------------------------
// ------------------------FUNÇÕES--------------------------------------
function Century($ano)
{
    $obj =  new Funcoes();
    $century = $obj->SeculoAno($ano);
    return "Ano " . $ano . " = Século " . $century . ".";
}


function PrimeNumber($numberInt)
{
    $result = Funcoes::PrimoAnterior($numberInt);
    return 'Numero = ' . $numberInt . ' resposta = ' . $result;
}


function SecondLargest($colletion)
{
    $result = Funcoes::SegundoMaior($colletion);
    return 'Resposta = ' . $result;
}

function IncresingSequential($colletion)
{
    if (Funcoes::SequenciaCrescente($colletion) == true) {
        return 'true';
    } else {
        return 'false';
    }
}
// --------------------------------------------------------------------
// ------------------------FIM FUNÇÕES--------------------------------------










// -----------------------------------------------------
echo ('<h1>1º função</h1>');
echo (Century(932));
echo ('<hr>');






// -----------------------------------------------------
echo ('<h1>2º função</h1>');
echo (PrimeNumber(41));
echo ('<hr>');








// -----------------------------------------------------
echo ('<h1>3º função</h1>');
$colletion = array(
    array(25, 22, 18),
    array(10, 15, 13),
    array(24, 5, 2),
    array(80, 17, 15)
);
echo (SecondLargest($colletion));
echo ('<hr>');





// -----------------------------------------------------
echo ('<h1>4º função</h1>');
$colletion = [1, 2, 1, 2];
echo (IncresingSequential($colletion));
echo ('<hr>');
