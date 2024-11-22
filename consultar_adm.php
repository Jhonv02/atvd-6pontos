<?php
include "conexao.php";

$sql = "SELECT * FROM funcionarios
        WHERE setor='Administrativo'";
$consultar = $pdo->prepare($sql);
try{
    $consultar->execute();
    $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultados as $item){
        $matricula = $item['matricula'];
        $nome = $item['nome'];
        $setor = $item['setor'];
        $situacao = $item['situacao'];
        echo"
        <div class='cartoes'>
            <b>Matricula:</b> <b><span class='matricula'>$matricula</span></b> <br>
            <b>nome:</b> <b><span class='nome'>$nome</span></b> <br>
            <b>setor:</b> <b><span class='setor'>$setor</span></b> <br>
            <b>situacao:</b> <b><span class='situacao'>$situacao</span></b> <br>
        </div>
        ";
    }   
}catch(PDOException $erro){
    echo "Falha ao consultar o cadastro";
}
?>