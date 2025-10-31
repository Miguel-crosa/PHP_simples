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
    <link rel="stylesheet" href="../../_css/contaBancaria.css">
    <title>Conta Bancaria</title>
</head>

<body>

    <h1 class="texto">Cadastro Conta Bancaria</h1>

    <div class="formulario">

        <form method="post">


            <label for="numero-conta">Numero da conta</label><br>
            <input type="number" name="numero" id="numero" placeholder="000000" required> <br>

            <label for="id-Agencia">ID da agencia:</label>
            <select name="idAgencia" id="idAgencia">
                <?php

                $sqlCliente = 'SELECT id_agencia FROM agencia';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["id_agencia"] . "|" . $row["id_agencia"] . '">' . $row["id_agencia"] . '</option>';
                }
                ?>

            </select> <br>

            <label for="id-Cliente">ID do cliente:</label>
            <select name="idCliente" id="idCliente">
                <?php

                $sqlCliente = 'SELECT id_cliente FROM cliente';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["id_cliente"] . "|" . $row["id_cliente"] . '">' . $row["id_cliente"] . '</option>';
                }
                ?>

            </select> <br>

            <input type="submit" value="Cadastrar">

        </form>

    </div>

    <button id="voltar" onclick="window.location.href='./menu.html'">VOLTAR</button>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {

        $numero = $_POST['numero'];
        $idAgencia = $_POST['idAgencia'];
        $idCliente = $_POST['idCliente'];

        $sql = "INSERT INTO conta_bancaria (
         numero_conta,
         id_agencia,
         id_cliente
        ) VALUES(
         $numero,
         $idAgencia,
         $idCliente
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