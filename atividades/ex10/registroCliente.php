<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Cliente</title>
    <link rel="stylesheet" href="../_css/registroCliente.css">
</head>

<body>

    <h1>Registrar Clientes:</h1>

    <div class="quadrado">

        <form method="post">
            <p>Nome:</p>
            <input type="text" name="nome" id="nome"><br><br>

            <p>E-mail:</p>
            <input type="email" name="email" id="email"><br><br>

            <p>Telefone:</p>
            <input type="text" name="telefone" id="telefone"><br><br>

            <p>Endereço:</p>
            <input type="text" name="endereco" id="endereco"><br><br>

            <p>Cidade:</p>
            <input type="text" name="cidade" id="cidade"><br><br>

            <p>Estado:</p>
            <input type="text" name="estado" id="estado"><br><br>


            <br><br><input type="submit" value="Enviar valores">

        </form>


    </div>

    <br><br>

    <button><a href="paginaPrincipal.php">Voltar:</a></button>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];

        $servername = "localhost";
        $database = "movimentacoes";
        $username = "root";
        $password = "";

        // CRIA CONEXÃO
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }

        echo " Conectado com sucesso";

        $sql = " INSERT INTO cliente(
            nome_cliente,
            email_cliente,
            telefone_cliente,
            endereco_cliente,
            cidade_cliente,
            estado_cliente
            ) VALUES (
            '$nome',
            '$email',
            '$telefone',
            '$endereco',
            '$cidade',
            '$estado'
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