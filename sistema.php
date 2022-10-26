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
  $sql = "SELECT * FROM pacientes WHERE id LIKE '%$data%' or nome LIKE '%$data%' or prontuario LIKE '%$data%' or procedimento LIKE '%$data%' or cpf LIKE '%$data%' ORDER BY id DESC";
} else {
  $sql = "SELECT * FROM pacientes ORDER BY id DESC";
}
$result = $conexao->query($sql);
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
  <title>consulta paciente</title>
  <style>
    body {
      font-family: Roboto, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
      box-sizing: border-box;
      width: 100vw;
      color: white;
    }

    .table-bg {
      background: rgba(0, 0, 0, 0.3);
      border-radius: 15px 15px 0 0;
    }

    .list {
      border-style: none;
    }

    .box-search {
      display: flex;
      width: 550px;
      justify-content: center;
    }

    .box-search>input {
      width: 550px;
    }

    .Input {
      color: white;
      width: 550px;
      background-color: rgba(0, 0, 0, 0.3);
      padding: 10px;
      margin-top: 30px;
      border-radius: 5px;
    }

    .form-label {
      padding-right: 5px;
      margin: 0;
    }

    .container-sistema {
      margin-top: 70px;
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

  <div class="container-fuid d-flex flex-column align-items-center container-sistema">
    <div class="box-search">
      <input type="search" class="form-control" placeholder="Pesquisar" id="pesquisar">
      <button onclick="searchData()" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
        </svg>
      </button>
    </div>
    <div class="Input">
      <form class="d-flex align-items-center justify-content-center justify-content-around" method="POST" action="processa.php" enctype="multipart/form-data">
        <label>Buscar txt:</label>
        <input type="file" name="arquivo" multiple required>
        <input type="submit" value="importar">
      </form>
    </div>
    <?php
    if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>
    <div class="m-5 container-fluid justify-content-">
      <table class="table text-white table-bg">
        <thead>
          <tr class="d-flex justify-content-around">
            <th class="list" scope="col">#</th>
            <th class="list" scope="col">Data do Exame</th>
            <th class="list" scope="col">Prontuario</th>
            <th class="list" scope="col">Nome</th>
            <th class="list" scope="col">telefone</th>
            <th class="list" scope="col">Convenio</th>
            <th class="list" scope="col">Medico Solicitante</th>
            <th class="list" scope="col">Medico executante</th>
            <th class="list" scope="col">Procedimento</th>
            <!-- <th class="list" scope="col">email</th> -->
            <th class="list" scope="col">Protocolo</th>
            <!-- <th class="list" scope="col">CPF</th> -->
            <!-- <th scope="col">sexo</th>
                        <th class="list" scope="col">Exames</th> -->
            <th class="list" scope="col">...</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($user_data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['id'] . "</td>";
            echo "<td>" . $user_data['data_exame'] . "</td>";
            echo "<td>" . $user_data['prontuario'] . "</td>";
            echo "<td>" . $user_data['nome'] . "</td>";
            echo "<td>" . $user_data['telefone'] . "</td>";
            echo "<td>" . $user_data['convenio'] . "</td>";
            echo "<td>" . $user_data['medico_solicitante'] . "</td>";
            echo "<td>" . $user_data['medico_executante'] . "</td>";
            echo "<td>" . $user_data['procedimento'] . "</td>";
            // echo "<td>".$user_data['email']."</td>";
            echo "<td>" . $user_data['protocolo'] . "</td>";
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
  </div>
</body>
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


  var search = document.getElementById('pesquisar');

  search.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
      searchData();
    }
  });

  function searchData() {
    window.location = 'sistema.php?search=' + search.value;
  }
</script>

</html>