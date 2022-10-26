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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Cadastro de paciente</title>
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
    transform: translate(13%, 5%);
    background-color: rgba(0, 0, 0, 0.3);
    padding: 10px;
    width: 80%;
    margin-bottom: 30vh;
  }

  fieldset {
    border: 3px solid dodgerblue;
  }

  .date-label {
    padding-left: 4px;
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

  <div class="box">
    <form action="formulario.php" method="POST">
      <fieldset>


        <legend class="legend"><b>Cadastro de Paciente</b></legend>

        <br><br>


        <label class="date-label" for="data_exame">Data do Exame</label>
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