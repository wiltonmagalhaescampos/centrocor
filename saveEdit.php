<?php
    // isset -> serve para saber se uma variável está definida
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $data_exame = $_POST['data_exame'];
        $prontuario = $_POST['prontuario'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $convenio = $_POST['convenio'];
        $medico_solicitante = $_POST['medico_solicitante'];
        $medico_executante = $_POST['medico_executante'];
        $procedimento = $_POST['procedimento'];
        $email = $_POST['email'];
        $protocolo = $_POST['protocolo'];
        $cpf = $_POST['cpf'];
        // $sexo = $_POST['genero'];
        // $exames = $_POST['exames'];
        
        $sqlUpdate = "UPDATE pacientes SET data_exame='$data_exame',prontuario='$prontuario',nome='$nome',telefone='$telefone',convenio='$convenio',medico_solicitante='$medico_solicitante',medico_executante='$medico_executante',procedimento='$procedimento',email='$email',protocolo='$protocolo',cpf='$cpf' 
        WHERE id='$id'";
        $result = $conexao->query($sqlUpdate);
        print_r($result);
    }
    header('Location: sistema.php');

?>