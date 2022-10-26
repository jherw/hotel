<?php
  

  if(isset($_POST['up_cat']))
{
    $idhc = $_POST['chid'];
    $nomhc = $_POST['chnam'];
    

    try {

        $query = "UPDATE hcate SET nomhc=:nomhc WHERE idhc=:idhc LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nomhc' => $nomhc,
            ':idhc' => $idhc
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../h_categoria/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../h_categoria/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>