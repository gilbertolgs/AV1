<?php
include_once "conexao.php";

$id = $_POST['Id'];

$sql_delete = "DELETE FROM clientes WHERE Id = :ID";

$stmt_delete = $conexao->prepare($sql_delete);

$stmt_delete->bindParam(':ID', $id);

if ($stmt_delete->execute()) {
    echo json_encode(array("DEL" => "SUCESSO"));
} else {
    echo json_encode(array("DEL" => "ERRO_DELETAR"));
}

?>
