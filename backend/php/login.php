<?php 
    require '../backend/config/Conexion.php';

    if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $correo = $_POST['correo'];
    
    $contra = MD5($_POST['contra']);

    if($correo == '')
      $errMsg = 'Digite su correo';
    if($contra == '')
      $errMsg = 'Digite su contraseña';

    if($errMsg == '') {
      try {
$stmt = $connect->prepare('SELECT id, nombre, correo, usuario,contra, rol FROM usuarios WHERE correo = :correo');


        $stmt->execute(array(
          ':correo' => $correo
          
          
          ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if($data == false){
          $errMsg = "El correo: $correo no se encuentra , puede solicitarlo con el administrador.";
        }
        else {
          if($contra == $data['contra']) {

            $_SESSION['id'] = $data['id'];
            $_SESSION['nombre'] = $data['nombre'];
            $_SESSION['correo'] = $data['correo'];
            $_SESSION['usuario'] = $data['usuario'];
            $_SESSION['contra'] = $data['contra'];
            $_SESSION['rol'] = $data['rol'];
            
            
    if($_SESSION['rol'] == 1){
          header('Location: administrador/escritorio.php');
        }
            exit;
          }
          else
            $errMsg = 'Contraseña incorrecta.';
        }
      }
      catch(PDOException $e) {
        $errMsg = $e->getMessage();
      }
    }
  }
 ?>