<?php

$servername = "localhost";
$database = "senai";
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
    <title>Cadastro Emprestimo</title>
    <link rel="stylesheet" href="_css/emprestimo.css">
</head>

<body>
    <form method="post">

        <div id="formulario">

            <label for="idProfessor">ID DO PROFESSOR:</label>
            <select name="id" id="professorId">
                <?php

                $sqlCliente = 'SELECT id_professor from professor';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["id_professor"] . "|" . $row["id_professor"] . '">' . $row["id_professor"] . '</option>';
                }
                ?>
            </select>

            <label for="EmprestimoSala">Sala do Emprestimo:</label>
            <input type="text" name="sala" required><br>

            <label for="EmprestimoPatrimonio">Patrimonio a ser Emprestado:</label>
            <input type="text" name="patrimonio" required><br>

            <label for="EmprestimoDescricao">Descrição do Emprestimo:</label>
            <input type="text" name="descricao" required><br>

            <label for="EmprestimoQuantidade">Quantidade do Emprestimo:</label>
            <input type="number" name="quantidade" required><br>

            <label for="EmprestimoData">Data do emprestimo:</label>
            <input type="text" name="data" required><br>

            <label for="PatrimonioCodigo">Codigo do Patrimonio:</label>
            <select name="codigo" id="patrimonioCodigo">
                <option value="">Escolha um codigo</option>

                <?php
                $sqlCliente = 'SELECT patrimonio_codigo from patrimonio';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["patrimonio_codigo"] . "|" . $row["patrimonio_codigo"] . '">' . $row["patrimonio_codigo"] . '</option>';
                }
                ?>

            </select><br><br>

            <label for="PatrimonioCor">Cor do Patrimonio:</label>
            <input type="text" name="cor" required><br>

            <input type="submit" value="Cadastrar">

        </div>

    </form>

    <button id="tabela" onclick="window.location.href='tabelaEmprestimo.php'">Cadastros</button>
    <button onclick="window.location.href='menu.php'">Voltar</button>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {
        $id = $_POST["id"];
        $sala = $_POST["sala"];
        $patrimonio = $_POST["patrimonio"];
        $descricao = $_POST["descricao"];
        $quantidade = $_POST["quantidade"];
        $data = $_POST["data"];
        $codigo = $_POST["codigo"];
        $cor = $_POST["cor"];

        echo "Conectado com sucesso";

        $sql = " INSERT INTO emprestimo(
            id_professor,
            emprestimo_sala,
            emprestimo_patrimonio,
            emprestimo_descricao,
            emprestimo_quantidade,
            emprestimo_data,
            emprestimo_codigopatrimonio,
            emprestimo_corpatrimonio
            ) VALUES (
            '$id',
            '$sala',
            '$patrimonio',
            '$descricao',
            '$quantidade',
            '$data',
            '$codigo',
            '$cor'
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