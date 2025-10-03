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

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Movimentos</title>
    <link rel="stylesheet" href="../_css/registroMovimento.css">
</head>

<body>

    <h1>Registrar Clientes:</h1>

    <div class="quadrado">

        <form method="post">
            <p>Id_cliente:</p>
            <select name="idCliente" id="clienteId">
                <option value="">Escolha um cliente</option>

                <?php
                $sqlCliente = 'SELECT id_cliente from cliente group by id_cliente order by id_cliente;';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["id_cliente"] . "|" . $row["id_cliente"] . '">' . $row["id_cliente"] . '</option>';
                }
                ?>
            </select><br><br>

            <p>Tipo de movimento:</p>
            <input type="text" name="tipo" id="tipo"><br><br>

            <p>Valor:</p>
            <input type="number" name="valor" id="valor"><br><br>

            <p>data_movimento:</p>
            <input type="date" name="data" id="data"><br><br>

            <br><br><input type="submit" value="Enviar valores">

        </form>

    </div>

    <br><br>

    <button><a href="paginaPrincipal.php">Voltar:</a></button>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $cliente = $_POST['idCliente'];
        $tipo = $_POST["tipo"];
        $valor = $_POST["valor"];
        $data = $_POST["data"];

        $clienteDados = (explode("|", $cliente));
        $clienteId = $clienteDados[0];
        // $clienteNome = $clienteDados[1];

        $dataMovimentacao = strtotime($data);
        $dataMovimentacao_f = date("y-m-d", $dataMovimentacao);



        $sql = " INSERT INTO movimento(
        id_cliente,
        tipo,
        valor,
        data_movimento
        ) VALUES (
        '$clienteId',
        '$tipo',
        '$valor',
        '$data'
        ); ";

        if (mysqli_query($conn, $sql)) {
            echo "<br>Comando executado com sucesso";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }



    ?>


</body>

</html>