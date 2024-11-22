<?php
//deletar.php
include "conexao.php";
$matricula = $_POST['matricula'];
$sql = "DELETE FROM tb_funcionarios
        WHERE matricula='$matricula'";
$deletar = $pdo->prepare($sql);
try{
    $deletar->execute();
    if($deletar->rowCount()>=1){
        echo "Deletado com sucesso!";
    }else{
        echo "Nada foi deletado!";
    }
}catch(PDOException $erro){
    echo "Falha ao deletar!";
}



?>