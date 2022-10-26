 <?php 
 require '../../backend/config/Conexion.php';
 echo '<option value="0">Seleccione cliente</option>';
 $stmt = $connect->prepare('SELECT * FROM `clientes` ORDER BY iddn  ASC');

  $stmt->execute();


  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $iddn ; ?>"><?php echo $nomc; ?>&nbsp;<?php echo $apec; ?></option>

            <?php
        }

  ?>


