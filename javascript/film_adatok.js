window.onload = function() {
fetch('http://zarodolgozat.test/backend/json_lekerdezes.php')
.then(x => x.json())
.then(y => megjelenit(y))
}

function megjelenit(adatok){
console.log(adatok);
var i=1;
let card_content="";
for (var elem of adatok){
    card_content+='<div class="card" style="width: 18rem; margin-left: 30px">';
    card_content+='<img src="" class="card-img-top" alt="film_kép">';
    card_content+='<div class="card-body">';
    card_content+='<h5 class="card-title">'+elem.film_cim+'</h5>';
    card_content+='<p class="card-text">'+elem.film_leiras+'</p>';
    card_content+='</div>';
    card_content+='<ul class="list-group list-group-flush">';
    card_content+='<li class="list-group-item">'+"An item"+'</li>';
    card_content+='<li class="list-group-item">'+"A second item"+'</li>';
    card_content+='<li class="list-group-item">'+"A third item"+'</li>';
    card_content+='</ul>';
    card_content+='<div class="card-body">';
    card_content+='<a href="#" class="card-link btn btn-outline-success">'+"Bővebben"+'</a>';
    card_content+='<a href="#" class="card-link btn btn-outline-success">'+"Vélemények"+'</a>';
    card_content+='</div>';
    card_content+='</div>';

    document.getElementById("tablazat").innerHTML=sz;


}


}