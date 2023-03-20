<html>
    <head>
        <title> INFO108 - comenzando con PHP</title>

    </head>
    <body>
        <h1> INFO 108 -COMENZANDO CON MI SITIO EN PHP </h1>
        <?php
            $nombre = 'Bastian';
            echo '<h2>Hola '.$nombre.'</h2>';
            include ('./lib/conexion.php');
            $sql = mysqli_query($con,"select count(*) as cantidad from paciente");
            $fila = mysqli_fetch_assoc($sql);
            echo '<h2>Pacientes ('.$fila['cantidad'].')</h2>';
        ?>
        <table>
            <tr>
                <th> Nombre </th>
                <th> Rut </th>
            </tr>
            <?php
                $sql =  mysqli_query($con,"SELECT nombre,rut FROM paciente order by nombre");
                while ($fila = mysqli_fetch_assoc($sql)){
                    echo  '<tr>
                        <td>'.$fila['nombre'].'</td>
                        <td>'.$fila['rut'].'</td>
                        </tr>';                    
                }

            ?>
        </table>
    </body>

</html>