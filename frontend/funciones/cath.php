 <?php 
 require '../../backend/config/Conexion.php';
 echo '<option value="0">Seleccione categoria</option>';
 $stmt = $connect->prepare('SELECT * FROM `hcate` ORDER BY idhc  ASC');

  $stmt->execute();


  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idhc ; ?>"><?php echo $nomhc; ?></option>

            <?php
        }

  ?>


