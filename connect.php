<?php
    $con = new mysqli('localhost', 'root', '', 'imguploadproject');
    if(!$con){
        die(mysqli_error($con));
    }


?>