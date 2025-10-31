<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/tabelaMovi.css">
    <title>Consulta Saldo</title>
</head>

<body>
    <?php

    $servername = "localhost";
    $database = "banco";
    $username = "root";
    $password = "";

    // CRIA CONEXÃO
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // VERIFICA ESCOLHA DE CAMPOS
    $sql = "SELECT
        nome_cliente, 
        id_cliente_mov,
        SUM(movimentacao.valor) AS total_movimentado
    FROM 
        movimentacao 
    JOIN 
        cliente  
    ON
        cliente.id_cliente = movimentacao.id_cliente_mov
    GROUP BY 
        id_cliente_mov  ASC;";

    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    // LOOP PARA LER TODOS OS REGISTROS
    // $registro = mysqli_fetch_array($resultado);

    echo "<table>";

    while ($linha = mysqli_fetch_assoc($resultado)) {

        echo "<tr>";

        echo "<th>";
        echo "Nome do Cliente:";
        echo "</th>";


        echo "<th>";
        echo "ID do Cliente:";
        echo "</th>";

        echo "<th>";
        echo "Saldo Total:";
        echo "</th>";

        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['nome_cliente'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['id_cliente_mov'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['total_movimentado'] . "<br>";
        echo "</td>";


        echo "</tr>";
    }

    echo "</table>";


    mysqli_close($conn);
    ?>

    <button onclick="window.location.href='menuU.html'">Voltar</button>

</body>

</html>