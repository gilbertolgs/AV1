<?php
include_once "conexao.php";

$id = $_POST['Id'];  
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

    $sql_update = "UPDATE clientes SET nome = :NOME, email = :EMAIL, telefone = :TELEFONE WHERE Id = :ID";
    
    $stmt_update = $conexao->prepare($sql_update);
    
    $stmt_update->bindParam(':NOME', $nome);
    $stmt_update->bindParam(':EMAIL', $email);
    $stmt_update->bindParam(':TELEFONE', $telefone);
    $stmt_update->bindParam(':ID', $id);
    
    if ($stmt_update->execute()) {
        echo json_encode(array("UP" => "SUCESSO"));
    } else {
        echo json_encode(array("UP" => "ERRO_ATUALIZACAO"));
    }

?>
