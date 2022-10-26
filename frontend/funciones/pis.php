 <?php 
 require '../../backend/config/Conexion.php';
 echo '<option value="0">Seleccione el piso</option>';
 $stmt = $connect->prepare('SELECT * FROM `pisos` ORDER BY idps  ASC');

  $stmt->execute();


  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idps ; ?>"><?php echo $nompis; ?></option>

            <?php
        }

  ?>


