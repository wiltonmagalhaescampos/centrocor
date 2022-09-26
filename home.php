<?php

    session_start();
       // print_r($_SESSION);

    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }
    $logado = $_SESSION['usuario'];

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centrocor menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
                text-align: center;
                color: white;
            }

            .box{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: rgb(0,0,0,0.4);
                padding: 90px;
                border-radius: 10px;
            }
            a{
                text-decoration: none;
                color: white;
                border: 3px solid dodgerblue;
                border-radius: 10px;
                padding: 10px;
            }
            a:hover{
                background-color: dodgerblue;
            }

        </style>



</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Centrocor Diagnostico</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="sair.php" class="btn btn-danger me-5">logout</a>
            
        </div>
    </nav>
    <h3>Sistema de consulta e impressão de exames</h3>
    <h4>__________________________________________________________________</h4>
    <?php
        echo "<h5>Usuário <u>$logado</u></h5>";
    ?>
    <br><br><br>

        <div class="box"> 
            <a href="sistema.php" >Consultar exames</a>
            <a href="formulario.php">Cadastrar exames</a>
            
            <a href="usuarios.php">Cadastrar Usuarios</a>
            <a href="imprimir.php">Imprimir Exames</a>
            
            <a href="">frase Doctor</a>
            <br><br><br>
            <a href="">Codigos de exames</a>
            
            <a href="importar.php">Importar</a>
            <a href="pdf.php">Gerar PDF</a>
            
            <a href="visualizar_arquivo.php">visualizar exames</a>
            <a href="resultado.php">Gerar Resultados</a>
            
            
        </div>
        
           
        
</body>

</html>