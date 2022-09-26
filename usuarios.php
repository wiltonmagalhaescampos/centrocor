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
   // print_r('Data do exame: ' . $_POST['data_exame']);
   // print_r('<br>');
   // print_r('idade: ' . $_POST['idade']);
   // print_r('<br>');
   // print_r('Nome do paciente: ' . $_POST['nome']);
   // print_r('<br>');
   // print_r('Pocedimento: ' . $_POST['procedimento']);
   // print_r('<br>');
   // print_r('Endereço: ' . $_POST['endereco']);
   // print_r('<br>');
   // print_r('Telefone: ' . $_POST['telefone']);
   // print_r('<br>');
   // print_r('Email: ' . $_POST['email']);
   // print_r('<br>');
   // print_r('tipo de procedimento: ' . $_POST['exames']);

   include_once('config.php');

        $data_cadastro =  $_POST['data_cadastro'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $unidade = $_POST['local'];

        

    $result = mysqli_query($conexao, "INSERT INTO usuarios (data_cadastro,usuario,senha,nome,unidade) VALUES ('$data_cadastro','$usuario','$senha','$nome','$unidade')");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuario</title>
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
    padding: 10px;
    border-radius: 15px; 
    width: 95%;
}

fieldset{
    border: 3px solid dodgerblue;
    border-radius: 20px;

}
legend{
    border: 1px solid dodgerblue;
    padding: 10px;
    text-align: center;
    background-color: dodgerblue;
    border-radius: 20px;
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

.voltar{

background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
width: 100%;
border: none;
padding: 15px;
color: white;
font-size: 15px;
cursor: pointer;
border-radius: 10px;

}

.voltar:hover{
background-image: linear-gradient(to right, rgb(0, 80, 172),rgb(80, 19, 195));
}


</style>
<body>

    <div class="box">
        <form action="usuarios.php" method="POST">
            <fieldset>
           
           
                <legend class="legend"><b>Cadastro de Usuario</b></legend>
           
            <br><br>


                    <label for="data_cadastro">Data do cadastro</label> 
                    <input type="date" name="data_cadastro" id="data_cadastro" required>
                 
            <br><br><br><br>
                <div class="inputBox">
                    <input type="text" name="usuario" id="usuario" class="inputUser" required>
                    <label for="usuario" class="labelInput">Usuario</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
            <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome sobrenome</label>
                </div>
            <br><br>

            <p>Unidade</p>
                    <div>
                        <input type="radio" id="matriz" name="local" value="matriz" required>
                        <label for="matriz">Matriz</label>
                        
                        <input type="radio" id="filial" name="local" value="filial" required>
                        <label for="filial">Filial</label>

                    </div>
            <br><br>

                        <div><input type="submit" name="submit" id="submit" value="Cadastrar">
                        <br><br><br>
                        <a class='voltar' href="home.php">Voltar</a>  
                        </div>
                        
            </fieldset>
        </form>
      </div>



</body>
</html>