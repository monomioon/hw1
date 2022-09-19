<?php 
    /*******************************************************
        Controlla che l'username sia unico
    ********************************************************/
    require_once 'dbconfig.php';
    
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $username = mysqli_real_escape_string($conn, $_GET["q"]);

    $query = "SELECT username FROM users
                WHERE username = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    //se il numero delle righe è maggiore di zero ritorna true altrimenti ritorna false
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>