<?php
session_start();
include_once "controllers/FilmDataController.php";
include_once "controllers/UserController.php";
include_once "controllers/CommentController.php";

//FilmController
if($_GET['action'] == 'AllFilmData'){
    $userId=$_SESSION["id"];
    AllFilmData($userId);
}

if($_GET['action'] == 'AllFilm'){
    AllFilm();
}

if($_GET['action'] == 'ChangeFilmData'){
    $data = json_decode(file_get_contents("php://input"));
    $filmTitle = $data -> filmTitle;
    $filmLength = $data -> filmLength;
    $filmDescription = $data -> filmDescription;
    $filmId = $data -> filmId;
    ChangeFilmData($filmTitle, $filmLength, $filmDescription, $filmId);
}

if($_GET['action'] == 'DeleteFilm'){
    $data =json_decode(file_get_contents("php://input"));
    $filmId = $data -> filmId;
    $imageName = $data -> imageName;
    DeleteFilm($filmId, $imageName);
}

if($_GET['action'] == 'AllFavorite'){
    $userId=$_SESSION['id'];
    AllFavorites($userId);
}

if($_GET['action'] == 'RemoveFavorite'){
    $userId = $_SESSION['id'];
    $filmId = $_GET['filmid'];
    RemoveFavorite($userId, $filmId);
}

if($_GET['action'] == 'AddFavorite'){
    $userId = $_SESSION['id'];
    $filmId = $_GET['filmid'];
    AddFavorite($userId, $filmId);
}

if($_GET['action'] == 'GetReview'){
    GetReviews();
}

//CommentController
if($_GET['action'] == 'AllComments'){
    $id = $_GET['id'];
    $idNum = (int)$id;
    AllComment($id);
}

//UserController
if($_GET['action'] == 'AllUser'){
    AllUser();
}

if($_GET['action'] == 'DeleteUser'){
    $data = json_decode(file_get_contents("php://input"));
    $userid = $data -> userId;
    DeleteUser($userid);
}

if($_GET['action'] == 'ChangeAdmin'){
    $data = json_decode(file_get_contents("php://input"));
    $userId = $data -> userId;
    $userAdmin = $data -> userAdmin;
    AdminChange($userId, $userAdmin);
}
?>