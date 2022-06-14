<?php
    include_once "includers/database.inc.php";
    include_once "includers/loginCheck.inc.php";

function AllComment($filmid){
    global $conn;
    header("Content-type: application/json; charset=utf8");

    $sql="SELECT review_id, users_name, review_content FROM review INNER JOIN users ON review.review_user_id=users.users_id WHERE review_film_id='$filmid'";

    if (isset($conn)) {
        $comments_result=mysqli_query($conn,$sql);
    }
    
    $film_comments_array=array();
    
    if (isset($comments_result)) {
        if (mysqli_num_rows($comments_result) > 0) {
    
            while($row = mysqli_fetch_assoc($comments_result)) {
                array_push($film_comments_array,$row);
            }
    
            echo json_encode($film_comments_array,JSON_UNESCAPED_UNICODE);
    
        } else {
            echo 0;
        }
    }

    mysqli_close($conn);
}


function DeleteComment($commentId){
    global $conn;

    //törölni a kommentet
    $sql = "DELETE FROM review WHERE review_id=$commentId";

    if (isset($conn)) {
        if (mysqli_query($conn, $sql)) {

        } else {
            echo'<h4 style="color:red">Sikertelen komment törlés!<h4>';
        }
    }

    mysqli_close($conn);
}


function UpComment($filmId, $value, $content, $userId){
    global $conn;

    $error="";

    if ($content=="")
        $error.="A komment megadása kötelező!";

    if ($value<1||$value>10)
        $error.="1-től 10-ig értékeld a filmet!";

    if ($error!="")
        echo"$error";
    //<SCRIPT> window.location.replace('./main_page.php'); alert('$error') </SCRIPT>

    else{
        if (isset($conn)) {
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            else{
                $sql="SELECT * FROM review WHERE review_film_id=$filmId and review_user_id=$userId";

                $query=mysqli_query($conn, $sql) or die(mysqli_error($conn));

                if(mysqli_num_rows($query) == 0){
                    $sql="INSERT INTO review (review_film_id, review_value, review_content, review_user_id) VALUES ($filmId,$value,'$content',$userId)";

                    mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    header("Location: main_page.php");
                }
                else {
                    echo '<script>alert("Már van kommented!")</script>';

                }
            }

        }
    }

    mysqli_close($conn);
}


?>