window.onload = function() {
fetch('http://zarodolgozat.test/backend/json_lekerdezes.php')
.then(x => x.json())
.then(y => megjelenit(y))
}

function megjelenit(adatok){
console.log(adatok);

let sz="";
for (var elem of adatok) {
    sz += '<a style="all: unset" data-bs-toggle="modal" data-bs-target="#myModal">';
    sz += '<div class="card" onclick="" style="width: 300px;">';
    sz += '<img src="http://zarodolgozat.test/backend/kepek/' + elem.film_kep + '" class="card-img-top" alt="film_kép">';
    sz += '<div class="card-body">';
    sz += '<h5 class="card-title">' + elem.film_cim + '</h5>';
    sz += '<p class="card-text">' + elem.film_leiras + '</p>';
    sz += '</div>';
    sz += '<div class="card-body">';
    sz += '</a>';
    sz += '<button id="film_bovebben' + elem.film_id + '" type="button" onclick="teszt(\''+elem.film_id+'\',\''+elem.film_cim+'\',\''+elem.film_kep+'\',\''+elem.film_leiras+'\')" data-bs-toggle="modal" data-bs-target="#myModal" class="card-link btn btn-outline-success">' + "Bővebben" + '</button>';
    sz += '<ul class="list-group list-group-flush">';
    sz += '<li class="list-group-item">Értékelés: ' + elem.film_ertekeles + ' <a href=""><i class="fas fa-thumbs-up ertekeles_nyil_fel"></i> </a> <a href=""><i class="fas fa-thumbs-down ertekeles_nyil_le"></i></a> </li>';
    sz += '<li class="list-group-item">' + "A second item" + '</li>';
    sz += '<li class="list-group-item">' + "A third item" + '</li>';
    sz += '</ul>';
    sz += '</div>';
    sz += '</div>';


    document.getElementById("tablazat").innerHTML = sz;
}}

teszt=(id,cim,kep,leiras)=>{
    console.log(id);
    document.getElementById("modal-fejlec").innerText=cim;
    let modal_kep='<img class="modal-image" src="http://zarodolgozat.test/backend/kepek/' + kep + '" alt="film_kép">';
    modal_kep+='<p class="modal-leiras">'+leiras+'</p>';
    document.getElementById("modal-torzs").innerHTML=modal_kep;
}

