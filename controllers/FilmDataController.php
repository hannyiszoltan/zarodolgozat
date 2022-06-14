<?php
include_once "includers/database.inc.php";
include_once "includers/loginCheck.inc.php";


function AllFilm(){
    global $conn;

    header("Content-type: application/json; charset=utf8");

    $sql = "SELECT * FROM film_data";


    if (isset($conn)) {
        $data_result = mysqli_query($conn, $sql);
    }
    
    $film_data_array=array();
    
    if (isset($data_result)) {
        if (mysqli_num_rows($data_result) > 0) {
    
            while($row = mysqli_fetch_assoc($data_result)) {
                array_push($film_data_array,$row);
            }
    
            echo json_encode($film_data_array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
    
        } else {
            echo 0;
        }
    }
    mysqli_close($conn);

}

function AllFilmData($userId){
    global $conn;

    header("Content-type: application/json; charset=utf8");

    $sql = "SELECT * FROM `film_data` LEFT JOIN favorite ON film_data.film_id=favorite.favorite_film_id ORDER BY favorite_user_id=$userId DESC;";


    if (isset($conn)) {
        $data_result = mysqli_query($conn, $sql);
    }
    
    $film_data_array=array();
    
    if (isset($data_result)) {
        if (mysqli_num_rows($data_result) > 0) {
    
            while($row = mysqli_fetch_assoc($data_result)) {
                array_push($film_data_array,$row);
            }
    
            echo json_encode($film_data_array, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
    
        } else {
            echo 0;
        }
    }
    mysqli_close($conn);
    
}

function GetReviews(){
    global $conn;

    header("Content-type: Application/json; charset=utf8");


    $sql = "SELECT review_film_id,AVG(review_value)AS'review_value' FROM review GROUP BY review_film_id;";
    
    if (isset($conn)) {
        $data_result = mysqli_query($conn, $sql);
    }
    
    $review_data_array = array();
    
    if (isset($data_result)) {
        if (mysqli_num_rows($data_result) > 0) {
    
            while($row = mysqli_fetch_assoc($data_result)) {
                array_push($review_data_array,$row);
            }
    
            echo json_encode($review_data_array, JSON_UNESCAPED_UNICODE);
    
        } else {
            echo 0;
        }
    }
    
    mysqli_close($conn);

}


function ChangeFilmData($filmTitle, $filmLength, $filmDescription, $filmId){
    global $conn;

    //módosítani a film adatait
    $sql = "UPDATE film_data SET film_title='$filmTitle',film_length=$filmLength,film_description='$filmDescription' WHERE film_id=$filmId";

    if (isset($conn)) {
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    mysqli_close($conn);
}

function DeleteFilm($filmId, $imageName){
    global $conn;

    //törölni a filmet
    $sql1 = "DELETE FROM film_data WHERE film_id=$filmId";

    
    //Értékelések törlése a filmről
    $sql2="DELETE FROM review WHERE review_film_id=$filmId";
    if (isset($conn)) {
        mysqli_query($conn, $sql2);
    }

    //Kedvencekből a film törlése
    $sql3="DELETE FROM favorite WHERE favorite_film_id=$filmId";
    if (isset($conn)) {
        mysqli_query($conn, $sql3);
    }

    if (isset($conn)) {
        if (mysqli_query($conn, $sql1)) {
            if (!unlink("backend/kepek/$imageName")){
                echo 1;
            }
        }else {
            echo 0;
        }
    }

    mysqli_close($conn);
}



function UploadFilm($filmTitle, $filmLength, $filmDescription){
    global $conn;

    $filmReview = 0;

    $error = "";

    if ($filmTitle == "")
        $error.= "A film címének megadása kötelező!";
    if ($filmLength == "")
        $error .= "A film hosszának megadása kötelező!";
    if ($filmDescription == "")
        $error .= "A film leírásának megadása kötelező!";

    if ($error != "")
        echo $error;
    else{
        if (isset($conn)) {
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            else
            {
                mysqli_query($conn, "ANALYZE TABLE film_data");
                $result = mysqli_query($conn, "SHOW TABLE STATUS LIKE 'film_data'");
                $data = mysqli_fetch_assoc($result);
                $next_increment = $data['Auto_increment'];

                $imageName = $next_increment.'.'.pathinfo($_FILES['Image']['name'], PATHINFO_EXTENSION);

                $cel = "backend/kepek/" . $imageName;
                move_uploaded_file($_FILES['Image']['tmp_name'], $cel);


                $sql="INSERT INTO film_data (film_title, film_length, film_review, film_description, film_image) VALUES ('$filmTitle','$filmLength','$filmReview','$filmDescription','$imageName')";


                mysqli_query($conn, $sql);
                header("Location: film_edit.php");

            }
        }
    }

}

function AllFavorites($userId){
    global $conn;

    header("Content-type: Application/json; charset=utf8");
    
    $sql = "SELECT * FROM film_data RIGHT JOIN favorite ON film_id=favorite_film_id WHERE favorite_user_id=$userId;";
    
    if (isset($conn)) {
        $data_result = mysqli_query($conn, $sql);
    }
    
    $favorite_data_array = array();
    
    if (isset($data_result)) {
        if (mysqli_num_rows($data_result) > 0) {
    
            while($row = mysqli_fetch_assoc($data_result)) {
                array_push($favorite_data_array,$row);
            }
    
            echo json_encode($favorite_data_array, JSON_UNESCAPED_UNICODE);
    
        } else {
            echo 0;
        }
    }
    
    mysqli_close($conn);
    
}


function RemoveFavorite($userId, $filmId){
    global $conn;
    
    if (isset($conn)) {
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            $sql="DELETE FROM `favorite` WHERE favorite_film_id=$filmId AND favorite_user_id=$userId";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            header("Location: favorites.php");
        }
    }
}


function AddFavorite($userId, $filmId){
    global $conn;

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        else{
            $sql="SELECT * FROM favorite WHERE favorite_film_id=$filmId AND favorite_user_id=$userId";

            $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));

            echo "Már a kedvencekhez adtad!";
                if (mysqli_num_rows($query) <= 0){
                    $sql="INSERT INTO favorite (favorite_film_id, favorite_user_id) VALUES ($filmId,$userId)";

                    mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    header("Location: main_page.php");
                }
        }

}
?>