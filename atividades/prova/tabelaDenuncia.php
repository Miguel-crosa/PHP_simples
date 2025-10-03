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
    $sql = "SELECT * FROM denuncia";


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
        echo "Falta:";
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
        echo $linha['id_denuncia'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['id_professor'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['denuncia_sala'];
        echo "</td>";

        echo "<td>";
        echo $linha['denuncia_patrimonio'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['denuncia_descricao'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['denuncia_falta'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['denuncia_data'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['denuncia_codigopatrimonio'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['denuncia_corpatrimonio'] . "<br>";
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