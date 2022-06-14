<?php 
    include_once "loginCheck.inc.php";
?>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./main_page.php">Kezdőlap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./favorites.php">Kedvencek</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin Eszközök
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="user_management.php">Felhasználók kezelése</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="film_upload.php">Film felvitele</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="film_edit.php">Filmek szerkesztése</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Bejelentkezve: <?php echo $_SESSION["email"]; ?></a>

                <p><a class="btn btn-outline-danger" href='logout.php'>Kijelentkezés</a></p>
            </form>
        </div>
    </div>
</nav>