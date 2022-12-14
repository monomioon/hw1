<?php
    //Verifica che l'utente sia loggato
    include 'auth.php';
    if(checkAuth()){
        header('Location: home.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        // Se username e password sono stati inviati
        // Connessione al DB
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        // Preparazione 
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $searchField = filter_var($username, FILTER_VALIDATE_EMAIL) ? "email" : "username";
        // ID e Username per sessione, password per controllo
        $query = "SELECT id, username, password FROM users WHERE $searchField = '$username'";
        // Esecuzione
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        if (mysqli_num_rows($res) > 0) {
            // Ritorna una sola riga, il che ci basta perché l'utente autenticato è solo uno
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {

                // (La gestione della sessione con i cookie è stata 
                // eliminata, per non aggiungere confusione)

                // Imposto una sessione dell'utente
                $_SESSION["username"] = $entry['username'];
                $_SESSION["user_id"] = $entry['id'];
                header("Location: home.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }
        // Se l'utente non è stato trovato o la password non ha passato la verifica
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        // Se solo uno dei due è impostato
        $error = "Inserisci username e password.";
    }


?>  


<html>
    <head>
        <link rel='stylesheet' href='css\signup.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MovieShard - Accedi</title>
    </head>
    <body>
    <h1>MovieShard - Accedi</h1>
        <main>
            <?php
                // Verifica la presenza di errori
                if (isset($error)) {
                    echo "<span class='error'>$error</span>";
                }
                
            ?>
            <form name='login' method='post'>
                <!-- Seleziono il valore di ogni campo sulla base dei valori inviati al server via POST -->
                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                </div>
                <div>
                    <input type='submit' value="Accedi">
                </div>
            </form>
            <div class="signup">Non hai un account? <a href="signup.php">Iscriviti</a>
        </main>
    </body>
</html>