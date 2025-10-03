<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/medico.css">
    <title>Cadastro Médico</title>
</head>

<body>

    <button id="voltar" onclick="window.location.href='menu.php'">Voltar</button>

    <form method="post">

        <div id="formulario">
            <br><br>
            <label for="nomeMedico">Nome do médico:</label> <br><br>
            <input type="text" id="nomeMed" name="nome"> <br><br>
            <label for="especialidadeMedico">Especialidade do médico:</label> <br><br>
            <input type="text" id="especialidadeMed" name="especialidade"><br><br>
            <label for="numerodormMedico">Numero do RM:</label> <br><br>
            <input type="number" id="numero-rmMed" name="numero-rm"><br>

            <input type="submit" value="Enviar Informações"><br>
        </div>

    </form>

    <button id="registros" onclick="window.location.href='registroMedico.php'">Ver os médicos</button>

</body>

<?php

if ($_SERVER["REQUEST_METHOD"] == ("POST")) {

    $nome = $_POST["nome"];
    $especialidade = $_POST["especialidade"];
    $numeroRM = $_POST["numero-rm"];

    $servername = "localhost";
    $database = "hospital";
    $username = "root";
    $password = "";

    // CRIA CONEXÃO
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    echo "Conectado com sucesso";

    $sql = " INSERT INTO medico(
            nome_medico,
            especialidade_medico,
            numero_rm
            ) VALUES (
            '$nome',
            '$especialidade',
            '$numeroRM'
            ); ";

    if (mysqli_query($conn, $sql)) {
        echo "<br>Comando executado com sucesso";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>

</html>