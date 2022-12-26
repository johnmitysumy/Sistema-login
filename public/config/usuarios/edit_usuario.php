<?php
/*INICIA A SESSÃO NO PHP*/
session_start();

/*VARIAVEL PARA DAR NOME A PÁGINA.*/
$title_page = 'Administração - Editar Usuário';

/*VALIDAÇÃO SE O USUÁRIO TEM PERMISSÃO DE ESTÁ NA PÁGINA.*/
if(!empty($_SESSION['nivel'] == '2' AND $_SESSION['id'])){
	
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: /");	
}

//SHOW DO MENU CONFIGURAÇÃO
$show_menu_confi = 'show';

/*ADICIONA O MENU A TELA*/
include '../../menu/menu.php';

/*ADICIONA O ARQUIVO DE CONFIGURAÇÃO DO BANCO DE DADOS*/
include_once("../../../app/db/db.php");

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

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$result_usuario = "SELECT * FROM login WHERE id = $id";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<a href="/config/usuarios/"><button class="btn btn-info">VOLTAR</button></a>
<!--NOME DO USUÁRIO QUE ESTÁ SENDO EDITAR -->
<div align="center">
	<h1>
		<?php echo $row_usuario['nome']; ?>
	</h1>
</div><br>

<!-- INICIA O FORMULÁRIO-->
<form method="POST" action="proc_edit_usuario.php">

<!-- NOME DO USUÁRIO -->
<label><h2>Nome Usuário</h2></label>
<input type="text" name="nome" value="<?php echo $row_usuario['nome']; ?>" class="form-control" required><br>

<!-- E-MAIL USUÁRIO -->
<label><h2>E-mail Usuário</h2></label>
<input type="text" name="email" value="<?php echo $row_usuario['email']; ?>" class="form-control"><br>

<!-- E-MAIL USUÁRIO -->
<label><h2>Usuário</h2></label>
<input type="text" name="usuario" value="<?php echo $row_usuario['usuario']; ?>" class="form-control" required><br>

<!-- STATUS USUÁRIO -->
<label><h2>Status</h2></label>
<select name="status" id="status" class="form-control">
		<option value="<?php echo $row_usuario['status']; ?>" selected="selected"><?php echo $row_usuario['status']; ?></option>
		<option value="ATIVO">ATIVO</option>
		<option value="INATIVO">INATIVO</option>			
	</select>
<bR>

<!--NÍVEL USUÁRIO-->
<label><h2>Nível Acesso</h2></label>
<select name="nivel" id="nivel" class="form-control">
	<option value="<?php echo $row_usuario['nivel']; ?>" selected="selected"><?php if ($row_usuario['nivel'] == '1') {
			echo "USUÁRIO";
		}else{echo "ADMIN";}  ?></option>
		<option value="1">USUÁRIO</option>
		<option value="2">ADMIN</option>			
	</select>
<br>

<!-- SENHA USUÁRIO -->
<label><h2>Senha</h2></label>
<input type="password" name="senha" id="senha" class="form-control"><Br><br>

<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

<!-- BOTÃO PARA ENVIAR INFORMAÇÃO -->
<input type="submit" class="form-control btn-primary" value="Atualizar Dados">

</form>
<Br>
<hr>
<bR><BR>
</body>
</html>