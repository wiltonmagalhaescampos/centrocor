<?php
session_start();

if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Importar txt</title>
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

    .form-content {
      color: white;
      background-color: rgba(0, 0, 0, 0.3);
      width: 600px;
      padding: 10px;
      margin-top: 30px;
      border-radius: 5px;
    }

    .form-content>h3 {
      font-weight: 700;
    }

    .form-container {
      margin-top: 100px;
    }

    .form-content>h3 {
      margin-bottom: 50px;
      margin-top: 10px;
    }

    .form-content>form {
      margin-bottom: 10px;
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
  
  <?
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
  
  <div class="form-container d-flex flex-column align-items-center">
    <div class="form-content d-flex flex-column align-items-center">
      <h3>Importar dados do aquivo txt do A3info</h3>
      <form method="POST" action="processa.php" enctype="multipart/form-data">
        <label>Procurar dados txt</label>
        <input type="file" name="arquivo" multiple required>
        <input type="submit" value="importar">
      </form>
    </div>
  </div>



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