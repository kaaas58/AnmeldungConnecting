<?php
    require_once("JavascriptUtils.php");
    session_start();

    if (isset($_SESSION["error"])) {
        JavascriptUtils::alert($_SESSION["error"]);
        unset($_SESSION["error"]);
    }
?>

<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldungsseite</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="registrierung.css">
</head>

<body>
    <form action="prozess.php" method="post">
        <div class="container">
            <label for="name">Name*</label>
            
            <input type="text" 
            id="name" 
            name="name" 
            placeholder="Name eingeben" 
            class="username" 
            required 
            value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>">
            <br>

            <label for="vorname">Vorname*</label>
            <input type="text" id="vorname" name="vorname" placeholder="Vorname eingeben" class="username" required value="<?php echo isset($_SESSION['vorname']) ? $_SESSION['vorname'] : ''; ?>">
            <br>

            <label for="username">Username*</label>
            <input type="text" id="username" name="username" placeholder="Username eingeben" class="username" required value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>">
            <br>

            <label for="email">E-Mail*</label>
            <input type="text" id="email" name="email" placeholder="E-mail eingeben" class="email" required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
            <br>

            <label for="password">Passwort*</label>
            <input type="password" id="password" name="password" placeholder="Passwort eingeben" class="email" required>
            <br>

            <label for="password">Passwort bestätigen*</label>
            <input type="password" id="password_confirm" name="password_confirm" placeholder="Passwort eingeben"
                class="password" required>
            <br>

            <input type="hidden" name="submit" value="1">

          
            <a href="index.php" class="btn">Abbrechen</a>
            
            <input type="submit" name="ok" value="Registrieren">

        </div>
    </form>

</body>

</html>