<html>
    <head>
        <title>INFO 108 - Intro a PHP</title>
    </head>
    <body>
        <?php
        echo '<h1>
            INFO108, mi primer sitio en PHP - ACTUALIZAR
        </h1>';
        if(isset($_GET['accion'])=='actualiza'){
            echo 'hemos dado al enlace actualizar con el rut '.$_GET['rutupd'];
            $rut = $_GET['rutupd'];
            include('./lib/conexion.php');
            $medico = mysqli_query($con, "select * from medico where rut = '$rut'");
            $fila=mysqli_fetch_assoc($medico);
        }
        ?>
        <form method="POST" action='update.php'>
            <div>
                <label>RUT</label>
                <input type="text" name="rut" value=<?php echo $fila['rut']; ?> required>
            </div>
            <div>
                <label>Nombre</label>
                <input type="text" name="nombre" value=<?php echo $fila['nombre']; ?> required>
            </div>
            <div>
                <label>Colegiado</label>
                <input type="text" name="colegiado" value=<?php echo $fila['colegiado']; ?> required>
            </div>
            <button type="submit" name="update">
                Modificar médico
            </button>
        </form>
        <div>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Rut</th>
                </tr>
                <?php
                include('./lib/conexion.php');
                $sql = mysqli_query($con, "select nombre, rut from medico order by nombre");
                while($fila = mysqli_fetch_assoc($sql)){
                    echo '<tr>
                        <td>'.$fila['nombre'].'</td>
                        <td>'.$fila['rut'].'</td>
                        </tr>';
                }
                ?>
            </table>
        </div>
        <a href="index.php">REGRESAR A PAGINA INICIO</a>
    </body>
</html>