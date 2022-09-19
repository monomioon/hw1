<?php 
    /*******************************************************
        Controlla che l'email sia unica
    ********************************************************/
    require_once 'dbconfig.php';
    
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $email = mysqli_real_escape_string($conn, $_GET["q"]);

    $query = "SELECT email FROM users
                WHERE email = '$email'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    //se il numero delle righe è maggiore di zero ritorna true altrimenti ritorna false
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>