<?php
    session_start();
    include_once('config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }
    $logado = $_SESSION['usuario'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM arquivos WHERE id LIKE '%$data%' or nome LIKE '%$data%' or prontuario LIKE '%$data%' or nome_documento LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM arquivos ORDER BY id DESC";
    }
    //$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>consulta paciente</title>
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
            top: 26%;
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
            <a class="navbar-brand" href="sistema.php">Consulta paciente</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
        <a href="resultado.php" class="btn btn-warning me-5">Vizualizar</a>
        <a href="home.php" class="btn btn-warning me-5">Voltar</a>
        <a href="importar.php" class="btn btn-danger me-5">Importar</a>
        <a href="formulario.php" class="btn btn-light me-5">Adicionar</a>
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
            
        </div>
    </nav>
    <br>
    <?php
        echo "<h4>Usuário <u>$logado</u></h4>";
        
        // if (isset($_SESSION['msg'])){
        //     echo $_SESSION['msg'];
        //     unset ($_SESSION['msg']);
            
        //}
    ?>
    <br>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    </nav>

<br><br>
<?php
include_once ('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Listar</title>
</head>

<body>

    <h1>Listar exames</h1>

    

<table class="table table-dark table-striped">
<?php
        $query_arquivos = "SELECT id, prontuario, nome_documento FROM arquivos ORDER BY id DESC";
        $result_arquivos = $conn->prepare($query_arquivos);
        $result_arquivos->execute();

        if(($result_arquivos) and ($result_arquivos->rowCount() != 0)){
            while($row_arquivo = $result_arquivos->fetch(PDO::FETCH_ASSOC)){
                //var_dump($row_arquivo);
                extract($row_arquivo);
                echo "ID: $id <br>";
                echo "Número do prontuario: $prontuario <br>";
                echo "Exame: <a href='visualizar_arquivo.php?id=$id' target='_blank'>$nome_documento</a> <br>";
                echo "<hr>";
            }
        }else{
            echo "<p style='color: #f00;'>Erro: Nenhum arquivo encontrado!</p>";
        }
    ?>

        




</body>

</html>