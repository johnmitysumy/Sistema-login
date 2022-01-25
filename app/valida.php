<?php
session_start();
//Incluindo a conexão com banco de dados
include_once("config/db/login.php");
//O campo usuário e senha preenchido entra no if para validar
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){
		//Gerar a senha criptografa
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
		//$result_usuario = "SELECT id, nome, email,  senha FROM login WHERE usuario='$usuario' LIMIT 1";
		$result_usuario = "SELECT * FROM login WHERE usuario = '$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['nivel'] = $row_usuario['nivel'];				
				$_SESSION['usuario'] = $row_usuario['usuario'];				
				$_SESSION['regiao'] = $row_usuario['regiao'];				
				$_SESSION['email'] = $row_usuario['email'];
				header("Location: administrativo");
			}else{
				$_SESSION['msg'] = "<center>Login e senha incorreto!</center>";
				header("Location: login.php");
			}
		}
	}else{
		$_SESSION['msg'] = "<center>Login e senha incorreto!</center>";
		header("Location: login.php");
	}
}else{
	$_SESSION['msg'] = "<center>Página não encontrada</center>";
	header("Location: login.php");
}
