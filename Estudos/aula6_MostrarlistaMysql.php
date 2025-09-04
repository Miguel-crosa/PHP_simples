<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Lista usando mysql</title>
    <style>
        table {
            width: 1000px;
            border: 4px solid black;
            text-align: center;
            position: absolute;
            top: 2%;
            left: 50%;
            translate: -50%;
        }

        th {
            background-color: bisque;
            font-family: monospace;
            font-size: 20px;
            font-weight: bold;
            border: 2px solid black;
        }

        td {
            background-color: lightyellow;
            font-family: monospace;
            font-size: 18px;
            line-height: 30px;
        }
    </style>
</head>

<body>

    <?php

    $servername = "localhost";
    $database = "banco01";
    $username = "root";
    $password = "";

    // CRIA CONEXÃO
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // VERIFICA ESCOLHA DE CAMPOS
    $sql = "SELECT * FROM lojaroupa";

    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    // LOOP PARA LER TODOS OS REGISTROS
    $registro = mysqli_fetch_array($resultado);

    echo "<table border='1' cellpadding ='8' cellspacing='0'>";

    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";

        echo "<th>";
        echo $linha['idlojaroupa'] . "<br>";
        echo "</th>";

        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['roupanome'] . "<br>";
        echo $linha['roupapreco'] . "<br>";
        echo $linha['roupacomprador'] . "<br>";
        echo $linha['roupamp'] . "<br>";
        echo $linha['pessoaescolha'] . "<br>";
        echo $linha['pessoaendereco'] . "<br>";
        echo "</td>";

        echo "</tr>";

        echo "<br><br>";
    }

    echo "</table>";

    mysqli_close($conn);


    ?>

</body>

</html>