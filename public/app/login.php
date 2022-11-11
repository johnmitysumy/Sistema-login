<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="/app/favicon/cac.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- PAGE settings -->
  <link rel="icon" href="https://templates.pingendo.com/assets/Pingendo_favicon.ico">
  <title>CONTROLE DE PROJETO</title>
  <meta name="description" content="RH NORD Administrativo - Sistema de Gestão de Pessoa.">
  <meta name="keywords" content="RH Nord Administrativo">
  <!-- CSS dependencies -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="style/css/aquamarine.css" type="text/css">
  <!-- Script: Make my navbar transparent when the document is scrolled to top -->
  <script src="js/navbar-ontop.js"></script>
  <!-- Script: Animated entrance -->
  <script src="js/animate-in.js"></script>
	</head>
	<body>
	<div class="align-items-center d-flex cover section-aquamarine py-5" style="background-image: url(&quot;assets/restaurant/cover_light.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 align-self-center text-lg-left text-center">
          <h1 class="mb-0 mt-5 display-4">
          	<div align="center">
          		CONTROLE DE PROJETO
          	</div>
            <br>

          </h1>
        </div>
      </div>
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
	
        <div class="col-md" align="center">
		<form method="POST" action="valida.php" style="">
			<div class="form-group"> <input type="text" class="form-control" name="usuario" placeholder="Digite o seu usuário"> </div><BR>	
			<div class="form-group">  <input type="password" class="form-control" name="senha" placeholder="Digite a sua senha"><br><br>	
			<input type="submit" class="btn text-center text-capitalize text-info btn-primary btn-lg btn-block" name="btnLogin" value="Acessar">	
			</div>
			<div class="col-md-4">
			 </div>
			</div>
			<div class="col-md-4">
			
		</div>
		
		</div>
		<br><br><br>
		
		  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- Script: Smooth scrolling between anchors in the same page -->
  <script src="js/smooth-scroll.js" style=""></script>
	</body>
</html>