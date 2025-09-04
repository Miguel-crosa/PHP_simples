<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conectar o banco de dados</title>
</head>

<body>

    <?php

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

    $sql = " INSERT INTO pessoa01(
    pessoa_id,
    pessoa_nome,
    pessoa_cpf,
    pessoa_rg,
    pessoa_endereco,
    pessoa_bairro,
    pessoa_cep
    ) VALUES (
    2,
    'Maria',
    '93420123231',
    '129480123',
    'Av. Roraima 5525',
    'Sao Jose',
    '57329321'
    ); ";


    if (mysqli_query($conn, $sql)) {
        echo "<br>Comando executado com sucesso";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


    mysqli_close($conn);


    ?>


</body>

</html>