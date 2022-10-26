<?php 
include_once '../backend/php/login.php'
 ?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel "MI CIELO"</title>
    <link rel="stylesheet" href="../backend/css/style.css">
    <link rel="icon" type="image/png" href="../backend/img/ico.png">
    
</head>
<body>

    <div class="login-wrapper">
        <div class=" box-image box-col">
 <img src="../backend/img/sideimage.png" alt="sideimage"> 
        </div>
        <div class="box-col">
           <div class="box-form">
               <div class="inner">
                   <div class="form-head">
                    <form autocomplete="off" method="post"  role="form">
                       <div class="title">
                           Hotel "MI CIELO"
                       </div>
                       <?php 
                            if (isset($errMsg)) {
                                echo '
    <div style="color:#FF0000;text-align:center;font-size:20px; font-weight:bold;">'.$errMsg.'</div>
    ';  ;
                            }

                        ?>
                       <div class="form-group">
                           
                           <input type="text" name="correo" value="<?php if(isset($_POST['correo'])) echo $_POST['correo'] ?>"  autocomplete="off" class="form-control" placeholder="Correo electronico">
                       </div>
                       <div class="form-group">
                          
                           <input type="password" required="true" name="contra" value="<?php if(isset($_POST['contra'])) echo MD5($_POST['contra']) ?>" class="form-control" placeholder="Contraseña">
                       </div>
                       <div class="form-button">
                           <div class="check-action">
                               <input type="checkbox" class="check" checked>
                               <span class="name">Recuérdame</span>
                           </div>
                        
                       </div>
                       <div class="actions">
                           <button class="btn btn-submit" name='login' type="submit">Acceder</button>
                           
                       </div>
                    </form>
                   </div>
               </div>
           </div>

        </div>
    </div>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
</body>
</html>