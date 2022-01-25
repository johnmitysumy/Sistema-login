<html>
<header>
<?php
include_once("load.css");
?>
</header>
<center>
<!-- ICONE OU GIF QUE IRÁ APARECER NA PÁGINA-->
<div id="preloader">
    <div class="inner">
          <centeR><img src="https://rh.solutionscloud.com.br/app/img/dog.gif"></center>
    </div>
</div>
<!-- ICONE OU GIF QUE IRÁ APARECER NA PÁGINA-->

<!-- ---------------------------------------->
<!-- JS QUE TRÁS A BIBLIOTECA DO LOAD PARA O LOAD FUNCIONAR-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- JS QUE TRÁS A BIBLIOTECA DO LOAD PARA O LOAD FUNCIONAR-->

<!-- ---------------------------------------->

<!-- SCRIPT QUE PUXA O LOAD -->
<script>
  //<![CDATA[
  $(window).on('load', function () {
    $('#preloader .inner').fadeOut();
    $('#preloader').delay(100).fadeOut('slow'); 
    $('html').delay(100).css({'overflow': 'visible'});
  })
  //]]>
  
  </script>
<!-- SCRIPT QUE PUXA O LOAD -->
</center>
</html>