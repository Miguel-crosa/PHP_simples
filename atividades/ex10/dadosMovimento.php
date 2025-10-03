<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados movimentos</title>
    <link rel="stylesheet" href="../_css/dadosMovimento.css">
</head>

<body>
    <?php

    $servername = "localhost";
    $database = "movimentacoes";
    $username = "root";
    $password = "";

    // CRIA CONEXÃO
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM movimento";

    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    echo "<table border='1' cellpadding ='8' cellspacing='0' id='movimento'>";

    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";

        echo "<th>";
        echo "ID MOVIMENTO:";
        echo "</th>";

        echo "<th>";
        echo "ID CLIENTE:";
        echo "</th>";

        echo "<th>";
        echo "Tipo";
        echo "</th>";

        echo "<th>";
        echo "Valor";
        echo "</th>";

        echo "<th>";
        echo "Data Movimento";
        echo "</th>";

        echo "</tr>";



        echo "<td>";
        echo $linha['id_movimento'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['id_cliente'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['tipo'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['valor'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['data_movimento'] . "<br>";
        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($conn);

    ?>

    <br><br>

    <button><a href="paginaPrincipal.php">Voltar:</a></button>

</body>

</html>