<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="_css/ex8.css">
</head>

<body>
    <h1>Formulario da pessoa</h1>


    <div>

        <form method="post">

            <p>Digite seu numero de id</p>
            <input type="number" name="idpessoa" required><br><br>
            <p>Digite seu nome completo</p>
            <input type="text" name="pessoaNome" required><br><br>
            <p>Digite seu cpf</p>
            <input type="text" name="pessoaCpf" required><br><br>
            <p>Digite seu rg </p>
            <input type="text" name="pessoaRG" required><br><br>
            <p>Digite seu endereço </p>
            <input type="text" name="pessoaEndereco" required><br><br>
            <p>Digite seu bairro</p>
            <input type="text" name="pessoaBairro" required><br><br>
            <p>Digite seu cep</p>
            <input type="text" name="pessoaCep" required><br><br>
            <input type="submit" value="Clique para enviar">


        </form>

    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {

        $idPessoa = $_POST["idpessoa"];
        $nomePessoa = $_POST["pessoaNome"];
        $cpfPessoa = $_POST["pessoaCpf"];
        $rgPessoa = $_POST["pessoaRG"];
        $enderecoPessoa = $_POST["pessoaEndereco"];
        $bairroPessoa = $_POST["pessoaBairro"];
        $cepPessoa = $_POST["pessoaCep"];

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

        $sql = " INSERT INTO pessoa02(
        pessoa_id,
        pessoa_nome,
        pessoa_cpf,
        pessoa_rg,
        pessoa_endereco,
        pessoa_bairro,
        pessoa_cep
        ) VALUES (
        $idPessoa,
        '$nomePessoa',
        '$cpfPessoa',
        '$rgPessoa',
        '$enderecoPessoa',
        '$bairroPessoa',
        '$cepPessoa'
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