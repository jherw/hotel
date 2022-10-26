    <?php 

if(isset($_POST['upd_fin']))
{

    $idhab=$_POST['rxha'];
    $idrese=$_POST['rxre'];
    $iddn=$_POST['rxcli'];
    $nomc=$_POST['rxnomcli'];
    $numiha=$_POST['rxnumha'];
    $detaha=$_POST['rxdeha'];
    $precha=$_POST['rxprha'];
    
         $statement2 = $connect->prepare("UPDATE habitaciones SET estadha='3' WHERE idhab= $idhab LIMIT 1;");
         $statement3 = $connect->prepare("INSERT INTO rs_history (idhab,idrese,iddn,nomc,numiha,detaha,precha) VALUES('$idhab','$idrese','$iddn','$nomc','$numiha','$detaha','$precha')");
         $statement4 = $connect->prepare("DELETE FROM reservar WHERE idrese = $idrese;");

         




           //echo "$item";
                //Execute the statement and insert our values.
        //$inserted = $statement->execute(); 
        $inserted = $statement2->execute(); 
        $inserted = $statement3->execute(); 
        $inserted = $statement4->execute(); 


        if($inserted>0){

    echo '<script type="text/javascript">
swal("Listo!", "La salida fue cancelada correctamente", "success").then(function() {
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