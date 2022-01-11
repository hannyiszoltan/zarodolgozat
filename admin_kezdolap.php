<?php
session_start();
error_reporting(0);
include "./backend/bejelentkezes_ell.php";
if($_SESSION["admin"]==1){ ?>
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

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="./javascript/film_adatok.js"></script>

    <title>Kezdőlap</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="admin_kezdolap.php">Kezdőlap</a>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin Eszközök
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="felhasznalok_kezelese.php">Felhasználók kezelése</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="film_kezeles.php">Film felvitele</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">asd</a></li>
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


<div style="margin-right: unset;margin-left: unset" class="row" id="tablazat">

</div>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="modal-fejlec" class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div id="modal-torzs" class="modal-body">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Bezárás</button>
            </div>

        </div>
    </div>
</div>










<footer id="footer">Üdv Admin!
    <p>
        GeeksforGeeks was born out of necessity-
        a need to provide a convenient and
        one-stop educational portal to all the
        students of Computer Science.
        <span id="points">...</span>

        <!-- Define the text that would be
            hidden by default and only shown
            when clicked on the button -->
        <span id="moreText"> This necessity was
            as personal to me as it was universal.
            This need combined with my passion for
            teaching resulted in GeeksforGeeks as
            we know today. My message to you, in
            our inaugural edition of Geeks Digest,
            would be that if you are looking for
            a problem to work on, you don’t need
            to look very far for it. All you should
            do is to look around yourself.
        </span>
    </p>


    <!-- Trigger toggleText() when the
        button is clicked -->
    <button onclick="toggleText()" id="textButton">
        Show More
    </button>
</footer>
</body>
</html>
<?php }
else{
    if(isset($_SESSION['email']))
    {
        header('Location: http://zarodolgozat.test/kezdolap.php');
        exit;
    }else{
        header('Location: http://zarodolgozat.test/index.php');
    }

}
