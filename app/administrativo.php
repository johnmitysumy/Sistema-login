<?php
session_start();

/*VARIAVEL PARA DAR NOME A PÁGINA.*/
$title_page = 'Página Inicial';

if(!empty($_SESSION['nivel'] == "0" OR $_SESSION['nivel'] == '1' OR $_SESSION['nivel'] == '2' AND $_SESSION['id'])){
	
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: /");	
}
?>

<?php
	include 'menu/menu.php'
	
	?>
	
	<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>CONTROLE OPERACIONAL</title>
</head>	
    <center>
	
	 <br>
  <br>
  <br>
  <br>
  <br>
  <br>
	<h1><?php echo "Olá ".$_SESSION['nome'].", Bem vindo!"; ?> </h1>
 
  
  
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
 
	

  
