<?php


    if(!empty($_GET['id']))
    {

        include_once('config.php');

        $id = $_GET['id'];
        $sqlSelect = "SELECT * FROM pacientes WHERE id=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $data_exame = $user_data['data_exame'];
                $prontuario = $user_data['prontuario'];
                $nome = $user_data['nome'];
                $telefone = $user_data['telefone'];
                $convenio = $user_data['convenio'];
                $medico_solicitante = $user_data['medico_solicitante'];
                $medico_executante = $user_data['medico_executante'];
                $procedimento = $user_data['procedimento'];
                $email = $user_data['email'];
                $protocolo = $user_data['protocolo'];
                $cpf = $user_data['cpf'];
                // $sexo = $user_data['sexo'];
                // $exames = $user_data['exames'];
            }
        }
        else
        {
            header('Location: sistema.php');
        }
    }
    else
    {
        header('Location: sistema.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/Logo_CENTROCOR-01.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Alteração de dados</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 620px;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 10px;
            border-radius: 15px;
            width: 1080px;
        }
        fieldset{
            border: 3px solid dodgerblue;
            border-radius: 15px;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 5px;
            text-align: 10px;
            background-color: dodgerblue;
            border-radius: 5px;
        }
        .inputBox{
            position: relative;

        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 1px;
            left: 1px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #update{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #update:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }

        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Atualização de dados</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
        <a href="sistema.php" class="btn btn-warning me-5">Voltar</a>
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>

        </div>
    </nav>
    <br><br>
    <div class="box">
        <form action="saveEdit.php" method="POST">

        <legend><b></b></legend>
        <fieldset>

                <br>
                <div class="inputBox">
                <label for="data_exame">Data do Exame</label>
                    <input type="date" name="data_exame" id="data_exame" value=<?php echo $data_exame;?> required>

            <br><br>
                <div class="inputBox">
                    <input type="text" name="prontuario" id="prontuario" class="inputUser" value="<?php echo $prontuario;?>" required>
                    <label for="prontuario" class="labelInput">Prontuario</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome;?>" required>
                    <label for="nome" class="labelInput">Nome do Paciente</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone;?>" required>
                    <label for="number" class="labelInput">Telefone</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="convenio" id="convenio" class="inputUser" value="<?php echo $convenio;?>" required>
                    <label for="convenio" class="labelInput">Convenio</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="medico_solicitante" id="medico_solicitante" class="inputUser" value="<?php echo $medico_solicitante;?>" required>
                    <label for="medico_solicitante" class="labelInput">Medico Solicitante</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="medico_executante" id="medico_executante" class="inputUser" value="<?php echo $medico_executante;?>" required>
                    <label for="medico_executante" class="labelInput">Medico Executante</label>
                </div>
            <br><br>
            <div class="inputBox">
                    <input type="text" name="procedimento" id="procedimento" class="inputUser" value="<?php echo $procedimento;?>" required>
                    <label for="procedimento" class="labelInput">Procedimento</label>
                </div>
            <br><br>
            <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email;?>" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
            <br><br>
            <div class="inputBox">
                    <input type="text" name="protocolo" id="protocolo" class="inputUser" value="<?php echo $protocolo;?>" required>
                    <label for="protocolo" class="labelInput">Prontocolo</label>
                </div>
            <br><br>
            <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" value="<?php echo $cpf;?>" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div>
            <br><br>

            	<input type="hidden" name="id" value="<?php echo $id ?>">

                <input type="submit" name="update" id="update" value="Alterar os dados do paciente">
                <br><br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>