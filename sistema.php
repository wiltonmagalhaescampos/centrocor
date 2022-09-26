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
        $sql = "SELECT * FROM pacientes WHERE id LIKE '%$data%' or nome LIKE '%$data%' or prontuario LIKE '%$data%' or procedimento LIKE '%$data%' or cpf LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM pacientes ORDER BY id DESC";
    }
    $result = $conexao->query($sql);
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
        <div class="Input">
            <form method="POST" action="processa.php" enctype="multipart/form-data">
                <label>Buscar txt</label>
                    <input type="file" name="arquivo" multiple required>
                      <input type="submit" value="importar">

        

</form>
</div>
<br><br>
<?php
        
        
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
            
        }
    ?>
<br>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data do Exame</th>
                    <th scope="col">Prontuario</th>
                    <th scope="col">Nome</th>
                    <th scope="col">telefone</th>
                    <th scope="col">Convenio</th>
                    <th scope="col">Medico Solicitante</th>
                    <th scope="col">Medico executante</th>
                    <th scope="col">Procedimento</th>
                    <!-- <th scope="col">email</th> -->
                    <th scope="col">Protocolo</th>
                    <!-- <th scope="col">CPF</th> -->
                    <!-- <th scope="col">sexo</th>
                    <th scope="col">Exames</th> -->
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result))
                     {
                        echo "<tr>";
                        echo "<td>".$user_data['id']."</td>";
                        echo "<td>".$user_data['data_exame']."</td>";
                        echo "<td>".$user_data['prontuario']."</td>";
                        echo "<td>".$user_data['nome']."</td>";
                        echo "<td>".$user_data['telefone']."</td>";
                        echo "<td>".$user_data['convenio']."</td>";
                        echo "<td>".$user_data['medico_solicitante']."</td>";
                        echo "<td>".$user_data['medico_executante']."</td>";
                        echo "<td>".$user_data['procedimento']."</td>";
                        // echo "<td>".$user_data['email']."</td>";
                        echo "<td>".$user_data['protocolo']."</td>";
                        // echo "<td>".$user_data['cpf']."</td>";
                        // echo "<td>".$user_data['sexo']."</td>";
                        // echo "<td>".$user_data['exames']."</td>";
                        //echo "<td>".$user_data['']."</td>";
                        echo "<td>
                            <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]' title='Editar'>
                                 <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                      <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]' title='Deletar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                            <a class='btn btn-sm btn-success' href='visualizar_arquivo.php'imprimir'>                        
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-printer-fill' viewBox='0 0 16 16'>
                                <path d='M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z'/>
                                     <path d='M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z'/>
                                </svg>
                            </a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'sistema.php?search='+search.value;
    }
</script>
</html>