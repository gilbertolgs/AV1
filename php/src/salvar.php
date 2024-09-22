<?php

include_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

$sql_verifica = "SELECT * from clientes WHERE email = :EMAIL";
$stmt_verifica = $conexao->prepare($sql_verifica);

$stmt_verifica->bindParam(':EMAIL', $email);
$stmt_verifica->execute();

if($stmt_verifica->rowCount() > 0 ){
    echo json_encode(array("CAD"=>"EMAIL_DUPLICADO"));
}else{
    $sql_insert = "INSERT INTO clientes (nome, email, telefone) ";
    $sql_insert .= "VALUES (:NOME, :EMAIL, :TELEFONE)";
     
    $stmt_insert = $conexao->prepare($sql_insert);
    
    $stmt_insert->bindParam(':NOME', $nome);
    $stmt_insert->bindParam(':EMAIL', $email);
    $stmt_insert->bindParam(':TELEFONE', $telefone);
    
    if ($stmt_insert->execute()) {
        echo json_encode(array("CAD" => "SUCESSO"));
    } else {
        echo json_encode(array("CAD" => "ERRO_CADASTRO"));
    }
}