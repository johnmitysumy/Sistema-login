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
  
<?php include 'view/interface/menu.html';?>
  <title>Boas Vindas.</title>
</head>
<body>




<br>


</body>
</html>


  