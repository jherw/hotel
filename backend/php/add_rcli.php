    <?php 

if(isset($_POST['insertar']))
{

    $idhab=$_POST['rxha'];
    $iddn=$_POST['rxdoc'];
    $feentra=$_POST['rxent'];
    $fesal=$_POST['rxsal'];
    $adel=$_POST['rxade'];
    $observac=$_POST['rxobs'];



        $statement = $connect->prepare("INSERT INTO reservar (idhab,iddn,feentra,fesal,adel,state,observac) VALUES('$idhab', '$iddn','$feentra','$fesal','$adel','1', '$observac')");

        

         $statement2 = $connect->prepare("UPDATE habitaciones SET estadha='2' WHERE idhab= $idhab LIMIT 1;");

           //echo "$item";
                //Execute the statement and insert our values.
        $inserted = $statement->execute(); 
        $inserted = $statement2->execute(); 


        if($inserted>0){

    echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "../recepcion/mostrar.php";
        });
        </script>';
}
else{
    

 echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../recepcion/mostrar.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
  

    }




?>