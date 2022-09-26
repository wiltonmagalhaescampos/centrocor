<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>

        <style>
                body{
                    font-family: Arial, Helvetica, sans-serif;
                    background-image: linear-gradient(45deg, cyan, yellow);
                }

                div{
                    background-color: rgba(0, 0, 0, 0.6);
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    padding: 80px;
                    border-radius: 15px;
                    color: white;
                    

                }

                input{
                    padding: 15px;
                    border: none;
                    outline: none;
                    font-size: 15px;
                    border-radius: 5px;

                }

                .inputSubmit{
                    background-color: cornflowerblue;
                    outline: none;
                    padding: 10px;
                    width: 100%;
                    border-radius: 5px;
                    color: white;
                    font-size: 14px;
                
                }

                .intpuSubmit:hover{
                    background-color: deepskyblue;
                }

        </style>

</head>
<body>
    <div>
    <img src="https://static.wixstatic.com/media/3b001e_2c52285e20b24de79b99d6a9214f77df~mv2.png/v1/crop/x_0,y_19,w_1415,h_868/fill/w_226,h_138,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Ai_Logo_CENTROCOR-01.png" class="img-thumbnail" alt="...">    
<br><br>
        <form action="testLogin.php" method="POST">

        <input type="text" name="usuario" placeholder="Usúario">
    <br><br>
        <input type="password" name="senha" placeholder="Senha">
    <br><br>
         <input class="inputSubmit" type="submit" name="submit" value="Entrar">
        

        </form>
        
    </div>
</body>
</html>