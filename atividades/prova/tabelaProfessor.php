<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados dos professores:</title>
    <link rel="stylesheet" href="_css/tabelaProfessor.css">
</head>

<body>
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

    // VERIFICA ESCOLHA DE CAMPOS
    $sql = "SELECT * FROM professor";


    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    // LOOP PARA LER TODOS OS REGISTROS
    // $registro = mysqli_fetch_array($resultado);

    echo "<table>";

    while ($linha = mysqli_fetch_assoc($resultado)) {

        echo "<tr>";

        echo "<th>";
        echo "ID:";
        echo "</th>";

        echo "<th>";
        echo "Nome:";
        echo "</th>";

        echo "<th>";
        echo "Telefone:";
        echo "</th>";

        echo "<th>";
        echo "Curso:";
        echo "</th>";

        echo "<th>";
        echo "Sala:";
        echo "</th>";

        echo "<th>";
        echo "Registro:";
        echo "</th>";

        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['id_professor'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['professor_nome'];
        echo "</td>";

        echo "<td>";
        echo $linha['professor_telefone'];
        echo "</td>";

        echo "<td>";
        echo $linha['professor_curso'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['professor_sala'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['professor_registro'] . "<br>";
        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($conn);

    ?>

    <br><br>

    <button onclick="window.location.href='menu.php'">Voltar</button>

</body>

</html>