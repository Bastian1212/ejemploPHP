<html>
    <head>
        <title>INFO 108 - Intro a PHP</title>
    </head>
    <body>
        <h1>
            INFO108, mi primer sitio en PHP 
        </h1>
        <h2> MEDICAMENTOS </h2>

        
       
        <?php
            $nombre ='Alvaro';
            // echo '<h2>Hola '.$nombre.'</h2>';
            include('./lib/conexion.php');
            $sql = mysqli_query($con, "select count(*) as cantidad from medicamento");
            $fila = mysqli_fetch_assoc($sql);
            echo '<h2>Total Medicamentos ('.$fila['cantidad'].')</h2>';
        ?>
        <h3> LISTADO MEDICAMENTOS </h3>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Código</th>
                >
            </tr>
            <?php
                $sql = mysqli_query($con, "select nombre, codigo from medicamento order by nombre");
                while($fila = mysqli_fetch_assoc($sql)){
                    echo '<tr>
                        <td>'.$fila['nombre'].'</td>
                        <td>'.$fila['codigo'].'</td>
                        </tr>';
                }
            ?>
        </table>
        <h3> LISTADO DE MEDICOS </h3>
        <div>
            <table>
                <tr>
                    <th>pasaporteArbitro</th>
                    <th>numbre</th>
                    <th>nacionalidad</th>
                </tr>
                <?php
                $sql = mysqli_query($con, "select pasaporteArbitro, rut from arbitro order by pasaporteArbitro");
                while($fila = mysqli_fetch_assoc($sql)){
                    echo '<tr>
                        <td>'.$fila['pasaporteArbitro'].'</td>
                        <td>'.$fila['nombre'].'</td>
                        <td>'.$fila['nacionalidad'].'</td>
                        </tr>';
                }
                ?>
            </table>
        </div>
        <div><br><br><a href="agregar.php">AGREGAR MEDICO</a></div>
        <div><br><a href="eliminar.php">ELIMINAR Y ACTUALIZAR MEDICO</a></div>
        <?php
            echo '<br><h3>Fin del comunicado</h3>';
        ?>
    </body>
</html>