<?php
session_start();
include_once('config.php');
// print_r($_SESSION);
if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('Location: index.php');
}
$logado = $_SESSION['usuario'];
if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM arquivos WHERE id LIKE '%$data%' or nome LIKE '%$data%' or prontuario LIKE '%$data%' or nome_documento LIKE '%$data%' ORDER BY id DESC";
} else {
  $sql = "SELECT * FROM arquivos ORDER BY id DESC";
}
//$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>consulta paciente</title>
  <style>
    body {
      font-family: Roboto, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
      box-sizing: border-box;
      color: white;
    }

    .header {
      background: linear-gradient(to right, rgb(249, 249, 249), rgb(17, 54, 71));
      height: 150px;
    }

    .user-container {
      transition: .2s ease;
      width: 100px;
      margin-right: 20px;
      align-items: center;
    }

    .icon-user {
      background: white;
      cursor: pointer;
      margin-bottom: 4px;
      border-radius: 50%;
      width: 50px;
    }

    .container {
      width: 100vw;
    }

    .container-main {
      height: 50px;
      padding: 0;
      margin-top: 10px;
    }

    .content-list {
      align-items: center;
    }

    ul {
      padding: 0;
      box-sizing: border-box;
    }

    ul>li {
      height: 30px;
      padding: 10px;
      margin: 10px 5px;
      list-style: none;
    }

    li>a {
      color: white;
      text-decoration: none;
      transition: transform .2s ease;
    }

    .menu:hover {
      color: white;
      border-bottom: .6px solid white;
      transform: scale(1.1);
    }

    .img-logo {
      margin-left: 30px;
      width: 8rem;
    }

    .bnt-logout {
      display: none;

    }

    button>a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }

    .table-bg {
      background: rgba(0, 0, 0, 0.3);
      border-radius: 15px 15px 0 0;
    }

    .box-search {
      display: flex;
      justify-content: center;
      gap: .1%;
    }

    .container-list-exams {
      width: 80%;
    }

    .Input {
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
  <div class="container-fluid p-0 m-0">
    <header class="header d-flex justify-content-between navbar navbar-expand-lg navbar-dark">
      <div class="">
        <a class="navbar-brand" href="#">
          <img src="./assets/Logo_CENTROCOR-01.png" class="img-logo" alt="Logo centrocor">
        </a>
      </div>
      <div class="user-container d-flex flex-column justify-content-center">
        <img id="user" class="icon-user" src="./assets/usuario.png" alt="Icone de usuário">
        <?php
        echo "<h6>$logado</h6>";
        ?>
        <div class="bnt-logout-container d-flex">
          <button onclick="logout()" type="button" class="bnt-logout btn btn-danger">
            Sair
          </button>
        </div>
      </div>
    </header>

    <nav class="container-main d-flex flex-column">
      <div class="content-list d-flex justify-content-evenly">
        <ul class="d-flex flex-row">
          <li class="d-flex align-items-center justify-content-center">
            <a class="menu" href="sistema.php">
              Consultar exames
            </a>
          </li>
          <li class="d-flex align-items-center justify-content-center">
            <a class="menu" href="formulario.php">
              Cadastrar exames
            </a>
          </li>
          <li class="d-flex align-items-center justify-content-center">
            <a class="menu" href="usuarios.php">
              Cadastrar Usuarios
            </a>
          </li>
          <li class="d-flex align-items-center justify-content-center">
            <a class="menu" href="imprimir.php">
              Imprimir Exames
            </a>
          </li>
          <li class="d-flex align-items-center justify-content-center">
            <a class="menu" href="">
              frase Doctor
            </a>
          </li>
          <li class="d-flex align-items-center justify-content-center">
            <a class="menu" href="">
              Codigos de exames
            </a>
          </li>
          <li class="d-flex align-items-center justify-content-center">
            <a class="menu" href="importar.php">
              Importar
            </a>
          </li>
          <li class="d-flex align-items-center justify-content-center">
            <a class="menu" href="pdf.php">
              Gerar PDF
            </a>
          </li>
          <li class="d-flex align-items-center justify-content-center">
            <a class="menu" href="visualizar_arquivo.php">
              visualizar exames
            </a>
          </li>
          <li class="d-flex align-items-center justify-content-center">
            <a class="menu" href="resultado.php">
              Gerar Resultados
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <main>
    <br>
    <?php
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
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg>
      </button>
    </div>
    <div class="container-list-exams d-flex flex-column align-items-center py-4">
      <h1>Listar exames</h1>
      <table class="table table-dark table-striped">
        <?php
        $query_arquivos = "SELECT id, prontuario, nome_documento FROM arquivos ORDER BY id DESC";
        //$result_arquivos = $conn->prepare($query_arquivos);
        //$result_arquivos->execute();
        // if (($result_arquivos) and ($result_arquivos->rowCount() != 0)) {
        //   while ($row_arquivo = $result_arquivos->fetch(PDO::FETCH_ASSOC)) {
        //     var_dump($row_arquivo);
        //     extract($row_arquivo);
        //     echo "ID: $id <br>";
        //     echo "Número do prontuario: $prontuario <br>";
        //     echo "Exame: <a href='visualizar_arquivo.php?id=$id' target='_blank'>$nome_documento</a> <br>";
        //     echo "<hr>";
        //   }
        // } else {
        //   echo "<p style='color: #f00;'>Erro: Nenhum arquivo encontrado!</p>";
        // }
        ?>
      </table>
    </div>
  </main>



  <script>
    let user = document.querySelector("#user");
    let button = document.querySelector(".bnt-logout")

    user.addEventListener("click", function() {
      if (button.style.display === "none") {
        button.style.display = "block"
      } else {
        button.style.display = "none"
      }
    })


    function logout() {


      let conf = confirm('Deseja sair?')

      if (conf === true) {
        window.location.href = "sair.php"
      } else {
        return;
      }
    }
  </script>

</body>

</html>