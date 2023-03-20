<html>
    <head>
        <title>INFO 108 - Intro a PHP</title>
    </head>
    <body>
        <?php

        if(isset($_GET['accion'])=='borrar'){
            $rut = $_GET['rutdel'];
            include('./lib/conexion.php'); // conexión a mi base de datos
            $eliminar = "delete from medico where rut='$rut'";
            if (mysqli_query($con, $eliminar)) {
                echo "Record deleted successfully";
              } else {
                echo "Error deleting record: " . mysqli_error($con);
              }
        }
        echo '<h1>
            ELIMINAR MEDICO
        </h1>';
        ?>
        <h3> Lista de Médicos:</h3>
        <div>
            <table>
                <?php
                include('./lib/conexion.php');
                $sql = mysqli_query($con, "select nombre, rut from medico order by nombre");
                while($fila = mysqli_fetch_assoc($sql)){
                    echo '<tr>
                        <td>'.$fila['nombre'].'</td>
                        <td>'.$fila['rut'].'</td>
                        <td><a href="eliminar.php?accion=borrar&rutdel='.$fila['rut'].'">Eliminar</a></td>
                        <td><a href="actualizar.php?accion=actualiza&rutupd='.$fila['rut'].'">Actualizar</a></td>
                        </tr>';
                }
                ?>
            </table>
        </div>
        <br><br><a href="index.php">REGRESAR A PAGINA INICIO</a>
    </body>
</html>