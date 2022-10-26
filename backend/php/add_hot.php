<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////
    $numiha=$_POST['hnum'];
    $idps=$_POST['hpis'];
    $idhc=$_POST['hcat'];
    $precha=$_POST['hpre'];
    $detaha=$_POST['hdet'];
    $estadha=$_POST['hstat'];    


///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into habitaciones(numiha,idps,idhc,precha,detaha,estadha) 
values(:numiha,:idps,:idhc,:precha,:detaha,:estadha)";
    
$sql = $connect->prepare($sql);
    
$sql->bindParam(':numiha',$numiha,PDO::PARAM_STR, 25);
$sql->bindParam(':idps',$idps,PDO::PARAM_STR, 25);
$sql->bindParam(':idhc',$idhc,PDO::PARAM_STR, 25);
$sql->bindParam(':precha',$precha,PDO::PARAM_STR, 25);
$sql->bindParam(':detaha',$detaha,PDO::PARAM_STR, 25);
$sql->bindParam(':estadha',$estadha,PDO::PARAM_STR, 25);

    
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