<?php
    require_once 'auth.php';

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    
   if (checkAuth()){
       header("Location: home.php");
       exit;
   }


    if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])
     && isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"])){

        $error = array();

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        
        //Controlli
        //Username
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST["username"])) {
            $error[] = "Username non valido";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Username già utilizzato";
            }
        }
        //Password
        if (strlen($_POST["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        }
        //Conferma password
        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        //email
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Email già utilizzata";
            }
            //DEVO FAR COMPARIRE A SCHERMO L'ERRORE PER L'EMAIL UTILIZZATA
        }

        debug_to_console("sono qui");

        debug_to_console($error);



        //Registrazione nel database
        if (count($error) == 0) {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $surname = mysqli_real_escape_string($conn, $_POST['surname']);

            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(username, password, name, surname, email) VALUES('$username', '$password', '$name', '$surname', '$email')";

            debug_to_console("sono qui");

            
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["user_id"] = mysqli_insert_id($conn);
                mysqli_close($conn);
                header("Location: home.php");
                exit;
            } else {
                $error[] = "Errore di connessione al Database";
            }
        }

        mysqli_close($conn);
     }
?>

<html>
     <head>
         <link rel='stylesheet' href='css\signup.css'>
         <script src='signup.js' defer></script>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta charset="utf-8">
         
         <title>MovieShard - Signup</title>
     </head>
     <body>
     <h1>MovieShard - Signup</h1>
         <main>
         <form name='signup' method='post'>
             <div class="names">
                 <div class="name">
                    <div><label for=name>Nome</label></div>
                    <div><input type='text' name='name' <?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?>></div>
                    <span>Nome non valido</span>
                </div>
                <div class="surname">
                    <div><label for=surname>Cognome</label></div>
                    <div><input type='text' name='surname' <?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> ></div>
                    <span>Cognome non valido</span>
                </div>
             </div>    
            <div class="username">
                    <div><label for='username'>Username</label></div>
                    <div><input type='text' name='username' <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>></div>
                    <span>Nome utente non disponibile</span>
                </div>
                <div class="email">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email' <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>></div>
                    <span>Indirizzo email non valido</span>
                </div>
                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>></div>
                    <span>Inserisci almeno 8 caratteri</span>
                </div>
                <div class="confirm_password">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>></div>
                    <span>Le password non coincidono</span>
                </div>
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href="login.php">Accedi</a></div>
        </main>
    </body>
</html>