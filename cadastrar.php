<?php
include "conexao.php";

$nome = $_POST['nome'];
$setor = $_POST['setor'];

// 1º Passo - comando SQL para inserir os dados na tabela tb_funcionarios
$sql = "INSERT INTO tb_funcionarios (nome, setor) 
        VALUES ('$nome', '$setor')";

// 2º Passo - preparar a conexão
$inserir = $pdo->prepare($sql);

// 3º Passo - tentar executar
try {
    $inserir->execute();
    echo "Funcionário cadastrado com sucesso!";
} catch(PDOException $erro) {
    echo "Falha ao cadastrar funcionário: " . $erro->getMessage();
}
?>
