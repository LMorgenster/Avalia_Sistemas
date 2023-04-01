<?php

include 'config.php';

    $id=$_GET["id"];
    $sql="DELETE FROM cadastro_veiculos WHERE id='{$id}'";
    $run_sql=mysqli_query($conn, $sql);

    if($run_sql){
        echo json_encode(["success"=>true,"message" => "Veículo deletado com sucesso"]);
    } else {
        echo json_encode(["success"=>false,"message" => "Falha ao deletar"]);
    }

?>