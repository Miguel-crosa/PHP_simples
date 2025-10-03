<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/professorSenai.css">
    <title>Cadastro Professor</title>
</head>

<body>
    <form method="post">

        <div id="formulario">
            <label for="professorNome">Nome do Professor:</label> <br>
            <input type="text" name="nome" required> <br><br>

            <label for="professorTelefone">Telefone do Professor:</label><br>
            <input type="number" name="telefone" required><br><br>

            <label for="professorCurso">Curso do Professor:</label><br>
            <input type="text" name="curso" required><br><br>

            <label for="professorSala">Sala do Professor:</label><br>
            <input type="text" name="sala" required><br><br>

            <label for="professorRegistro">Registro do Professor:</label><br>
            <input type="number" name="registro" required><br><br>

            <input type="submit" value="Registrar">
        </div>

    </form>

    <button id="tabela" onclick="window.location.href='tabelaProfessor.php'">Cadastros</button>
    <button onclick="window.location.href='menu.php'">Voltar</button>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        $curso = $_POST["curso"];
        $sala = $_POST["sala"];
        $registro = $_POST["registro"];

        $servername = "localhost";
        $database = "senai";
        $username = "root";
        $password = "";

        // CRIA CONEXÃO
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }

        echo "Conectado com sucesso";

        $sql = " INSERT INTO professor(
            professor_nome,
            professor_telefone,
            professor_curso,
            professor_sala,
            professor_registro
            ) VALUES (
            '$nome',
            '$telefone',
            '$curso',
            '$sala',
            '$registro'
            ); ";

        if (mysqli_query($conn, $sql)) {
            echo "<br>Enviado Com successo";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    ?>

</body>

</html>