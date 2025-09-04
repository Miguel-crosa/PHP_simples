<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="_css/ex9.css">
</head>

<body>
    <h1>Formulario de cadastro

    </h1>


    <div>

        <form method="post">
            <p>Digite a peça de roupa</p>
            <input type="text" name="roupaNome" required><br><br>
            <p>Digite o preço da roupa</p>
            <input type="text" name="roupaPreco" required><br><br>
            <p>Digite o nome do comprador</p>
            <input type="text" name="roupaComprador" required><br><br>
            <p>Digite o método de pagamento do comprador</p>
            <input type="text" name="pessoaMp" required><br><br>
            <p>Digite se o cliente gostaria de cpf na nota</p>
            <input type="text" name="pessoaEscolha" required><br><br>
            <p>Digite o endereço do cliente</p>
            <input type="text" name="pessoaEnd" required><br><br>
            <input type="submit" value="Clique para enviar">


        </form>

    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {

        $roupaNome = $_POST["roupaNome"];
        $roupaPreco = $_POST["roupaPreco"];
        $roupaComprador = $_POST["roupaComprador"];
        $pessoaMp = $_POST["pessoaMp"];
        $pessoaEscolha = $_POST["pessoaEscolha"];
        $pessoaEnd = $_POST["pessoaEnd"];

        $servername = "localhost";
        $database = "banco01";
        $username = "root";
        $password = "";

        // CRIA CONEXÃO
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }

        echo "Conectado com sucesso";

        $sql = " INSERT INTO lojaroupa(
        roupanome,
        roupapreco,
        roupacomprador,
        roupamp,
        pessoaescolha,
        pessoaendereco
        ) VALUES (
        '$roupaNome',
        $roupaPreco,
        '$roupaComprador',
        '$pessoaMp',
        '$pessoaEscolha',
        '$pessoaEnd'
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