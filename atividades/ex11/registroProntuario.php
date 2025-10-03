<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/registroProntuario.css">
    <title>Registro do Prontuario</title>
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
    $sql = "SELECT * FROM prontuario";


    $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

    // LOOP PARA LER TODOS OS REGISTROS
    // $registro = mysqli_fetch_array($resultado);

    echo "<table>";

    while ($linha = mysqli_fetch_assoc($resultado)) {

        echo "<tr>";

        echo "<th>";
        echo "ID DO PRONTUARIO:";
        echo "</th>";

        echo "<th>";
        echo "ID DO PACIENTE:";
        echo "</th>";

        echo "<th>";
        echo "ID DO MEDICO:";
        echo "</th>";

        echo "<th>";
        echo "data da Consulta:";
        echo "</th>";

        echo "<th>";
        echo "Data do Registro:";
        echo "</th>";

        echo "<th>";
        echo "Descrição dos Sintomas:";
        echo "</th>";

        echo "<th>";
        echo "Data do Medico:";
        echo "</th>";

        echo "<th>";
        echo "Prescrição:";
        echo "</th>";

        echo "<th>";
        echo "Observação:";
        echo "</th>";

        echo "<th>";
        echo "imagem:";
        echo "</th>";


        echo "</tr>";

        echo "<tr>";

        echo "<td>";
        echo $linha['id_prontuario'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['id_paciente'];
        echo "</td>";

        echo "<td>";
        echo $linha['id_medico'];
        echo "</td>";

        echo "<td>";
        echo $linha['data_consulta'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['data_registro'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['descricao_sintomas'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['descricao_medico'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['prescricao'] . "<br>";
        echo "</td>";

        echo "<td>";
        echo $linha['observacao'] . "<br>";
        echo "</td>";

        echo "<td>";
        $valorImagem = $linha['img'];
        echo "<img src='$valorImagem' width='85%'>" . "<br>";
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