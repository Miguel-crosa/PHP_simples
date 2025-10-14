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

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_css/denuncia.css">
    <title>Cadastro Emprestimo</title>
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


            <label for="EmprestimoSala">Sala da Denuncia:</label>
            <input type="text" name="sala" required><br>

            <label for="EmprestimoPatrimonio">Patrimonio a ser Denunciado:</label>
            <select name="patrimonio" id="patrimonioEmprestimo">
                <option value="">Escolha o patrimonio</option>

                <?php
                $sqlCliente = 'SELECT patrimonio_nome from patrimonio';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["patrimonio_nome"] . "|" . $row["patrimonio_nome"] . '">' . $row["patrimonio_nome"] . '</option>';
                }
                ?>

            </select><br><br>

            <label for="EmprestimoDescricao">Descrição da denuncia:</label>
            <input type="text" name="descricao" required><br>

            <label for="EmprestimoQuantidade">Quantos estão faltando:</label>
            <input type="number" name="quantidade" required><br>

            <label for="EmprestimoData">Data da denuncia:</label>
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

            <input type="submit" value="Registro">

        </div>

    </form>

    <button id="tabela" onclick="window.location.href='tabelaDenuncia.php'">Cadastros</button>
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

        $sql = "INSERT INTO denuncia(
            denuncia_sala,
            denuncia_patrimonio,
            denuncia_descricao,
            denuncia_falta,
            denuncia_data,
            denuncia_codigopatrimonio,
            denuncia_corpatrimonio,
            professor_id_professor
            ) VALUES (
            '$sala',
            '$patrimonio',
            '$descricao',
            '$quantidade',
            '$data',
            '$codigo',
            '$cor',
            '$id'
            ); ";

        if (mysqli_query($conn, $sql)) {
            echo "<br> <p id='executado'>Registro enviado com sucesso </p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    ?>

</body>

</html>