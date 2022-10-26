<?php
  

  if(isset($_POST['up_cli']))
{
    $iddn = $_POST['iddn'];
    $numc = $_POST['cxdoc'];
    $dnic = $_POST['cxtip'];
    $nomc = $_POST['cxna'];
    $apec = $_POST['cxap'];
    $corrc = $_POST['cxema'];
    

   

    try {

        $query = "UPDATE clientes SET dnic=:dnic, numc=:numc, nomc=:nomc, apec=:apec, corrc=:corrc WHERE iddn=:iddn LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':dnic' => $dnic,
            ':numc' => $numc,
            ':nomc' => $nomc,
            ':apec' => $apec,
            ':corrc' => $corrc,
            ':iddn' => $iddn
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../clientes/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../clientes/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>