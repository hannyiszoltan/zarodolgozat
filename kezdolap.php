<?php
session_start();
error_reporting(0);
include "./backend/bejelentkezes_ell.php";
?>

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./CSS/kezdolap.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="./javascript/film_adatok.js"></script>

    <title>Kezdőlap</title>
</head>
<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Kezdőlap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Kedvencek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Forum</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Toplisták
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Kaland</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Akció</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Fantasy</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Bejelentkezve: <?php echo $_SESSION["email"]; ?></a>

                <p><a class="btn btn-outline-danger" href='./backend/kijelentkezes.php'>Kijelentkezés</a></p>
            </form>
        </div>
    </div>
</nav>

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores illum ipsa neque nesciunt numquam optio reprehenderit ullam vitae. Aperiam doloribus ea ex facere ipsum odio odit praesentium similique unde veritatis.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque consectetur, corporis doloremque est eveniet fugit impedit magnam maxime minus molestias quasi, quibusdam quo reiciendis sint soluta velit veniam. Deserunt, quisquam.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quasi recusandae rem voluptatibus! Ab aut, delectus esse exercitationem fuga illo maxime nesciunt nobis quasi, qui quia quo sint, unde voluptates?
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque esse officia possimus sit tenetur voluptas voluptates? Commodi consectetur, dignissimos doloremque ipsum maiores minima obcaecati officia, perspiciatis ratione repellat soluta velit?
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut dolores eligendi error nesciunt odit pariatur quam quas suscipit tempora vitae. Aliquam culpa nisi perspiciatis placeat porro possimus quasi sint soluta.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores illum ipsa neque nesciunt numquam optio reprehenderit ullam vitae. Aperiam doloribus ea ex facere ipsum odio odit praesentium similique unde veritatis.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque consectetur, corporis doloremque est eveniet fugit impedit magnam maxime minus molestias quasi, quibusdam quo reiciendis sint soluta velit veniam. Deserunt, quisquam.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quasi recusandae rem voluptatibus! Ab aut, delectus esse exercitationem fuga illo maxime nesciunt nobis quasi, qui quia quo sint, unde voluptates?
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque esse officia possimus sit tenetur voluptas voluptates? Commodi consectetur, dignissimos doloremque ipsum maiores minima obcaecati officia, perspiciatis ratione repellat soluta velit?
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut dolores eligendi error nesciunt odit pariatur quam quas suscipit tempora vitae. Aliquam culpa nisi perspiciatis placeat porro possimus quasi sint soluta.

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores illum ipsa neque nesciunt numquam optio reprehenderit ullam vitae. Aperiam doloribus ea ex facere ipsum odio odit praesentium similique unde veritatis.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque consectetur, corporis doloremque est eveniet fugit impedit magnam maxime minus molestias quasi, quibusdam quo reiciendis sint soluta velit veniam. Deserunt, quisquam.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quasi recusandae rem voluptatibus! Ab aut, delectus esse exercitationem fuga illo maxime nesciunt nobis quasi, qui quia quo sint, unde voluptates?
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque esse officia possimus sit tenetur voluptas voluptates? Commodi consectetur, dignissimos doloremque ipsum maiores minima obcaecati officia, perspiciatis ratione repellat soluta velit?
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut dolores eligendi error nesciunt odit pariatur quam quas suscipit tempora vitae. Aliquam culpa nisi perspiciatis placeat porro possimus quasi sint soluta.


<div id="tablazat">

</div>






<footer>Designed by: H.Z.</footer>
</body>
</html>
