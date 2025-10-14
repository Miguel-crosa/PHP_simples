<?php

$servername = "localhost";
$database = "teste_foreign";
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
    <link rel="stylesheet" href="_css/patrimonio.css">
    <title>Cadastro patrimonio</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">

        <div id="formulario">

            <label for="PatrimonioNome">Nome do Patrimonio:</label>
            <input type="text" name="nome" required> <br>

            <label for="PatrimonioSala">Sala do Patrimonio:</label>
            <input type="text" name="sala" required><br>

            <label for="PatrimonioQuantidade">Quantidade do Patrimonio:</label>
            <input type="number" name="quantidade" required><br>

            <label for="PatrimonioCodigo">Codigo do Patrimonio:</label>
            <input name="codigo" id="patrimonioCodigo">
            <br><br>

            <label for="PatrimonioCor">Cor do Patrimonio:</label>
            <input type="text" name="cor" required><br>

            <label for="PatrimonioCorreto">Patrimonio está correto?:</label>
            <select name="correto" required>
                <option value="true">sim</option>
                <option value="false">não</option>
            </select><br>

            <label for="PatrimonioFoto">Foto do Patrimonio:</label>
            <input type="file" name="fotos"><br>

            <input type="submit" value="Registrar">

        </div>

    </form>

    <button id="tabela" onclick="window.location.href='tabelaPatrimonio.php'">Cadastros</button>
    <button onclick="window.location.href='menu.php'">Voltar</button>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $nome = $_POST["nome"];
        $sala = $_POST["sala"];
        $quantidade = $_POST["quantidade"];
        $codigo = $_POST["codigo"];
        $cor = $_POST["cor"];
        $correto = $_POST["correto"];
        $arquivo = $_FILES["fotos"];
        $pasta_destino = "arquivoMedia/";

        if ($arquivo["error"] === UPLOAD_ERR_OK) {
            $nome_temp = $arquivo["tmp_name"];
            $nome_final = $pasta_destino . basename($arquivo["name"]);

            if (!file_exists($pasta_destino)) {
                mkdir($pasta_destino, 0755, true);
            }

            if (move_uploaded_file($nome_temp, $nome_final)) {
                echo "Arquivo enviado com successo";
            } else {
                echo "Falha ao mover o arquivo";
            }
        } else {
            echo " Erro no upload" . basename($arquivo["name"]);
        }



        $sql = " INSERT INTO patrimonio(
            patrimonio_nome,
            patrimonio_sala,
            patrimonio_quantidade,
            patrimonio_codigo,
            patrimonio_cor,
            patrimonio_correto,
            patrimonio_foto
            ) VALUES (
            '$nome',
            '$sala',
            '$quantidade',
            '$codigo',
            '$cor',
            '$correto',
            '$nome_final'
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