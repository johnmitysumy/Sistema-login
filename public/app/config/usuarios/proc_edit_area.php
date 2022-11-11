<?php
session_start();
include_once("../../../../app/db/db.php");

/*VALIDAÇÃO SE O USUÁRIO TEM PERMISSÃO DE ESTÁ NA PÁGINA.*/
if(!empty($_SESSION['nivel'] == "0" OR $_SESSION['nivel'] == '1' OR $_SESSION['nivel'] == '2' AND $_SESSION['id'])){
	
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: /");	
}

$usuario_session = $_SESSION['usuario'];
$datahoje = date('Y-m-d');
$area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id_usuario', FILTER_SANITIZE_STRING);

/*TRANSFORMA O NOME DA AREA EM ID*/
$result_usuarios_area = "SELECT * FROM controle_area where area = '$area'";
$resultado_usuarios_area = mysqli_query($conn, $result_usuarios_area);
$nome_area = mysqli_fetch_assoc($resultado_usuarios_area);

/*id da area que vai ser dada permissão ao usuario*/
$area_que_vai_ser_dada_a_permissao = $nome_area['id'];

/*TRANSFORMA O NOME DO USUARIO EM ID*/
$result_usuarios_usuario = "SELECT * FROM login WHERE id = $id";
$resultado_usuarios_usuario = mysqli_query($conn, $result_usuarios_usuario);
$nome_usuario = mysqli_fetch_assoc($resultado_usuarios_usuario);

/*id do usuário que vai receber a permissão*/
$usuario_permissao_dada = $nome_usuario['id'];

$result_usuario = "
INSERT INTO login_area (usuario, area_permissao, permiss_dada_por, data_permissao) 
VALUES ('$usuario_permissao_dada', '$area_que_vai_ser_dada_a_permissao', '$usuario_session', '$datahoje')";

$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Permissão</p>"."$area "."";
	$_SESSION['msg2'] = "<center><p style='color:green;'>Adicionada com Sucesso</p><center>";
	header("Location: /app/config/usuarios/edit_usuario.php?id=$id");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Erro!</p>";
	$_SESSION['msg2'] = "<center><p style='color:red;'>Permissão ".$area." não foi adicionada, Tente novamente.</p></center>";
	header("Location: /app/config/usuarios/edit_usuario.php?id=$id");
}