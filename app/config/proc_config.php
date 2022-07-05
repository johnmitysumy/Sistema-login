<?php
session_start();
include_once 'db/db-funcionarios.php';

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome_sistema = filter_input(INPUT_POST, 'nome_sistema', FILTER_SANITIZE_STRING);

$result_usuario = "UPDATE config SET  
nome_sistema='$nome_sistema'

WHERE id='$id'";

$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Sistema informação: </p>"."$nome_sistema "."";
	$_SESSION['msg2'] = "<center><p style='color:green;'>editado com sucesso</p><center>";
	header("Location: /app/config/config.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Erro!</p>";
	$_SESSION['msg2'] = "<center><p style='color:red;'>Sistema informação:  ".$nome_sistema." não foi editado, Tente novamente.</p></center>";
	header("Location: /app/config/config.php");
}
