<?php
//QUESTO FILE PRENDE I FILM DAL DATABASE

session_start();

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

$user = mysqli_real_escape_string($conn, $_SESSION["user_id"]);
$query = "SELECT movie_title, movie_img from hw1.favourites where id_user='$user'";
$res = mysqli_query($conn, $query) or die(" but not executed" . mysqli_error($conn));



while($row = mysqli_fetch_assoc($res))
    $test[] = $row; 
print json_encode($test);
exit();

?>

