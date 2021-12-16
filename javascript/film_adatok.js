window.onload = function() {
fetch('http://zarodolgozat.test/backend/json_lekerdezes.php')
.then(x => x.json())
.then(y => megjelenit(y))
}

function megjelenit(adatok){
console.log(adatok);
var i=1;
let sz="";
for (var elem of adatok){
    sz+='<div class="card" style="width: 300px;">';
    sz+='<img src="http://zarodolgozat.test/backend/kepek/'+elem.film_kep+'" class="card-img-top" alt="film_kép">';
    sz+='<div class="card-body">';
    sz+='<h5 class="card-title">'+elem.film_cim+'</h5>';
    sz+='<p class="card-text">'+elem.film_leiras+'</p>';
    sz+='</div>';
    sz+='<div class="card-body">';
    sz+='<a href="#" class="card-link btn btn-outline-success">'+"Bővebben"+'</a>';
    sz+='<a href="#" class="card-link btn btn-outline-success">'+"Vélemények"+'</a>';
    sz+='<ul class="list-group list-group-flush">';

    sz+='<li class="list-group-item">Értékelés: '+elem.film_ertekeles+' <a href=""><i class="fas fa-thumbs-up ertekeles_nyil_fel"></i> </a> <a href=""><i class="fas fa-thumbs-down ertekeles_nyil_le"></i></a> </li>';
    sz+='<li class="list-group-item">'+"A second item"+'</li>';
    sz+='<li class="list-group-item">'+"A third item"+'</li>';
    sz+='</ul>';

    sz+='</div>';
    sz+='</div>';




}
    document.getElementById("tablazat").innerHTML=sz;

}

/*
function toggleText() {

    // Get all the elements from the page
    var points =
        document.getElementById("points");

    var showMoreText =
        document.getElementById("moreText");

    var buttonText =
        document.getElementById("textButton");

    // If the display property of the dots
    // to be displayed is already set to
    // 'none' (that is hidden) then this
    // section of code triggers
    if (points.style.display === "none") {

        // Hide the text between the span
        // elements
        showMoreText.style.display = "none";

        // Show the dots after the text
        points.style.display = "inline";

        // Change the text on button to
        // 'Show More'
        buttonText.innerHTML = "Show More";
    }

        // If the hidden portion is revealed,
    // we will change it back to be hidden
    else {

        // Show the text between the
        // span elements
        showMoreText.style.display = "inline";

        // Hide the dots after the text
        points.style.display = "none";

        // Change the text on button
        // to 'Show Less'
        buttonText.innerHTML = "Show Less";
    }
}*/;