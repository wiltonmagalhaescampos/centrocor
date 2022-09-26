<?php
    session_start();
    // print_r($_SESSION);
    include_once('config.php');

 if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
 {
     unset($_SESSION['usuario']);
     unset($_SESSION['usuario']);
     header('Location: index.php');
 }
 $logado = $_SESSION['usuario'];
 if(!empty($_GET['search']))
 {
     $data = $_GET['search'];
     $sql = "SELECT * FROM pacientes WHERE id LIKE '%$data%' or nome LIKE '%$data%' or usuario LIKE '%$data%' ORDER BY id DESC";
 }
 else
 {
     $sql = "SELECT * FROM pacientes ORDER BY id DESC";
 }




//Receber os dados  do formulário
//$arquivo = $_FILES['arquivo'];
//var_dump($arquivo);

$arquivo_tmp = $_FILES['arquivo'] ['tmp_name'];
//var_dump($arquivo_tmp);

$dado = file($arquivo_tmp);
//var_dump($arquivo);exit;

//foreach($arquivo as $dado){
    //$linha = trim($linha);
    //$dado = explode(',',$linha);

    //var_dump($dado);

    $data = implode('-', array_reverse(explode('/', trim($dado[0]))));
    
$data_exame = $data;
$prontuario = $dado[1];
$nome = $dado[2];
$telefone = $dado[3];
$convenio = $dado[4];
$medico_solicitante = $dado[5];
$medico_executante = $dado[6];
$procedimento = $dado[7];
$email = $dado[9];
$protocolo = $dado[10];
$cpf = trim($dado[11]);

var_dump( $dado[4]);

    $result_pacientes = "INSERT INTO pacientes (data_exame, prontuario, nome, telefone, convenio, medico_solicitante, medico_executante, procedimento, email, protocolo, cpf) VALUES ('$data_exame','$prontuario','$nome','$telefone','$convenio','$medico_solicitante','$medico_executante','$procedimento','$email','$protocolo','$cpf')";
    
    //$resultado_pacientes = mysqli_query($conexao, $result_pacientes);

    
    if (mysqli_query($conexao, $result_pacientes)) {
        echo 'inserido';

    } else {
        var_dump( mysqli_error($conexao));
    }

    //var_dump($result_pacientes);

//}

        $_SESSION['msg'] = "<p style='color: white;'>Carregado os dados com sucesso!</p>";

        header("Location: sistema.php");
?>