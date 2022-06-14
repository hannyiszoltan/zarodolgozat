<?php
session_start();
error_reporting(0);
include_once "includers/loginCheck.php";
?>

<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="CSS/main_page.css">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="javascript/main_page_films.js"></script>

    <title>Kezdőlap</title>
</head>
<body>
<?php 
if ($_SESSION["admin"]==1){
    include_once "includers/adminNavbar.inc.php";
}
else{
    include_once "includers/userNavbar.inc.php";
}

?>

<div style="margin-right: unset;margin-left: unset" class="row" id="tablazat">

</div>

<!-- The Modal -->
<div class="modal" id="filmCard">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 id="modal-fejlec" class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div id="modal-bodyContent" class="modal-body row">

            </div>

            <div id="comments">

            </div>

            <?php 
            include_once "controllers/CommentController.php";
                if(isset($_POST["deleteCommentForm"])){
                    $id=$_POST['review_id'];
                    DeleteComment($id);
                }
            
                if(isset($_POST["commentUp"])){
                    $filmId=$_POST['commentFilmId'];
                    $value=$_POST['reviewValue'];
                    $content=$_POST['commentContent'];
                    $userId=$_SESSION['id'];

                    UpComment($filmId, $value, $content, $userId);
                }

            ?>


            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Bezárás</button>
            </div>
            
        </div>
    </div>
</div>

<div id="adminstatus" style="display: none";><?php echo $_SESSION['admin']; ?></div>
<div id="userstatus" style="display: none";><?php echo $_SESSION['id']; ?></div>



<?php
    include_once "includers/footer.inc.php";
?>
</body>
</html>
