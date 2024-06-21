<?php

include ('config.php');
include ('validate.php');

    mysqli_query($conn, $update);
    header("Location: landing.html");
    die();
?>