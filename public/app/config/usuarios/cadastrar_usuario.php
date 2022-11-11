<?php
/*INICIA A SESSÃO NO PHP*/
session_start();

/*VARIAVEL PARA DAR NOME A PÁGINA.*/
$title_page = 'Administração - Cadastrar Usuário';

/*VALIDAÇÃO SE O USUÁRIO TEM PERMISSÃO DE ESTÁ NA PÁGINA.*/
if(!empty($_SESSION['nivel'] == "0" OR $_SESSION['nivel'] == '1' OR $_SESSION['nivel'] == '2' AND $_SESSION['id'])){
	
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: /");	
}

//SHOW DO MENU CONFIGURAÇÃO
$show_menu_confi = 'show';

/*ADICIONA O MENU A TELA*/
include '../../menu/menu.php';

/*ADICIONA O ARQUIVO DE CONFIGURAÇÃO DO BANCO DE DADOS*/
include_once("../../../../app/db/db.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- STYLE PARA A TABELA FUNCIONAR CORRETAMENTE -->	
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

	<title><?php echo $title_page ?></title>
</head>
<body>

<?php

/*ADICIONA A MODAL DE MENSAGEM/AVISO DA PÁGINA*/ 

if (isset($_SESSION['msg'])) {
include '../../config/modal_padrao/index.php';
}else{}
?>
<!-- BOTÃO VOLTAR-->
<a href="/app/config/usuarios/"><button class="btn btn-info">VOLTAR</button></a>

<!--NOME DO USUÁRIO QUE ESTÁ SENDO EDITAR -->
<div align="center">
	<h1>
		Cadastrar Usuário
	</h1>
</div><br>

<!-- INICIA O FORMULÁRIO-->
<form method="POST" action="proc_cad_usuario.php">

<!-- NOME DO USUÁRIO -->
<label><h2>Nome Usuário</h2></label>
<input type="text" name="nome" class="form-control" required><br>

<!-- E-MAIL USUÁRIO -->
<label><h2>E-mail Usuário</h2></label>
<input type="text" name="email" class="form-control" required><br>

<!-- E-MAIL USUÁRIO -->
<label><h2>Usuário</h2></label>
<input type="text" name="usuario" class="form-control" required><br>

<!-- STATUS USUÁRIO -->
<label><h2>Status</h2></label>
<select name="status" id="status" class="form-control" required><br>		
		<option value="ATIVO">ATIVO</option>
		<option value="INATIVO">INATIVO</option>			
	</select>
<bR>

<!-- SENHA USUÁRIO -->
<label><h2>Senha</h2></label>
<input type="password" name="senha" id="senha" class="form-control" required><Br><br>

<!-- BOTÃO PARA ENVIAR INFORMAÇÃO -->
<input type="submit" class="form-control btn-primary" value="Cadastrar Usuário">

</form>
<Br>
<hr>
<bR><BR>

</body>
</html>