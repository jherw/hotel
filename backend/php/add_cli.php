<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////
    $numc=$_POST['cxdoc'];
    $dnic=$_POST['cxtip'];
    $nomc=$_POST['cxna'];

    $apec=$_POST['cxap'];
    $corrc=$_POST['cxema'];
    $estac=$_POST['cxsta'];
///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into clientes(dnic, numc, nomc,apec,corrc,estac) 
values(:dnic, :numc,:nomc,:apec,:corrc,:estac)";
    
$sql = $connect->prepare($sql);
    
$sql->bindParam(':dnic',$dnic,PDO::PARAM_STR, 25);
$sql->bindParam(':numc',$numc,PDO::PARAM_STR, 25);
$sql->bindParam(':nomc',$nomc,PDO::PARAM_STR,25);
$sql->bindParam(':apec',$apec,PDO::PARAM_STR,25);
$sql->bindParam(':corrc',$corrc,PDO::PARAM_STR);
$sql->bindParam(':estac',$estac,PDO::PARAM_STR);
    
$sql->execute();

$lastInsertId = $connect->lastInsertId();
if($lastInsertId>0){

    echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "mostrar.php";
        });
        </script>';
}
else{
    

 echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "mostrar.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>