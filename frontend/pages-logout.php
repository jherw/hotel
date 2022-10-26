<?php
    require '../backend/config/Conexion.php';
    session_destroy();

    header('Location: login.php');
?>
