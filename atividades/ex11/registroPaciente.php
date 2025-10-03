<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/registroPacientes.css">
    <title>Registro do paciente</title>
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
    $sql = "SELECT * FROM paciente";


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
        echo "Cpf:";
        echo "</th>";

        echo "<th>";
        echo "Nome da Mãe:";
        echo "</th>";

        echo "<th>";
        echo "Data de Nascimento:";
        echo "</th>";

        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['id_paciente'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['nome_paciente'];
        echo "</td>";

        echo "<td>";
        echo $linha['cpf_paciente'];
        echo "</td>";

        echo "<td>";
        echo $linha['mae_paciente'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['nascimento_paciente'] . "<br>";
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