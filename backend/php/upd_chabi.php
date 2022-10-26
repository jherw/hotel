<?php
  

  if(isset($_POST['up_ha']))
{
    $idhab = $_POST['hidx'];
    $numiha = $_POST['hnum'];
    $idps = $_POST['hpis'];
    $idhc = $_POST['hcat'];
    $precha = $_POST['hpre'];
    $detaha = $_POST['hdet'];

    try {

        $query = "UPDATE habitaciones SET numiha=:numiha, detaha=:detaha, precha=:precha, idps=:idps, idhc=:idhc WHERE idhab=:idhab LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':numiha' => $numiha,
            ':detaha' => $detaha,
            ':precha' => $precha,
            ':idps' => $idps,
            ':idhc' => $idhc,
            ':idhab' => $idhab
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Actualizado correctamente", "success").then(function() {
            window.location = "../habitacion/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "Error al actualizar", "error").then(function() {
            window.location = "../habitacion/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


?>