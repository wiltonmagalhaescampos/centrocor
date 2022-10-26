<?php

session_start();
// print_r($_SESSION);

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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Centrocor menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
      box-sizing: border-box;
      height: 100vh;
      width: 100vw;
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
      height: 100vh;
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

    ul, li {
      transition: transform 0.6s ease-in-out;
      list-style: none;
    }

    li > a {
      color: white;
      text-decoration: none;
    }

    li > a:hover {
      color: white;
      transform: scale(1.5);
    }

    .img-logo {
      margin-left: 30px;
      width: 8rem;
    }

    .bnt-logout {
      display: none;
    }
    
    button > a {
      color: white;
      text-decoration: none;
      font-weight: bold;
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
          <button 
            onclick="logout()"
            type="button" 
            class="bnt-logout btn btn-danger"
          >
          Sair
          </button>
        </div>
      </div>
    </header>
    
    <main class="container-main d-flex flex-column">
      <div class="content-list d-flex justify-content-evenly">
        <ul class="d-flex">
          <li class="m-3">
            <a href="sistema.php">
              Consultar exames
            </a>
          </li>
          <li class="m-3">
            <a href="formulario.php">
              Cadastrar exames
            </a>
          </li>
          <li class="m-3">
            <a href="usuarios.php">
              Cadastrar Usuarios
            </a>
          </li>
          <li class="m-3">
            <a href="imprimir.php">
              Imprimir Exames
            </a>
          </li>
          <li class="m-3">
            <a href="">
              frase Doctor
            </a>
          </li>
          <li class="m-3">
            <a href="">
              Codigos de exames
            </a>
          </li>
          <li class="m-3">
            <a href="importar.php">
              Importar
            </a>
          </li>
          <li class="m-3">
            <a href="pdf.php">
              Gerar PDF
            </a>
          </li>
          <li class="m-3">
            <a href="visualizar_arquivo.php">
              visualizar exames
            </a>
          </li>
          <li class="m-3">
            <a href="resultado.php">
              Gerar Resultados
            </a>
          </li>
        </ul>
      </div>
    </main>
  </div>

  <script>
    
    let user = document.querySelector("#user");
    let button = document.querySelector(".bnt-logout")
    
    user.addEventListener("click", function() {
      if(button.style.display === "none") {
        button.style.display = "block"
      } else {
        button.style.display = "none"
      }
    })
    
    
    function logout() {
    
    
      let conf = confirm('Deseja sair?')
      
      if(conf === true) {
        window.location.href ="sair.php"
      } else {
        return;
      }
    }
    
  </script>
</body>
</html>