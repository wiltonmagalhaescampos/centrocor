<?php

 $dbHost = 'localhost';
 $dbUsername = 'root';
 $dbPassword = 'z9r8u7m6o$';
 $dbName = 'centrocor';

 $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);


if($conexao->connect_errno)
{
   echo "erro";
}
else {
    echo "conexão efetuada com sucesso";
}



?>