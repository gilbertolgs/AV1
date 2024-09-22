<?php
include_once "conexao.php";

$sql_lista = "SELECT * FROM clientes";
$stmt_lista = $conexao->prepare($sql_lista);
$stmt_lista->execute();

$clientes = array();

while ($dados = $stmt_lista->fetch(PDO::FETCH_OBJ)) {
    $clientes[] = array(
        "Id" => $dados->Id,
        "NOME" => $dados->nome,
        "EMAIL" => $dados->email,
        "TELEFONE" => $dados->telefone
    );
}

echo json_encode($clientes);
?>