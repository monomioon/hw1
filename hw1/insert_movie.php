<?php
  require_once 'debug_to_console.php';
  require_once 'dbconfig.php';
  session_start();
  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

  $user = mysqli_real_escape_string($conn, $_SESSION["user_id"]);
  $movie_title = mysqli_real_escape_string($conn, $_GET["title"]);
  $img = mysqli_real_escape_string($conn, $_GET["img"]);


  $q = "INSERT INTO favourites(id_user, movie_title, movie_img) VALUES('$user', '$movie_title', '$img')"; // duplicati?

  $data = mysqli_query($conn, $q);
  mysqli_close($conn);

?>