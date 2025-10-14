<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../_css/instituicao.css">
    <title>Insituição Financeira</title>
</head>

<body>

    <h1 class="texto">Cadastro Instituição financeira</h1>

    <div class="formulario">

        <form method="post">

            <label for="nome-inst">Nome da instituição</label><br>
            <input type="text" name="nome" id="nome" required> <br>

            <label for="codigo-inst">Código do Sistema Bancario</label><br>
            <input type="text" name="codigo" id="codigo" placeholder="000000" required> <br>

            <label for="cnpj-inst">CNPJ</label><br>
            <input type="text" name="cnpj" id="cnpj" placeholder="00000000" required> <br>

            <input type="submit" value="Cadastrar">

        </form>
    </div>

    <div class="proximo"></div>
    <div class="anterior"></div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $nome = $_POST["nome"];
        $codigo = $_POST["codigo"];
        $cnpj = $_POST["cnpj"];

        $servername = "localhost";
        $database = "banco";
        $username = "root";
        $password = "";

        // CRIA CONEXÃO
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }

        $sql = " INSERT INTO instituicao_financeira(
            nome_instituicao,
            codigo_sistema,
            cnpj
            ) VALUES (
            '$nome',
            '$codigo',
            '$cnpj'
            ); ";

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