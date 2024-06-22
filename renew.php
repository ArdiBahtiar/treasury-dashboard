<?php

    include ('config.php');
    include ('expire_update.php');

    mysqli_query($conn, $update);
    header("Location: landing.html");
    die();
?>