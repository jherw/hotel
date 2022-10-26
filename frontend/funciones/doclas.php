 


  
  <?php 
  require '../../backend/config/Conexion.php'; 
  $pais = $_POST['paises'];
  $stmt = $connect->query("SELECT * FROM clientes WHERE iddn = $pais");

  

  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{

  echo '<option value="' . $row['iddn']. '">' . $row['apec'] . '</option>' . "\n";
}

   ?>

  
