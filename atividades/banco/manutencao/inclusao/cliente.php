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

?>


<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../_css/cliente.css">
    <title>Cadastro Cliente</title>
</head>

<body>

    <h1 class="texto">Cadastro Cliente</h1>

    <div class="formulario">

        <form method="post">

            <label for="nome-Cliente">Nome do Cliente</label><br>
            <input type="text" name="nome" id="nome" required> <br>

            <label for="end-Cliente">Endereço do Cliente</label><br>
            <input type="text" name="end" id="end" required> <br>

            <label for="cpf-Cliente">Cpf do Cliente</label><br>
            <input type="text" name="cpf" id="cpf" required> <br>

            <label for="rg-Cliente">rg do Cliente</label><br>
            <input type="text" name="rg" id="rg" required> <br>

            <label for="data-Cliente">data de nascimento do Cliente</label><br>
            <input type="date" name="data" id="data" required> <br>

            <input type="submit" value="Cadastrar">

        </form>
    </div>

    <button id="voltar" onclick="window.location.href='./menu.html'">VOLTAR</button>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {

        $nome = $_POST['nome'];
        $end = $_POST['end'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $data_pre = $_POST['data'];
        $data = date("Y-m-d", strtotime($data_pre));

        $sql = "INSERT INTO cliente (
        nome_cliente,
        endereco_cliente,
        cpf_cliente,
        rg_cliente,
        data_nascimento
         ) VALUES(
         '$nome',
         '$end',
         '$cpf',
         '$rg',
         '$data'
         )";

        if (mysqli_query($conn, $sql)) {
            echo "<br><p class='envio'>Enviado Com successo</p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    ?>

</body>

</html>