<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/tabelaMovi.css">
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
    $sql = "SELECT 
		        mov.*,
		        cli.nome_cliente
            FROM
		        movimentacao mov
            INNER JOIN
		        cliente cli
            ON
		        mov.id_cliente_mov = cli.id_cliente;
            ";

    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    // LOOP PARA LER TODOS OS REGISTROS
    // $registro = mysqli_fetch_array($resultado);

    echo "<table>";

    while ($linha = mysqli_fetch_assoc($resultado)) {

        echo "<tr>";

        echo "<th>";
        echo "ID Movimentação:";
        echo "</th>";

        echo "<th>";
        echo "ID da instituição:";
        echo "</th>";

        echo "<th>";
        echo "ID da agencia:";
        echo "</th>";

        echo "<th>";
        echo "Nome da conta:";
        echo "</th>";

        echo "<th>";
        echo "ID da conta:";
        echo "</th>";

        echo "<th>";
        echo "ID do cliente:";
        echo "</th>";

        echo "<th>";
        echo "Descrição:";
        echo "</th>";

        echo "<th>";
        echo "Valor:";
        echo "</th>";

        echo "<th>";
        echo "Tipo de movimentação:";
        echo "</th>";

        echo "<th>";
        echo "Data da movimentação:";
        echo "</th>";


        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['id_movimentacao'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['id_instituicao'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['id_agencia'];
        echo "</td>";

        echo "<td>";
        echo $linha['nome_cliente'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['id_conta'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['id_cliente_mov'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['descricao'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['valor'];
        echo "</td>";

        echo "<td>";
        echo $linha['tipo_movimentacao'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['data_movimentacao'] . "<br>";
        echo "</td>";


        echo "</tr>";
    }

    echo "</table>";


    mysqli_close($conn);
    ?>

    <button onclick="window.location.href='menuU.html'">Voltar</button>

</body>

</html>