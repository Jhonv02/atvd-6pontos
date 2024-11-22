<?php
include "conexao.php";

// Função para exibir os resultados
function exibirResultados($setor) {
    global $pdo;
    
    // Preparar a consulta SQL
    $sql = "SELECT * FROM tb_funcionarios WHERE setor = :setor";
    $consultar = $pdo->prepare($sql);
    $consultar->bindParam(':setor', $setor, PDO::PARAM_STR);

    try {
        // Executa a consulta
        $consultar->execute();
        $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);

        // Verifica se existem resultados
        if (count($resultados) > 0) {
            echo "<h2>Setor: $setor</h2>";
            // Exibe cada resultado de funcionário
            foreach ($resultados as $item) {
                $matricula = $item['matricula'];
                $nome = $item['nome'];
                $setor = $item['setor'];
                $situacao = $item['situacao'];
                echo "
                <div class='cartoes'>
                    <b>Matricula:</b> <b><span class='matricula'>$matricula</span></b> <br>
                    <b>Nome:</b> <b><span class='nome'>$nome</span></b> <br>
                    <b>Setor:</b> <b><span class='setor'>$setor</span></b> <br>
                    <b>Situacao:</b> <b><span class='situacao'>$situacao</span></b> <br>
                </div>";
            }
        } else {
            echo "<p>Nenhum funcionário encontrado no setor '$setor'.</p>";
        }
    } catch(PDOException $erro) {
        echo "Falha ao consultar o cadastro: " . $erro->getMessage();
    }
}

// Exibindo os funcionários de cada setor
exibirResultados('Administrativo');
exibirResultados('Financeiro');
exibirResultados('Suporte');
?>
