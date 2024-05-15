<?php

    include './includes/dbconn.php';
    //Total Vehicle Entries
    $query=mysqli_query($con,"SELECT SUM(NumeroVagas) FROM `tbnumerovagas`;");
    $count_parkings=mysqli_num_rows($query);

    echo 333;
 ?>