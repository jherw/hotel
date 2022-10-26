<?php
  

  if(isset($_POST['up_prd']))
{
    $idprd = $_POST['idprd'];
    $nomprd = $_POST['prdnam'];
    $numprd = $_POST['prdcod'];
    $detprd = $_POST['prddet'];
    $preprd = $_POST['prdpre'];
    $idcat = $_POST['prdcat'];
    

   

    try {

        $query = "UPDATE productos SET nomprd=:nomprd, numprd=:numprd, detprd=:detprd, preprd=:preprd, idcat=:idcat WHERE idprd=:idprd LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nomprd' => $nomprd,
            ':numprd' => $numprd,
            ':detprd' => $detprd,
            ':preprd' => $preprd,
            ':idcat' => $idcat,
            ':idprd' => $idprd
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../productos/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../productos/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>