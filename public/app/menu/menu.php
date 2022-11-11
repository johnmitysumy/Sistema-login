<?php
if ($_SESSION['nivel'] == 1) {
    include_once ('menu_type/1.php');
}else{
    include_once ('menu_type/2.php');
}

?>