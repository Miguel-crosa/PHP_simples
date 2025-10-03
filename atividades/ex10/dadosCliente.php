<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dados dos clientes:</title>
    <link rel="stylesheet" href="../_css/dados.css">
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

    // VERIFICA ESCOLHA DE CAMPOS
    $sql = "SELECT * FROM cliente";


    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    // LOOP PARA LER TODOS OS REGISTROS
    // $registro = mysqli_fetch_array($resultado);

    echo "<table>";

    while ($linha = mysqli_fetch_assoc($resultado)) {

        echo "<tr>";

        echo "<th>";
        echo "ID:";
        echo "</th>";

        echo "<th>";
        echo "Nome:";
        echo "</th>";

        echo "<th>";
        echo "Email:";
        echo "</th>";

        echo "<th>";
        echo "Telefone:";
        echo "</th>";

        echo "<th>";
        echo "Endereco:";
        echo "</th>";

        echo "<th>";
        echo "Cidade:";
        echo "</th>";

        echo "<th>";
        echo "Estado:";
        echo "</th>";

        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['id_cliente'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['nome_cliente'];
        echo "</td>";

        echo "<td>";
        echo $linha['email_cliente'];
        echo "</td>";

        echo "<td>";
        echo $linha['telefone_cliente'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['endereco_cliente'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['cidade_cliente'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['estado_cliente'] . "<br>";
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