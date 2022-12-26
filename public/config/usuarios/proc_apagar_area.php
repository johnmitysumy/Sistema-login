<?php
/*INICIA A SESSÃO NO SERVIDOR*/
session_start();

/*INCLUI O ARQUIVO DE CONFIGURAÇÃO DO BANCO DE DADOS*/
include_once("../../../app/db/db.php");

/*VALIDAÇÃO SE O USUÁRIO TEM PERMISSÃO DE ESTÁ NA PÁGINA.*/
if(!empty($_SESSION['nivel'] == "0" OR $_SESSION['nivel'] == '1' OR $_SESSION['nivel'] == '2' AND $_SESSION['id'])){
	
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: /");	
}

/*ID DA PERMISSÃO NO BANCO DE DADOS*/
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

/*ID DO USUÁRIO PARA VOLTAR PARA A MESMA PÁGINA ONDE ÉSTAVA SENDO EDITADO O USUÁRIO*/
$id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_STRING);

/*COMANDO PARA DELETAR A PERMISSÃO NO BANCO DE DADOS*/
$result_usuario = "DELETE FROM login_area WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

/*ID PARA CASO DER CERTO OU ERRADO, DAR UMA MENSAGEM DE AVISO PARA O USUÁRIO*/
if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Permissão</p>"."";
	$_SESSION['msg2'] = "<center><p style='color:green;'>Removida com Sucesso</p><center>";
	header("Location: /config/usuarios/edit_usuario.php?id=$id_usuario");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Erro!</p>";
	$_SESSION['msg2'] = "<center><p style='color:red;'>Permissão "." não foi removida, Tente novamente.</p></center>";
	header("Location: /config/usuarios/edit_usuario.php?id=$id_usuario");
}