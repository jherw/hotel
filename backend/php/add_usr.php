<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////
    $nombre=$_POST['uxnam'];
    $correo=$_POST['uxem'];
    $usuario=$_POST['uxuse'];
    $contra=MD5($_POST['uxcon']);
    $rol=$_POST['uxrul'];


///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into usuarios(nombre, correo, usuario,contra,rol) 
values(:nombre, :correo,:usuario,:contra,:rol)";
    
$sql = $connect->prepare($sql);
    
$sql->bindParam(':nombre',$nombre,PDO::PARAM_STR, 25);
$sql->bindParam(':correo',$correo,PDO::PARAM_STR, 25);
$sql->bindParam(':usuario',$usuario,PDO::PARAM_STR,25);
$sql->bindParam(':contra',$contra,PDO::PARAM_STR,25);
$sql->bindParam(':rol',$rol,PDO::PARAM_STR);
    
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