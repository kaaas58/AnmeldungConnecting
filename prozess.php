<?php
    require("connection.php");
    session_start();
    $connection = Connector::getConnection();

    if(isset($_POST['ok'])){
            $name = strip_tags($_POST['name']);
            $vorname = strip_tags($_POST['vorname']);
            $username = strip_tags($_POST['username']);
            $email = strip_tags($_POST['email']);
            // Check here strip_tags() function
            $password = strip_tags($_POST['password']);
            $password_confirm = strip_tags($_POST['password_confirm']);
            
            $_SESSION['name'] = $name;
            $_SESSION['vorname'] = $vorname;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
           
            function isPasswordSecure($password){
                if(strlen($password) < 8){
                    return false;
                }
                if(!preg_match("#[0-9]+#", $password)){
                    return false;
                }
                if(!preg_match("#[a-z]+#", $password)){
                    return false;
                }
                if(!preg_match("#[A-Z]+#", $password)){
                    return false;
                }
                if(!preg_match("#[^a-zA-Z0-9\s]#", $password)){
                    return false;
                }

                return true;
            }

            if(!isPasswordSecure($password)){
                $_SESSION['error'] = "Passwort ist nicht sicher genug, Passwort muss mindestens 8 Zeichen lang sein, ein Großbuchstabe, ein Kleinbuchstabe, eine Zahl und ein Sonderzeichen enthalten.";
                header("Location: registrierung.php");
                exit();
            }

                
            if($password == $password_confirm){
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
                $statement = $connection->prepare("SELECT * FROM users WHERE benutzername=:username");
                $statement->bindParam(":username", $username);
                $statement->execute();
                $daten = $statement->fetch(PDO::FETCH_ASSOC);
                
                if(!empty($daten)){
                    $_SESSION['error'] = "Benutzername existiert bereits";
                    header("Location: registrierung.php");
                    exit();
                }



                $requete = $connection->prepare("INSERT INTO users (name, vorname, benutzername, email, password, passwort_bestaetigen)  VALUES (:name, :vorname, :benutzername, :email, :password, :passwort_bestaetigen)");
                $requete->execute([                    
                            'name' => $name,
                            'vorname' => $vorname,
                            'benutzername' => $username,
                            'email' => $email,
                            'password' => $hashedPassword,
                            'passwort_bestaetigen' => $hashedPassword
                            
                        ]);
                    header("Location: bestaetigung.php");
                    exit();
                    
                    
            } else {
                $_SESSION['error'] = "Passwörter stimmen nicht überein";
                header("Location: registrierung.php");
        
            }
}
    
?>;