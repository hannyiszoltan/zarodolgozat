

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Regisztráció</title>

    <link rel="stylesheet" href="CSS/main_page.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column min-vh-100">



<button style="margin:10ch 10ch 10ch 10ch" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bejelentkezes">
    Bejelentkezés
</button>


<div class="modal" id="bejelentkezes">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">Bejelentkezés</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>


            <div class="modal-body">
                <?php 
                    include_once "includers/login.inc.php";
                ?>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Bezár</button>
            </div>

        </div>
    </div>
</div>



    <!-- Button to Open the Modal -->
    <button style="margin:10ch 10ch 10ch 10ch" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#regisztracio">
        Regisztráció
    </button>

    <!-- The Modal -->
    <div class="modal" id="regisztracio">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Regisztráció</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <?php 
                        include_once "includers/register.inc.php"
                    ?>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Bezár</button>
                </div>

            </div>
        </div>
    </div>




</body>
<?php
    include_once "includers/footer.inc.php";
?>
</html>

<?php

?>


