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
    <link rel="stylesheet" href="../_css/movimentacao.css">
    <title>Movimentação</title>
</head>

<body>

    <h1 class="texto">Cadastro Movimentações</h1>

    <div class="formulario">

        <form method="post">

            <label for="id-Inst">ID da Instituição:</label><br>
            <select name="idInst" id="idInst" required>
                <?php

                $sqlCliente = 'SELECT id_instituicao FROM instituicao_financeira';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["id_instituicao"] . "|" . $row["id_instituicao"] . '">' . $row["id_instituicao"] . '</option>';
                }
                ?>

            </select> <br>

            <label for="id-Agencia">ID da agencia:</label><br>
            <select name="idAgencia" id="idAgencia" required>
                <?php

                $sqlCliente = 'SELECT id_agencia FROM agencia';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["id_agencia"] . "|" . $row["id_agencia"] . '">' . $row["id_agencia"] . '</option>';
                }
                ?>

            </select> <br>


            <label for="id-conta">ID da conta:</label><br>
            <select name="idConta" id="idConta" required>
                <?php

                $sqlCliente = 'SELECT id_conta FROM conta_bancaria';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["id_conta"] . "|" . $row["id_conta"] . '">' . $row["id_conta"] . '</option>';
                }
                ?>

            </select> <br>

            <label for="id-Cliente">ID do Cliente:</label><br>
            <select name="idCliente" id="idCliente" required>
                <?php

                $sqlCliente = 'SELECT id_cliente FROM cliente';
                $resulta = $conn->query($sqlCliente);
                while ($row = $resulta->fetch_assoc()) {
                    echo '<option value="' . $row["id_cliente"] . "|" . $row["id_cliente"] . '">' . $row["id_cliente"] . '</option>';
                }
                ?>

            </select> <br>

            <label for="descricaoMov">Descrição:</label><br>
            <input type="text" name="descricao" placeholder="Insira a descrição do movimento" required> <br>

            <label for="valorMov">Valor do Movimento</label><br>
            <input type="number" name="valor" placeholder="Insira o valor do movimento" required> <br>

            <label for="tipoMov">Tipo do movimento</label><br>
            <input type="text" name="tipo" placeholder="Credito Ou Debito" required> <br>

            <label for="dataMov">Data da movimentacao</label><br>
            <input type="date" name="data"> <br><br>

            <input type="submit" value="Cadastrar">

        </form>

    </div>

    <button id="voltar" onclick="window.location.href='./menuU.html'">VOLTAR</button>


    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {

        $idInst = $_POST['idInst'];
        $idAg = $_POST['idAgencia'];
        $idCo = $_POST['idConta'];
        $idCliente = $_POST['idCliente'];
        $desc = $_POST['descricao'];
        $valor = $_POST['valor'];
        $tipo = $_POST['tipo'];
        $data_pre = $_POST['data'];
        $data = date("Y-m-d", strtotime($data_pre));

        $sql = "INSERT INTO movimentacao (
         id_instituicao,
         id_agencia,
         id_conta,
         id_cliente_mov,
         descricao,
         valor,
         tipo_movimentacao,
         data_movimentacao
        ) VALUES(
         '$idInst',
         '$idAg',
         '$idCo',
         '$idCliente',
         '$desc',
         '$valor',
         '$tipo',
         '$data'
        )";

        if (mysqli_query($conn, $sql)) {
            echo "<br><p class='envio'>Enviado Com successo</p>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


        mysqli_close($conn);
    }



    ?>

</body>

</html>