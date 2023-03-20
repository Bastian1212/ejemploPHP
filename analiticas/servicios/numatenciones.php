<?php
    include '../lib/conexion.php';

    if (!($con->connect_errno)) {
        $myquery = "select nombre, count(*) as cantidad from atenciones.medico, atencion where rut=medico_rut group by rut;";
        
        $results = $con->query($myquery);

        if ( !$results->num_rows >0 ) {
            echo "nooooo!";
        die;
        }

        $dataM = array();

        for ($x = 0; $x < $results->num_rows; $x++) {
            $dataM[] = $results->fetch_assoc();
        }

        echo json_encode($dataM);
    }
?>