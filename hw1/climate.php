<?php

    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }

?>



<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MovieShard - Awareness</title>
    <link rel='stylesheet' href='css\climate.css'<?php echo time();?>>
    <script src='climate.js' defer></script>
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
            <span>MovieShard - Awareness<span>
            </div>
            <div id="container">
            <div id="ciao">    
            <span>Hello <?php echo $_SESSION["username"]; ?>, fellow movie lover. <br> We have only this much time left to make things right.
<br>We need to spread awareness in order to get fairer laws for the planet.<br> 
Here some movies about this topic that you could watch with your friends and family.
</span>
            </div>
            </div>
            <div id="climate-clock">
            <script src="https://climateclock.world/widget-v2.js" async></script>
            <climate-clock />
            </div>
            <article>
     <div class="flex-container">
      <div class="numero">1.</div>
      <div class="contenitore-articolo">
      <div class="titolo" data-number=1 data-title="Interstellar"><span>Interstellar</span></div>
      <div class="testo" data-id=1></div>
      </div>
     </div>
     <div class="flex-container2">
      <div class="numero">2.</div>
      <div class="contenitore-articolo">
      <div class="titolo" data-number=2 data-title="Princess Mononoke"><span>Princess Mononoke</span></div>
      <div class="testo" data-id=2></div>
      </div>
     </div>
     <div class="flex-container2">
      <div class="numero">3.</div>
      <div class="contenitore-articolo">
      <div class="titolo" data-number=3 data-title="My octupus teacher"><span>My Octupus Teacher</span></div>
      <div class="testo" data-id=3></div>
      </div>
     </div>
     <div class="flex-container2">
      <div class="numero">4.</div>
      <div class="contenitore-articolo">
      <div class="titolo" data-number=4 data-title="Don't look up"><span>Don't Look Up</span></div>
      <div class="testo" data-id=4></div>
      </div>
      </div>
      <div class="flex-container2">
        <div class="numero">5.</div>
        <div class="contenitore-articolo">
        <div class="titolo" data-number=5 data-title="Wall-E"><span>Wall-E</span></div>
        <div class="testo" data-id=5></div>
        </div>
        </div>
   </article>
        </main>
    </body>
    <footer>MovieShard - A web-programming project</footer>
</html>