<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados dos medicos:</title>
    <link rel="stylesheet" href="../_css/registroMedicos.css">
</head>

<body>
    <?php

    $servername = "localhost";
    $database = "hospital";
    $username = "root";
    $password = "";

    // CRIA CONEXÃO
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // VERIFICA ESCOLHA DE CAMPOS
    $sql = "SELECT * FROM medico";


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
        echo "Especialidade:";
        echo "</th>";

        echo "<th>";
        echo "Numero RM:";
        echo "</th>";

        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['id_medico'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['nome_medico'];
        echo "</td>";

        echo "<td>";
        echo $linha['especialidade_medico'];
        echo "</td>";

        echo "<td>";
        echo $linha['numero_rm'] . "<br>";
        echo "</td>";

        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($conn);

    ?>

    <br><br>

    <button onclick="window.location.href='menu.php'">Voltar:</button>

</body>

</html>