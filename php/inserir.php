<?php

include 'config.php';

    $input=file_get_contents("php://input");
    $decode=json_decode($input, true);

    $nome=$decode["nome"];
    $marca=$decode["marca"];
    $ano=$decode["ano"];
    $valor_de_venda=$decode["valor_de_venda"];

    $sql = "INSERT INTO cadastro_veiculos (nome, marca, ano, valor_de_venda) VALUES ('{$nome}', '{$marca}', '{$ano}', '{$valor_de_venda}')";
    $run_sql=mysqli_query($conn, $sql);
    
    if($run_sql){
        echo json_encode(["success"=>true,"message" => "Veículo cadastrado com sucesso"]);
    } else {
        echo json_encode(["success"=>false,"message" => "Falha ao cadastrar"]);
    }
?>