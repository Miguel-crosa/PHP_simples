<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/paciente.css">
    <title>Cadastro Paciente</title>
</head>

<body>

    <button id="voltar" onclick="window.location.href='menu.php'">Voltar</button>

    <form method="post">

        <div id="formulario">
            <br><br>
            <label for="nomePac">Nome do paciente:</label> <br><br>
            <input type="text" id="nomePaciente" name="nome"> <br><br>
            <label for="cpfPac">cpf do paciente</label> <br><br>
            <input type="text" id="cpfPaciente" name="cpf"><br><br>
            <label for="nomeMaepac">Nome da mãe do paciente</label> <br><br>
            <input type="text" id="maePac" name="mae"><br>
            <label for="NascimentoPaciente">Nascimento do Paciente</label> <br><br>
            <input type="text" id="nascimentoPac" name="nascimento" placeholder="YY/MM/DD"><br>

            <input type="submit" value="Enviar Informações"><br>
        </div>


    </form>

    <button id="registros" onclick="window.location.href='registroPaciente.php'">Ver os Pacientes</button>

</body>

<?php

if ($_SERVER["REQUEST_METHOD"] == ("POST")) {

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $mae = $_POST["mae"];
    $nascimento = $_POST["nascimento"];

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

    $sql = " INSERT INTO paciente(
            nome_paciente,
            cpf_paciente,
            mae_paciente,
            nascimento_paciente
            ) VALUES (
            '$nome',
            '$cpf',
            '$mae',
            '$nascimento'
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