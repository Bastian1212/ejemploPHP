<?php
    include '../lib/conexion.php';

    if (!($con->connect_errno)) {
        $myquery = "select nombre as medicamento, count(*) as cantidad from medicamento group by codigo";
        
        $results = $con->query($myquery);

        if ( !$results->num_rows >0 ) {
            echo "nooooo!";
        die;
        }

        $data = array();

        for ($x = 0; $x < $results->num_rows; $x++) {
            $data[] = $results->fetch_assoc();
        }
        
        

        echo json_encode($data);
        
    }
?>