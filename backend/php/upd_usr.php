<?php
  

  if(isset($_POST['up_usr']))
{
    $id = $_POST['id'];
    $nombre = $_POST['uxnam'];
    $correo = $_POST['uxem'];
    $usuario = $_POST['uxuse'];
    $rol = $_POST['uxrul'];
    

   

    try {

        $query = "UPDATE usuarios SET nombre=:nombre, correo=:correo, usuario=:usuario, rol=:rol WHERE id=:id LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nombre' => $nombre,
            ':correo' => $correo,
            ':usuario' => $usuario,
            ':rol' => $rol,
            ':id' => $id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../usuarios/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../usuarios/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>