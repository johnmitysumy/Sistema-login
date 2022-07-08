<?php
session_start();
include_once("../../config/db/db-funcionarios.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$senha = password_hash( $_POST['senha'], PASSWORD_DEFAULT );

$result_usuario = "

INSERT INTO login (nome, email, usuario, senha, status, nivel ) 
VALUES ('$nome', '$email', '$usuario', '$senha', '$status', '1')";

$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário</p>"."$nome "."";
	$_SESSION['msg2'] = "<center><p style='color:green;'>Cadastrado com sucesso</p><center>";
	header("Location: /app/config/usuarios/cadastrar_usuario.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Erro!</p>";
	$_SESSION['msg2'] = "<center><p style='color:red;'>Usuário ".$nome." não foi Cadastrado, Tente novamente.</p></center>";
	header("Location: /app/config/usuarios/cadastrar_usuario.php");
}
