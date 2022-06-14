<?php 
    include_once "loginCheck.inc.php";
    include_once "controllers/FilmDataController.php";
?>

<form enctype="multipart/form-data" style="padding: 15px !important; margin-bottom: 30px" method="POST">



<div style="width: 500px !important;" class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Film címe:</span>
    </div>
    <input id="film_title" type="text" class="form-control" placeholder="Film cím felvitel" aria-label="Username" aria-describedby="basic-addon1" name="film_title" onkeyup="film_cim_kiiratas()">
</div>



<div style="width: 500px !important;" class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Film hossza:</span>
    </div>
    <input id="film_length" inputmode="numeric" pattern="[0-9]*" type="number" class="form-control" placeholder="Film hossz felvitel" aria-label="Username" aria-describedby="basic-addon1" name="film_length" onkeyup="film_hossz_kiiratas()">
</div>


<div style="width: 500px !important;" class="form-group mb-3">
    <label class="input-group-text" for="exampleFormControlTextarea1">Film leírás</label>
    <textarea id="film_description" style="width: 500px !important;" class="form-control" name="film_description" rows="5" onkeyup="film_leiras_kiiratas()"></textarea>
</div>

<!--
<div style="width: 500px !important;" class="input-group mb-3">
    <input accept="image/*" type="file" class="form-control" id="inputGroupFile01">
    <input accept="image/*" type='file' id="imgInp" />
    <img id="blah" src="#" alt="your image" />
</div>
-->
<div class="input-group mb-3" style="width: 500px !important;">
    <input class="form-control" id="formFile" type="file" name="Image" onchange="preview()" accept="image/*" value=null>
</div>

<input style="margin-left: -20px !important;" class="btn btn-outline-warning" name="film_upload" type="submit" value="Film felvitele" >
</form>

<?php 

    if(isset($_POST["film_upload"]))
    {
        $filmTitle=$_POST['film_title'];
        $filmLength=$_POST['film_length'];
        $filmDescription=$_POST['film_description'];

        UploadFilm($filmTitle, $filmLength, $filmDescription);
    }

?>