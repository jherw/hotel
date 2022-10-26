 


  
  <?php 
  require '../../backend/config/Conexion.php'; 
  $el_continente = $_POST['continente'];
  $stmt = $connect->query("SELECT * FROM clientes WHERE iddn = $el_continente");

  

  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{

  echo '<option value="' . $row['iddn']. '">' . $row['nomc'] . '</option>' . "\n";
}

   ?>

  
