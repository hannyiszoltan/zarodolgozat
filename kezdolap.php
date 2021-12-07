<?php
session_start();
include "./backend/bejelentkezes_ell.php";
?>

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kezdőlap</title>
</head>
<body>

<h1>Üdvözöllek a kezdőlapon! <?php echo $_SESSION["email"]; ?></h1>

<p><a href='backend/kijelentkezes.php'>Kijelentkezés</a></p>


</body>
</html>
