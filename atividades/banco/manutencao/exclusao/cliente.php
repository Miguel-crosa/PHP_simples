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
    <link rel="stylesheet" href="../../_css/exclusão.css">
    <title>Exclusão</title>
</head>

<body>

    <h1>Exclusão de Clientes</h1>

    <form method="post">
        <label>Qual id você deseja apagar?</label>
        <select name="idDesejado" id="idDesejado">
            <?php

            $sqlCliente = 'SELECT * FROM cliente';
            $resulta = $conn->query($sqlCliente);
            while ($row = $resulta->fetch_assoc()) {
                echo '<option value="' . $row["id_cliente"] . "|" . $row["id_cliente"] . '">' . $row["id_cliente"] . '</option>';
            }
            ?>

        </select>

        <input type="submit" value="DELETAR">

    </form>

    <button onclick="window.location.href = './menu.html'">Voltar</button>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $id = $_POST['idDesejado'];

        $sql = "DELETE FROM cliente WHERE id_cliente = {$id}";

        if (mysqli_query($conn, $sql)) {
            echo "<br><p class='deletado'>Deletado Com successo</p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }

    ?>

</body>

</html>