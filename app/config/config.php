<?php
/*INICIA A SESSÃO NO PHP*/
session_start();

/*VARIAVEL PARA DAR NOME A PÁGINA.*/
$title_page = 'Administração - Configuração Sistema';

/*VALIDAÇÃO SE O USUÁRIO TEM PERMISSÃO DE ESTÁ NA PÁGINA.*/
if(!empty($_SESSION['nivel'] == '2' AND $_SESSION['id'])){
	
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: /app/administrativo");	
}

/*ADICIONA O MENU A TELA*/
include '../menu/menu.php';

/*ADICIONA O ARQUIVO DE CONFIGURAÇÃO DO BANCO DE DADOS*/
include 'db/db-funcionarios.php';

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
include 'modal_padrao/index.php';
}else{}

//SELECT INFORMAÇÕES
	$result_usuario = "SELECT * FROM config";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<!-- INICIA O FORMULÁRIO-->
<form method="POST" action="proc_config.php">

<!-- NOME DO USUÁRIO -->
<label><h2>Nome Sistema</h2></label>
<input type="text" name="nome_sistema" value="<?php echo $row_usuario['nome_sistema']; ?>" class="form-control" required><br>

<bR>
<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

<!-- BOTÃO PARA ENVIAR INFORMAÇÃO -->
<input type="submit" class="form-control btn-primary" value="Atualizar Dados">

</form>
<Br>
<hr>
<bR><BR>

</body>
</html>