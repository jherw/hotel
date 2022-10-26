    <?php 

if(isset($_POST['upd_lim']))
{

    $idhab=$_POST['lcha'];
  
    
         $statement2 = $connect->prepare("UPDATE habitaciones SET estadha='1' WHERE idhab= $idhab LIMIT 1;");
         

           //echo "$item";
                //Execute the statement and insert our values.
        //$inserted = $statement->execute(); 
        $inserted = $statement2->execute(); 
       

        if($inserted>0){

    echo '<script type="text/javascript">
swal("Listo!", "Se limpio el cuarto correctamente", "success").then(function() {
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