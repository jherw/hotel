<?php
  require '../../backend/config/Conexion.php';

  if(isset($_POST['upd_pass']))
{
        
    $id = $_POST['cfid'];
    $contra=MD5($_POST['cfpas']);
    
    try {

        $query = "UPDATE usuarios SET contra=:contra WHERE id=:id LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':contra' => $contra,
            ':id' => $id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Contraseña actualizada correctamente", "success").then(function() {
            window.location = "../cuenta/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../cuenta/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>