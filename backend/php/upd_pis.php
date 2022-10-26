<?php
  

  if(isset($_POST['up_pis']))
{
    $idps = $_POST['pxid'];
    $nompis = $_POST['pxnam'];
    
    
    try {

        $query = "UPDATE pisos SET nompis=:nompis WHERE idps=:idps LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nompis' => $nompis,
            ':idps' => $idps
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../pisos/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../pisos/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>