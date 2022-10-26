<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////
    $nompis=$_POST['pxnam'];
    $estp=$_POST['cxsta'];
///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into pisos(nompis, estp) 
values(:nompis, :estp)";
    
$sql = $connect->prepare($sql);
    
$sql->bindParam(':nompis',$nompis,PDO::PARAM_STR, 25);
$sql->bindParam(':estp',$estp,PDO::PARAM_STR);
    
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