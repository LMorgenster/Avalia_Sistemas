<?php

include 'config.php';

    $input=file_get_contents("php://input");
    $decode=json_decode($input, true);

    $id=$decode["id"];
    $nome=$decode["nome"];
    $marca=$decode["marca"];
    $ano=$decode["ano"];
    $valor_de_venda=$decode["valor_de_venda"];

    $sql = "UPDATE cadastro_veiculos SET nome='{$nome}', marca='{$marca}', ano='{$ano}', valor_de_venda='{$valor_de_venda}' WHERE id='{$id}'";
    $run_sql=mysqli_query($conn, $sql);

    if($run_sql){
        echo json_encode(["success"=>true,"message" => "Veículo atualizado com sucesso"]);
    } else {
        echo json_encode(["success"=>false,"message" => "Falha ao atualizar"]);
    }

?>