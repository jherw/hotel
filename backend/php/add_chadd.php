<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////
    $nomhc=$_POST['chnam'];
    $estahc=$_POST['chsta'];
    


///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into hcate(nomhc,estahc) 
values(:nomhc, :estahc)";
    
$sql = $connect->prepare($sql);
    
$sql->bindParam(':nomhc',$nomhc,PDO::PARAM_STR, 25);
$sql->bindParam(':estahc',$estahc,PDO::PARAM_STR, 25);

    
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