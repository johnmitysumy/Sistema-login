<?php

session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['nivel'] );

$_SESSION['msg'] = "<center>Deslogado com sucesso</center>";
header("Location: login.php");