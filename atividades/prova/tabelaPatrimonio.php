<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados dos patrimonios:</title>
    <link rel="stylesheet" href="_css/tabelaPatrimonio.css">
</head>

<body>
    <?php

    $servername = "localhost";
    $database = "teste_foreign";
    $username = "root";
    $password = "";

    // CRIA CONEXÃO
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // VERIFICA ESCOLHA DE CAMPOS
    $sql = "SELECT * FROM patrimonio";


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
        echo "Sala:";
        echo "</th>";

        echo "<th>";
        echo "Quantidade:";
        echo "</th>";

        echo "<th>";
        echo "Codigo:";
        echo "</th>";

        echo "<th>";
        echo "Cor:";
        echo "</th>";

        echo "<th>";
        echo "Correto:";
        echo "</th>";

        echo "<th>";
        echo "Foto:";
        echo "</th>";

        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['id_patrimonio'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['patrimonio_nome'];
        echo "</td>";

        echo "<td>";
        echo $linha['patrimonio_sala'];
        echo "</td>";

        echo "<td>";
        echo $linha['patrimonio_quantidade'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['patrimonio_codigo'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['patrimonio_cor'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['patrimonio_correto'] . "<br>";
        echo "</td>";

        echo "<td>";
        $valorImagem = $linha['patrimonio_foto'];
        echo "<img src='$valorImagem' width='85%'>" . "<br>";
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