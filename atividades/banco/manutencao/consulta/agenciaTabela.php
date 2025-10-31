<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../_css/tabelas.css">
    <title>Dados dos Emprestimos:</title>
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
    $sql = "SELECT * FROM agencia";


    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    // LOOP PARA LER TODOS OS REGISTROS
    // $registro = mysqli_fetch_array($resultado);

    echo "<table>";

    while ($linha = mysqli_fetch_assoc($resultado)) {

        echo "<tr>";

        echo "<th>";
        echo "ID Agencia:";
        echo "</th>";

        echo "<th>";
        echo "Quantidade Agencias:";
        echo "</th>";

        echo "<th>";
        echo "Numero Agencias:";
        echo "</th>";

        echo "<th>";
        echo "Id da instituição:";
        echo "</th>";

        echo "<th>";
        echo "Nome Instituição:";
        echo "</th>";

        echo "<th>";
        echo "Endereço";
        echo "</th>";

        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['id_agencia'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['quantidade_agencias'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['numero_agencia'];
        echo "</td>";

        echo "<td>";
        echo $linha['id_instituicao'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['nome_instituicao'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['endereco'] . "<br>";
        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($conn);

    ?>

    <br><br>

    <button onclick="window.location.href='menu.html'">Voltar</button>

</body>

</html>