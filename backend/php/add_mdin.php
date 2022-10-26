<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['md_insert'])){
///////////// Informacion enviada por el formulario /////////////
    $numc=$_POST['mdnum'];
    $dnic=$_POST['mddoc'];
    $nomc=$_POST['mdnom'];
    $apec=$_POST['mdap'];

///////// Fin informacion enviada por el formulario /// 

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into clientes(dnic, numc, nomc,apec,estac) 
values(:dnic, :numc,:nomc,:apec,'1')";
    
$sql = $connect->prepare($sql);
    
$sql->bindParam(':dnic',$dnic,PDO::PARAM_STR, 25);
$sql->bindParam(':numc',$numc,PDO::PARAM_STR, 25);
$sql->bindParam(':nomc',$nomc,PDO::PARAM_STR,25);
$sql->bindParam(':apec',$apec,PDO::PARAM_STR,25);

    
$sql->execute();

$lastInsertId = $connect->lastInsertId();
if($lastInsertId>0){



          echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        Gracias .. Agregado correctamente
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>';
}
else{
    

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        No se pueden agregar datos, comuníquese con el administrador
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>';

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>