<?php
session_start();
if(!empty($_SESSION['nivel'] == "0" OR $_SESSION['nivel'] == '1' OR $_SESSION['nivel'] == '2' AND $_SESSION['id'])){
	
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- LOAD DA PÁGINA -->
 <?php include("style/load/load.php"); ?> 
<!-- CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Boas Vindas.</title>
</head>
<body>

<p><h1 align="center"><?php echo "Olá ".$_SESSION['usuario'].", Bem vindo!"; ?> </h1><br></p>

<div align="center" id="sair">
<a href="sair.php"><button type="button" class="btn btn-primary">SAIR</button></a>
</div>
<br>


</body>
</html>


  