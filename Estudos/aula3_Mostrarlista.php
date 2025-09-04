<?php

$arquivo = './Exercicios/arquivosTxt/relatorio.txt';

if (file_exists($arquivo)) {

    $linhas = file($arquivo);
    $dados_linhas = [];
    $max_campos = 0;

    //PROCESSA TODAS AS LINHAS
    foreach ($linhas as $linha) {
        $dados = explode('|', trim($linha));
        $dados_linhas[] = $dados;
        if (count($dados) > $max_campos) {
            $max_campos = count($dados);
        }
    }

    //GERA A TABElA UNICA
    echo "<table border='1' cellpadding ='8' cellspacing='0'>";

    //CABEÇALHOS GENÉRICOS
    echo "<tr>";
    for ($i = 1; $i <= $max_campos; $i++) {
        echo "<th>Campo $i</th>";
    }
    echo "</tr>";

    //LINHAS DE DADOS
    foreach ($dados_linhas as $linha_dados) {
        echo "<tr>";
        for ($i = 0; $i < $max_campos; $i++) {
            $valor = isset($linha_dados[$i]) ? htmlspecialchars($linha_dados[$i]) : ' ';
            echo "<td>$valor</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Arquivo não encontrado";
}
