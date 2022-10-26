<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['insertar'])){
///////////// Informacion enviada por el formulario /////////////
    $nomprd=$_POST['prdnam'];
    $numprd=$_POST['prdcod'];
    $detprd=$_POST['prddet'];

    $preprd=$_POST['prdpre'];
    $stckprd=$_POST['prdsto'];
    $staprd=$_POST['prdsta'];
    $idcat=$_POST['prdcat'];

    $imgFile = $_FILES['foto']['name'];
    $tmp_dir = $_FILES['foto']['tmp_name'];
    $imgSize = $_FILES['foto']['size'];
///////// Fin informacion enviada por el formulario /// 

  if(empty($nomprd)){
   $errMSG = "Please enter your name.";
  }
  else if(empty($numprd)){
   $errMSG = "Please Enter your number.";
  }

  {
   $upload_dir = '../../backend/img/subidas/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $foto = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$foto);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }

  }

////////////// Insertar a la tabla la informacion generada /////////
$sql="insert into productos(nomprd, numprd, detprd,preprd,stckprd,staprd,idcat,foto) 
values(:nomprd, :numprd,:detprd,:preprd,:stckprd,:staprd,:idcat,:foto)";
    
$sql = $connect->prepare($sql);
    
$sql->bindParam(':nomprd',$nomprd,PDO::PARAM_STR, 25);
$sql->bindParam(':numprd',$numprd,PDO::PARAM_STR, 25);
$sql->bindParam(':detprd',$detprd,PDO::PARAM_STR,25);
$sql->bindParam(':preprd',$preprd,PDO::PARAM_STR,25);
$sql->bindParam(':stckprd',$stckprd,PDO::PARAM_STR);
$sql->bindParam(':staprd',$staprd,PDO::PARAM_STR);
$sql->bindParam(':idcat',$idcat,PDO::PARAM_STR);
$sql->bindParam(':foto',$foto,PDO::PARAM_STR);
    
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