<?php
session_start();
include_once("../../config/db/db-funcionarios.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

if ($_POST['senha'] > 0) {
	$senha = password_hash( $_POST['senha'], PASSWORD_DEFAULT );
	$result_usuario = "UPDATE login SET  
	nome='$nome', 
	email='$email', 
	usuario='$usuario',
	senha='$senha', 
	status='$status'
	WHERE id='$id'";
}else{

	$result_usuario = "UPDATE login SET  
nome='$nome', 
email='$email', 
usuario='$usuario', 
status='$status'

WHERE id='$id'";

}



$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário</p>"."$nome "."";
	$_SESSION['msg2'] = "<center><p style='color:green;'>editado com sucesso</p><center>";
	header("Location: /app/config/usuarios/edit_usuario.php?id=$id");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Erro!</p>";
	$_SESSION['msg2'] = "<center><p style='color:red;'>Usuário ".$nome." não foi editado, Tente novamente.</p></center>";
	header("Location: /app/config/usuarios/edit_usuario.php?id=$id");
}
