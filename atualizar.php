<?php
//atualizar.php
include "conexao.php";
$matricula = $_POST['matricula'];
$nome = $_POST['nome'];
$setor = $_POST['setor'];
$situacao = $_POST['situacao'];

$sql = "UPDATE tb_funcionarios SET
        matricula = '$matricula',
        nome = '$nome',
        setor = '$setor',
        situacao = '$situacao',
        WHERE matricula = '$matricula'";
$atualizar = $pdo->prepare($sql);
try{
    $atualizar->execute();
    if($atualizar->rowCount()>=1){
        echo "Atualizado com sucesso";
    }else{
        echo "Nada alterado";
    }    
}catch(PDOException $erro){
    echo "Erro ao atualizar os dados";
}
?>