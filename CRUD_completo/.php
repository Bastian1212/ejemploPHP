<html>
    <head>
        <title>INFO 108 - Intro a PHP</title>
    </head>
    <body>
        <?php
        if(isset($_POST['add'])){
            $nombre = $_POST['nombre'];
            $ru121t = $_POST['rut'];
            $colegio = $_POST['colegiado'];
            include('./lib/conexion.php');
            $revisar = mysqli_query($con, "select * from medico where rut ='$rut'");
            if(mysqli_num_rows($revisar)==0){
                $insertar = mysqli_query($con, "insert into medico values ('$rut', '$nombre', '$colegio')");
            }else{
                echo 'ya existe el médico '.$rut;
            }
        }

        echo '<h1>
            INFO108, mi primer sitio en PHP - AGREGAR MEDICOS
        </h1>';
        
        ?>
        <form method="POST">
            <div>
                <label>RUT</label>
                <input type="text" name="rut" required>
            </div>
            <div>
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </div>
            <div>
                <label>Colegiado</label>
                <input type="text" name="colegiado" required>
            </div>
            <button type="submit" name="add">
                Agregar médico
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