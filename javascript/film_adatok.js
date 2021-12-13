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
    sz+='<div class="card" style="width: 18rem; margin-left: 30px">';
    sz+='<img src="" class="card-img-top" alt="film_kép">';
    sz+='<div class="card-body">';
    sz+='<h5 class="card-title">'+elem.film_cim+'</h5>';
    sz+='<p class="card-text">'+elem.film_leiras+'</p>';
    sz+='</div>';
    sz+='<ul class="list-group list-group-flush">';
    sz+='<li class="list-group-item">'+"An item"+'</li>';
    sz+='<li class="list-group-item">'+"A second item"+'</li>';
    sz+='<li class="list-group-item">'+"A third item"+'</li>';
    sz+='</ul>';
    sz+='<div class="card-body">';
    sz+='<a href="#" class="card-link btn btn-outline-success">'+"Bővebben"+'</a>';
    sz+='<a href="#" class="card-link btn btn-outline-success">'+"Vélemények"+'</a>';
    sz+='</div>';
    sz+='</div>';




}
    document.getElementById("tablazat").innerHTML=sz;

}