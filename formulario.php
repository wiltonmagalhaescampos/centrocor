<?php

session_start();
//print_r($_SESSION);

if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
{
unset($_SESSION['usuario']);
unset($_SESSION['senha']);
header('Location: index.php');
}
$locado = $_SESSION['usuario'];


    if(isset($_POST['submit']))
{

   include_once('config.php');

        $data_exame = $_POST['data_exame'];
        $prontuario = $_POST['prontuario'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $convenio = $_POST['convenio'];
        $medico_solicitante = $_POST['medico_solicitante'];
        $medico_executante = $_POST['medico_executante'];
        $procedimento = $_POST['procedimento'];
        $email = $_POST['email'];
        $protocolo = $_POST['Protocolo'];
        $cpf = $_POST['cpf'];
        // $sexo = $_POST['genero'];
        // $exames = $_POST['exames'];
        

    $result = mysqli_query($conexao, "INSERT INTO pacientes(data_exame,prontuario,nome,telefone,convenio,medico_solicitante,medico_executante,procedimento,email,protocolo,cpf) VALUES ('$data_exame','$prontuario','$nome','$telefone','$convenio','$medico_solicitante','$medico_executante','$procedimento','$email','$prontuario','$cpf')");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cadastro de paciente</title>
</head>
<style>
body{
    
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
}
.box{
    position: absolute;
    color: white;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.3);
    padding: 15px;
    border-radius: 15px; 
    width: 20%;
}
fieldset{
    border: 3px solid dodgerblue;
    border-radius: 20px;

}
legend{
    border: 1px solid dodgerblue;
    padding: 4px;
    text-align: center;
    background-color: dodgerblue;
    border-radius: 5px;
    color: white;
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
    letter-spacing: 1px;

}
.labelInput{
    position: absolute;
    top: 0%;
    left: 0%;
    pointer-events: none;
    transition: .5s;
}
.inputUser:focus ~ .labelInput,
.inputUser:valid ~ .labelInput{
    top: -20px;
    font-size: 12px;
    color: dodgerblue;
}

#data_exame {
    border: none;
    padding: 8px;
    border-radius: 10px;
    outline: none;
    font-size: 15px;
}

#submit{
    background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;

}
#submit:hover{
    background-image: linear-gradient(to right, rgb(0, 80, 172),rgb(80, 19, 195));
}

</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cadastro de Paciente</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
                <a href="home.php" class="btn btn-warning me-5">Voltar</a>
                    <a href="sistema.php" class="btn btn-success me-5">cosnultar</a>
                        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    
        </div>
    </nav>

    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
           
           
                <legend class="legend"><b>Cadastro de Paciente</b></legend>
           
            <br><br>


                    <label for="data_exame">Data do Exame</label> 
                    <input type="date" name="data_exame" id="data_exame" required>
                 
            <br><br>
                <div class="inputBox">
                    <input type="text" name="prontuario" id="prontuario" class="inputUser" required>
                    <label for="prontuario" class="labelInput">Prontuario</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome do Paciente</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="telefone" id="telefone" class="inputUser" required>
                    <label for="number" class="labelInput">Telefone</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="convenio" id="convenio" class="inputUser" required>
                    <label for="convenio" class="labelInput">Convenio</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="medico_solicitante" id="medico_solicitante" class="inputUser" required>
                    <label for="medico_solicitante" class="labelInput">Medico Solicitante</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="medico_executante" id="medico_executante" class="inputUser" required>
                    <label for="medico_executante" class="labelInput">Medico Executante</label>
                </div>
            <br><br>
            <div class="inputBox">
                    <input type="text" name="procedimento" id="procedimento" class="inputUser" required>
                    <label for="procedimento" class="labelInput">Procedimento</label>
                </div>
            <br><br>
            <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
            <br><br>
            <div class="inputBox">
                    <input type="text" name="Protocolo" id="Protocolo" class="inputUser" required>
                    <label for="Protocolo" class="labelInput">Protocolo de entendimento</label>
                </div>
            <br><br>
            <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" required>
                    <label for="cpf" class="labelInput">CPF</label>
            </div>
            <br>
                        <div><input type="submit" name="submit" id="submit" value="Cadastrar">
                                                              
                        </div>                                              
            </fieldset>
        </form>
      </div>
</body>
</html>