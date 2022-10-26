<?php
  

  if(isset($_POST['up_cat']))
{
    $idcat = $_POST['idcat'];
    $nomcat = $_POST['ctnam'];
    

    try {

        $query = "UPDATE categorias SET nomcat=:nomcat WHERE idcat=:idcat LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nomcat' => $nomcat,
            ':idcat' => $idcat
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../categorias/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../categorias/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>