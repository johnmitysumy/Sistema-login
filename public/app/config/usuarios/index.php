<?php
/*INICIA A SESSÃO NO PHP*/
session_start();

/*VALIDAÇÃO SE O USUÁRIO TEM PERMISSÃO DE ESTÁ NA PÁGINA.*/
if(!empty($_SESSION['nivel'] == "2" AND $_SESSION['id'])){
	
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: /app/administrativo");	
}

//SHOW DO MENU CONFIGURAÇÃO
$show_menu_confi = 'show';

/*VARIAVEL PARA DAR NOME A PÁGINA.*/
$title_page = 'Configurações - Listar Usuários';

/*ADICIONA CONFIGURAÇÕES DO BANCO DE DADOS*/
include_once("../../config/db/db-funcionarios.php");

/*ADICIONA O MANU A PÁGINA*/
include '../../menu/menu.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LISTAR CONTROLE</title>
</head>
<body>

<!-- MENSAGEM MODAL COM SESSÃO -->
<?php 
if (isset($_SESSION['msg'])) {
include '../modal_padrao/index.php';
}else{}
?>

<!-- STYLE PARA A TABELA FUNCIONAR CORRETAMENTE -->	
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<!-- BOTÃO CADASTRAR USUÁRIO-->
<a href="cadastrar_usuario.php"><button class="btn btn-info">Cadastrar Usuário</button></a><br><br>

<!-- CAMPO PARA REALIZAR BUSCA COM FILTRO DE STATUS-->
<form method="POST">
	<label style="font-weight: bold;">Status:</label>
	<select name="buscar" id="buscar" class="form-control-sm ">
		<option value="" selected="selected" disabled>Selecione um Status</option>
		<option value="= 'ativo'">Ativo</option>
		<option value="= 'inativo'">Inativo</option>
		<option value="is not null">Todos</option>
	</select>
	<input type="submit" value="Buscar" class="form-control-sm btn-info">
</form>

<!-- inicio cabeçario da tabela para listar dados -->
<table id="example" class="table table-striped " >
	<thead class="thead-dark" >
		<tr>
			<th style="vertical-align: middle; width: 50px;"> <center>ID</center></th>
						<th style="vertical-align: middle; width: 50px;"><center>NOME</center></th>
						<th style="vertical-align: middle; width: 50px;"><center>E-MAIL</center></th>
						<th style="vertical-align: middle; width: 50px;"><center>USUÁRIO</center></th>
						<th style="vertical-align: middle; width: 50px;"><center>STATUS</center></th>	
						<th style="vertical-align: middle; width: 50px;"><center>EDITAR</center></th>						
		</tr>
	</thead>

<!-- Inicio da consulta de dados no banco de dados -->
<?php

$buscar = '';

/*VARIAVEL COM VALOR ATIVO*/
if (!isset($_POST['buscar'])) {
	$valor_buscar = 'is not null';
}else{
$valor_buscar = $_POST['buscar'];
}

/*VARIAVEL PARA TRAZER OS VALORES DA CONSULTA*/
$where_consulta = "WHERE status ".$valor_buscar."";

	$result_usuarios = "SELECT * FROM login $where_consulta $buscar";
	$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
?>
			
<tr>
<th style="vertical-align: middle; width: 50px;"><center><?php echo $row_usuario['id']; ?></center></th>
<th style="vertical-align: middle; width: 50px;"><center><?php echo $row_usuario['nome']; ?></center></th>
<th style="vertical-align: middle; width: 50px;"><center><?php echo $row_usuario['email']; ?></center></th>
<th style="vertical-align: middle; width: 50px;"><center><?php echo $row_usuario['usuario']; ?></center></th>
<th style="vertical-align: middle; width: 50px;"><center><?php echo $row_usuario['status']; ?></center></th>
<th style="vertical-align: middle; width: 50px;"><center>
	<a href="edit_usuario.php?id=<?php echo $row_usuario['id']; ?>"><button  class="btn btn-warning"><img src="/app/icons/pen.svg"></button></a>
</center></th>
</tr>
<?php }?>
		
<script>$(document).ready(function() {
    $('#example').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>
</body>
</html>