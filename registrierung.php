<?php
    require("connection.php");

    if (isset($_POST["submit"])) {
        var_dump($_POST); // var_dump() gibt alle Variablen und ihre Werte aus

        // Récupération des valeurs du formulaire
        $name = $_POST["name"];     // name           
        $email = $_POST["email"];   // email
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // check if user already exists in database and create  new user    
        $statement = $con->prepare("SELECT * FROM users WHERE username=:username OR email=:email");
        $statement->bindParam(":username", $name); // bindParam() verbindet die Variablen mit den Werten
        $statement->bindParam(":email", $email);
        $statement->execute(); 

        $userAlreadyExists = $statement->fetchColumn();  // fetchColumn() gibt die erste Spalte der Tabelle zurück

        if(!$userAlreadyExists) {
            registerUser($name, $email, $password); 
        } else {
            echo "User existiert bereits";
        }
    }

        function registerUser($name, $email, $password) { // register neu user        
            global $con;
            $statement = $con->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $statement->bindParam(":username", $name);
            $statement->bindParam(":email", $email);
            $statement->bindParam(":password", $password);
            $result = $statement->execute();
            header("Location: homepage.php"); // return result to a new page with the new username  and password 
            exit; // EXIT_
}
?>


<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldungsseite</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <form action="prozess.php" method="post">
        <div class="container">
            <label for="name">Name*</label>
            <input type="text" id="name" name="name" placeholder="Name eingeben" class="username" required>
            <br>

            <label for="vorname">Vorname*</label>
            <input type="text" id="vorname" name="vorname" placeholder="Vorname eingeben" class="username" required>
            <br>

            <label for="benutzername">Benutzername*</label>
            <input type="text" id="benutzername" name="benutzername" placeholder="Benutzername eingeben"
                class="username" required>
            <br>

            <label for="email">E-Mail*</label>
            <input type="text" id="email" name="email" placeholder="E-mail eingeben" class="email" required>
            <br>

            <label for="password">Passwort*</label>
            <input type="password" id="password" name="password" placeholder="Passwort eingeben" class="email" required>
            <br>

            <label for="password">Passwort bestätigen*</label>
            <input type="password" id="password" name="password" placeholder="Passwort eingeben" class="email" required>
            <br>

            <input type="reset" name="reset" value="Abbrechen">
            <input type="submit" name="ok" value="Registrieren">

        </div>
    </form>

    <!--
            <h1 class="login-vertical">LOGIN</h1>
            <div class="login">
                <div class="login-tilted"></div>
                <div class="user">
                    <i class="ri-user-fill"></i>
                </div>
                <h1 class="login-title">ANMELDUNG</h1>
                <input type="text" name="name" placeholder="Benutzername" class="username" required>
                <input type="text" name="email" placeholder="Email@beispiel.com" class="email" required>
                <input type="password" name="password" placeholder="Password" class="password" required>

                <div class="login-btn">
                    <button type="submit" name="submit">
                        <i class="ri-play-line"></i>
                    </button>
                </div>
                <a href="registrierung.php" class="forgot">Passwort vergessen</a>
            </div>
        </div>
    </form>-->
</body>

</html>