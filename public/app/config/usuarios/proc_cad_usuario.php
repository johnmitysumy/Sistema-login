<?php
session_start();
include_once("../../../../app/db/db.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$senha = password_hash( $_POST['senha'], PASSWORD_DEFAULT );

//VERIFICAÇÃO DE USUÁRIO DUPLICADO
$result_usuarios = "SELECT * FROM login WHERE usuario = '$usuario'";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);
while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){

	$valor_duplicado = $row_usuario['usuario'];
}
if ($valor_duplicado > '') {
	$_SESSION['msg'] = "USUÁRIO JÁ CADASTRADO!";
	$_SESSION['msg2'] = "<center>já existe um usuário com este nome de usuário cadastrado no sistema</center>";
	header("Location: /app/config/usuarios/cadastrar_usuario.php");	
	}else{

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
}