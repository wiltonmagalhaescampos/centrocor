<?php

session_start();
//print_r($_SESSION);

if ((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['usuario']);
  unset($_SESSION['senha']);
  header('Location: index.php');
}

$locado = $_SESSION['usuario'];
$logado = $_SESSION['usuario'];



if (isset($_POST['submit'])) {
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" type="image/png" href="./assets/Logo_CENTROCOR-01.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Cadastro de usuario</title>
</head>
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

  .box {
    color: white;
    width: 100%;
  }

  fieldset {
    border: 3px solid dodgerblue;

  }

  .form-user {
    background-color: rgba(0, 0, 0, 0.3);
    padding: 10px;
    width: 80%;
  }

  legend {
    border: 1px solid dodgerblue;
    padding: 10px;
    text-align: center;
    background-color: dodgerblue;
    color: white;
  }

  .inputBox {
    position: relative;
  }

  .inputBox>label {
    padding-left: 4px;
  }

  .inputUser {
    background: none;
    border: none;
    border-bottom: 1px solid white;
    outline: none;
    color: white;
    font-size: 15px;
    width: 100%;
    letter-spacing: 1px;

  }

  .labelInput {
    position: absolute;
    top: 0%;
    left: 0%;
    pointer-events: none;
    transition: .5s;
  }

  .inputUser:focus~.labelInput,
  .inputUser:valid~.labelInput {
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

  #submit {
    background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    width: 100%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;

  }

  #submit:hover {
    background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
  }

  .voltar {

    background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;

  }

  .voltar:hover {
    background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
  }
</style>

<body class="d-flex flex-column">
  <div class="">
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

    <main class="container-main d-flex flex-column">
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
    </main>
  </div>


  <div class="box d-flex align-items-center justify-content-center pt-5">
    <form class="form-user" action="usuarios.php" method="POST">
      <fieldset>
        <legend class="legend"><b>Cadastro de Usuario</b></legend>

        <br><br>


        <label class="px-1" for="data_cadastro">Data do cadastro</label>
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

        <p class="px-1">Unidade</p>
        <div class="px-1">
          <input type="radio" id="matriz" name="local" value="matriz" required>
          <label for="matriz">Matriz</label>

          <input type="radio" id="filial" name="local" value="filial" required>
          <label for="filial">Filial</label>

        </div>
        <br><br>

        <div>
          <input type="submit" name="submit" id="submit" value="Cadastrar">
        </div>

      </fieldset>
    </form>
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