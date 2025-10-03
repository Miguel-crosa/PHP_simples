<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados dos Emprestimos:</title>
    <link rel="stylesheet" href="_css/tabelaEmprestimo.css">
</head>

<body>
    <?php

    $servername = "localhost";
    $database = "senai";
    $username = "root";
    $password = "";

    // CRIA CONEXÃO
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // VERIFICA ESCOLHA DE CAMPOS
    $sql = "SELECT * FROM emprestimo";


    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    // LOOP PARA LER TODOS OS REGISTROS
    // $registro = mysqli_fetch_array($resultado);

    echo "<table>";

    while ($linha = mysqli_fetch_assoc($resultado)) {

        echo "<tr>";

        echo "<th>";
        echo "ID EMPRESTIMO:";
        echo "</th>";

        echo "<th>";
        echo "ID PROFESSOR:";
        echo "</th>";

        echo "<th>";
        echo "Sala:";
        echo "</th>";

        echo "<th>";
        echo "Patrimonio:";
        echo "</th>";

        echo "<th>";
        echo "Descrição:";
        echo "</th>";

        echo "<th>";
        echo "Quantidade:";
        echo "</th>";

        echo "<th>";
        echo "Data:";
        echo "</th>";

        echo "<th>";
        echo "Codigo Patrimonio:";
        echo "</th>";

        echo "<th>";
        echo "Codigo Cor Patrimonio:";
        echo "</th>";

        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['id_emprestimo'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['id_professor'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['emprestimo_sala'];
        echo "</td>";

        echo "<td>";
        echo $linha['emprestimo_patrimonio'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['emprestimo_descricao'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['emprestimo_quantidade'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['emprestimo_data'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['emprestimo_codigopatrimonio'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['emprestimo_corpatrimonio'] . "<br>";
        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($conn);

    ?>

    <br><br>

    <button onclick="window.location.href='menu.php'">Voltar</button>

</body>

</html>