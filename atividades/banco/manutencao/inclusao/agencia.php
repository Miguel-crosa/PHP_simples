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
    <link rel="stylesheet" href="../../_css/agencia.css">
    <title>Cadastro Agencia</title>
</head>

<body>

    <h1 class="texto">Cadastro Agência</h1>

    <div class="formulario">

        <form method="post">

            <label for="quant-agenc">Quantidade de agencias</label><br>
            <input type="number" name="quant" id="quant" required> <br>

            <label for="numero-agenc">Numero da agencia</label><br>
            <input type="number" name="numero" id="numero" placeholder="000000" required> <br>

            <label for="id-Inst">ID da instituição:</label>
            <select name="idInst" id="idInst">
                <?php

                $sqlCliente = 'SELECT * FROM instituicao_financeira';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["id_instituicao"] . "|" . $row["id_instituicao"] . '">' . $row["id_instituicao"] . '</option>';
                }
                ?>

            </select> <br>

            <label for="nome-Inst">Nome da instituição</label><br>
            <input type="text" name="nome" id="nome" required> <br>

            <label for="end-agenc">Endereço da agencia</label><br>
            <input type="text" name="end" id="end" required> <br>

            <input type="submit" value="Cadastrar">

        </form>
    </div>

    <button id="voltar" onclick="window.location.href='./menu.html'">VOLTAR</button>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {

        $quant = $_POST['quant'];
        $numero = $_POST['numero'];
        $id = $_POST['idInst'];
        $nome = $_POST['nome'];
        $end = $_POST['end'];

        $sql = "INSERT INTO agencia (
        quantidade_agencias,
        numero_agencia,
        id_instituicao,
        nome_instituicao,
        endereco
         ) VALUES(
         '$quant',
         '$numero',
         '$id',
         '$nome',
         '$end'
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