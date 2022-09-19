<?php

    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }

?>



<html>
    <head>
    <title>MovieShard - Your favourites</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='css\home.css'<?php echo time();?>>
    <script src='favourite.js' defer></script>
    </head>
    <body>
    <nav>
      <a class="nav1" href="home.php">Home</a>
      <a class="nav1" href="favourite.php">Favs</a>
      <a class="nav1" href="climate.php">Awareness</a>
      <a class="nav1" href="logout.php">Logout</a>
    </nav>
        <main>
            <div id="titolo">
            <span>MovieShard - Your favourites<span>
            </div>
            <div id="container">
            <div id="ciao">    
            <span>Generic greeting, <?php echo $_SESSION["username"]; ?></span>
            </div>
            </div>
            <p>
            <span>Here are your favourite movies</span></p>
            <div id=big-container-favourite>
            </div>
        </main>
    </body>
    <footer>MovieShard - A web-programming project</footer>
</html>