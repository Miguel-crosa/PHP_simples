<?php

//Int
$idade = 30;

//Float
$altura = 1.75;

//String
$nome = "Miguel";

//Boolean
$verdadeiro = true;

//Array
$frutas = ["maça", "uva", "Banana"];

//NULL
$semValor = null;

echo "<h3> Essa é uma variável inteira: Idade - $idade" . "<br><br> Essa é uma variável quebrada: Altura - $altura" . "<br><br> Essa é uma variável string: Nome - $nome"
    . "<br><br> Essa é uma variável boolean: Verdadeiro - $verdadeiro" . "<br><br> Essa é uma variável de um array: Frutas - $frutas[0] | $frutas[1] | $frutas[2]" . // . print_r($frutas)
    "<br><br> Essa é uma variavel que não recebe valores: Sem valor - $semValor </h3>";

echo "<h2> Hoje é: " . date("d/m/Y") . "<br></h2>";
echo "<h2> Horario:" . date("H:i:s") . "<br></h2>";

$amanha = new DateTime();
$amanha->modify("+1 day");

echo "<h2> Amanha será: " . $amanha->format("d/m/Y") . "<br></h2>";

$timestamp = strtotime("last Friday");
echo "<h2> Última sexta-feita foi: " . date("d/m/Y", $timestamp) . "</h2>";
