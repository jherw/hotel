<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["rol"]))
{

  header("Location: ../login.php");
}
else
{
require '../template/header.php';

  if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1)
{




?>
<br>
<br>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
     
    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
}
else
{
 //require '../erro404.php';
}

require '../template/footer.php';
?>

<?php 
}
ob_end_flush();
?>

