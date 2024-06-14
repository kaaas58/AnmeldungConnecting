<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginBereich</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['username'])){
            echo "<h1>Willkommen ".$_SESSION['first_name']. " ".$_SESSION['last_name']."</h1>";
        } else {
            header("Location: index.php");
        }
    ?> 
</body>
</html>