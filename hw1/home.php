<?php

    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }

?>



<html>
    <head>
    <title>MovieShard - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='css\home.css'<?php echo time();?>>
    <script src='home.js' defer></script>
    </head>
    <body>
    <nav>
      <div id="menu"><div></div></div>
      <a class="nav1" href="home.php">Home</a>
      <a class="nav1" href="favourite.php">Favs</a>
      <a class="nav1" href="climate.php">Awareness</a>
      <a class="nav1" href="logout.php">Logout</a>
    </nav>
        <main>
            <div id="titolo">
            <span>MovieShard - Home<span>
            </div>
            <div id="container">
            <div id="ciao">    
            <span>Hello <?php echo $_SESSION["username"]; ?></span>
            </div>
            </div>
            <div id="container-container-random">
            <div id="container-random"></div>
            </div>
            <p>
            <span>Your favourite movies, always with you</span></p>
        <div id=button-container>
                <form name="search-bar" method="post" class="search-bar">
                <input type="text" name="search" placeholder="Search a movie!" id="search-bar">
                <button type='submit' value="Search"><img src="css/images/search.png"></button>
                </form>        
            </div>
            <div id=big-container>
            </div>
        </main>
    </body>
    <footer>MovieShard - A web-programming project</footer>
</html>