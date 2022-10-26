 <?php 
 require '../../backend/config/Conexion.php';
 echo '<option value="0">Seleccione</option>';
 $stmt = $connect->prepare('SELECT * FROM `clientes` ORDER BY iddn  DESC');

  $stmt->execute();


  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $iddn ; ?>"><?php echo $numc; ?></option>

            <?php
        }

  ?>


