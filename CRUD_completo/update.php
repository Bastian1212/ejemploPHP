<?php

if(isset($_POST['update'])){
    echo 'estamos actualizando';
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $colegio = $_POST['colegiado'];
    include('./lib/conexion.php');
    $actualizar = mysqli_query($con, "update medico set nombre ='$nombre', colegiado='$colegio' where rut ='$rut'");
    echo '<a href="index.php">REGRESAR A PAGINA INICIO</a> '; 
}

?>