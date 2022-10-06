<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Login</title>

  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background: linear-gradient(45deg, cyan, yellow);
      background-attachment: fixed;
    }


    .container {
      background-color: rgba(0, 0, 0, 0.4);
      position: absolute;
      width: 300px;
      height: 400px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 80px;
      border-radius: 15px;
      color: white;
    }

    .logo-centrocor {
      display: flex;
      justify-content: center;
    }

    img {
      width: 285px;
      margin: 0;
      margin-bottom: 60px;
    }

    .input-campus {
      padding-top: 5px;
      padding-bottom: 15px;
      display: flex;
      align-items: center;
      flex-direction: column;
    }

    ::placeholder {
      color: white;
    }

    input {
      background: transparent;
      box-sizing: border-box;
      border: none;
      border-bottom: solid 1px black;
      outline: none;
      padding: 0 0 0 10px;
      width: 100%;
      height: 40px;
      margin-bottom: 5px;
      font-size: 15px;
      border-radius: 5px;
      transition: all .2s ease-in;
    }

    input:focus {
      filter: brightness(0.3);
      border-bottom: solid 2px black;
    }

    .buttonSubmit {
      background-color: cornflowerblue;
      border: none;
      margin-top: 0;
      height: 50px;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      color: white;
      font-size: 18px;

      transition: filter .2s ease;
    }

    .buttonSubmit:hover {
      cursor: pointer;
      filter: brightness(0.8);
    }
  </style>

</head>

<body>
  <header class="header">
    <div class="header-content">
      <img src="./assets/CBF_ESCUDO_SELECAO_AZUL.png" alt="">
    </div>
  </header>
  <main class="container">
    <div class="logo-centrocor">
      <img src="https://static.wixstatic.com/media/3b001e_2c52285e20b24de79b99d6a9214f77df~mv2.png/v1/crop/x_0,y_19,w_1415,h_868/fill/w_226,h_138,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Ai_Logo_CENTROCOR-01.png" class="img-thumbnail" alt="Logo centrocor">
    </div>
    <form action="testLogin.php" method="POST">
      <div class="input-campus">
        <input type="text" name="usuario" placeholder="Usúario" />
        <input type="password" name="senha" placeholder="Senha" />
      </div>
      <button class="buttonSubmit" type="submit" name="submit" value="Entrar">
        Entrar
      </button>
    </form>

  </main>
</body>

</html>