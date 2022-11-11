<?php
session_start();
//Incluindo a conexão com banco de dados
include_once("../app/config/db/login.php");
//O campo usuário e senha preenchido entra no if para validar
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";
	if((!empty($usuario)) AND (!empty($senha))){		
		$result_usuario = "SELECT * FROM login WHERE status = 'ATIVO' AND usuario = '$usuario' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		if($resultado_usuario){
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if(password_verify($senha, $row_usuario['senha'])){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				$_SESSION['nivel'] = $row_usuario['nivel'];
				$_SESSION['id_area'] = $row_usuario['id_area'];
				$_SESSION['usuario'] = $row_usuario['usuario'];				
				header("Location: administrativo");
			}else{
				$_SESSION['msg'] = "Login e senha incorreto!";
				header("Location: /app/login");
			}
		}
	}else{
		$_SESSION['msg'] = "Login e senha incorreto!";
		header("Location: /app/login");
	}
}else{
	$_SESSION['msg'] = "Página não encontrada";
	header("Location: /app/login");
}
