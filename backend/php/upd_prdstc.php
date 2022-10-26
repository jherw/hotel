<?php
  

  if(isset($_POST['up_prdst']))
{
    $idprd = $_POST['idprd'];
    $stckprd=$_POST['prdsto'];
    
    try {

        $query = "UPDATE productos SET stckprd=:stckprd WHERE idprd=:idprd LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':stckprd' => $stckprd,
            ':idprd' => $idprd
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Stock actualizado correctamente", "success").then(function() {
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