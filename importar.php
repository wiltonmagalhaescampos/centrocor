<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar txt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
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

        .Input{
            position: absolute;
            color: white;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.3);
            padding: 10px;
            border-radius: 15px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Importar txt</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
        <a href="home.php" class="btn btn-warning me-5">Voltar</a>
        <a href="sistema.php" class="btn btn-light me-5">Consultar</a>
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
            
        </div>
    </nav>
    <br><br>
<h3>Importar dados do aquivo txt do A3info</h3>
<?
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            
        }
?>
<br><br>

<br><br>
<div class="Input">
<form method="POST" action="processa.php" enctype="multipart/form-data">
    <label>Procurar dados txt</label>
        <input type="file" name="arquivo" multiple required>


        <input type="submit" value="importar">
        

</form>
</div>

</body>
</html>