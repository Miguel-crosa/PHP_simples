<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/prontuario.css">
    <title>Cadastro Prontuario</title>
</head>

<body>

    <button id="voltar" onclick="window.location.href='menu.php'">Voltar</button>

    <form method="post" enctype="multipart/form-data">

        <div id="formulario">
            <br><br>
            <label for="id-pasc">ID do paciente:</label> <br><br>
            <input type="number" id="idPaciente" name="paciente"><br><br>
            <label for="id-medico">ID do medico:</label> <br><br>
            <input type="number" id="idMed" name="medico"><br><br>
            <label for="data-consulta">Data da consulta:</label> <br><br>
            <input type="text" name="consulta" id="dataConsulta"><br><br>
            <label for="data-registro">Data do registro:</label><br><br>
            <input type="text" name="registro" id="dataRegistro"><br><br>
            <label for="descricao-sintomas">Descrição dos sintomas:</label><br><br>
            <input type="text" name="sintomas" id="descSintomas"><br><br>
            <label for="descricao-medico">Descrição do medico:</label><br><br>
            <input type="text" name="descMedico" id="descricao-medico"><br><br>
            <label for="Presc">Prescrição:</label><br><br>
            <input type="text" name="presc" id="prescricao"><br><br>
            <label for="Obser">Observação:</label><br><br>
            <input type="text" name="obs" id="observacao"><br><br>
            <input type="file" name="arquivo" id="arquivos"><br><br>

            <input type="submit" value="Enviar Informações"><br>
        </div>

    </form>


    <button id="registros" onclick="window.location.href='registroProntuario.php'">Ver os Prontuarios</button>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == ("POST")) {

        $paciente = $_POST["paciente"];
        $medico = $_POST["medico"];
        $consulta = $_POST["consulta"];
        $registro = $_POST["registro"];
        $sintomas = $_POST["sintomas"];
        $descMedico = $_POST["descMedico"];
        $presc = $_POST["presc"];
        $obs = $_POST["obs"];
        $arquivo = $_FILES["arquivo"];
        $pasta_destino = "arquivoMedia/";

        if ($arquivo["error"] === UPLOAD_ERR_OK) {
            $nome_temp = $arquivo["tmp_name"];
            $nome_final = $pasta_destino . basename($arquivo["name"]);

            if (!file_exists($pasta_destino)) {
                mkdir($pasta_destino, 0755, true);
            }

            if (move_uploaded_file($nome_temp, $nome_final)) {
                echo "Arquivo enviado com successo";
            } else {
                echo "Falha ao mover o arquivo";
            }
        } else {
            echo " Erro no upload" . basename($arquivo["name"]);
        }

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

        $sql = " INSERT INTO prontuario(
            id_paciente,
            id_medico,
            data_consulta,
            data_registro,
            descricao_sintomas,
            descricao_medico,
            prescricao,
            observacao,
            img
            ) VALUES (
            '$paciente',
            '$medico',
            '$consulta',
            '$registro',
            '$sintomas',
            '$descMedico',
            '$presc',
            '$obs',
            '$nome_final'
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