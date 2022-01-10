window.onload = function() {
fetch('http://zarodolgozat.test/backend/json_lekerdezes.php')
.then(x => x.json())
.then(y => megjelenit(y))
}

function megjelenit(adatok){
console.log(adatok);

let sz="";
for (var elem of adatok) {
    //sz += '<a style="all: unset" data-bs-toggle="modal" data-bs-target="#myModal">';
    sz += '<div class="card" onclick="" style="width: 300px;">';
    sz += '<img src="http://zarodolgozat.test/backend/kepek/' + elem.film_kep + '" class="card-img-top" alt="film_kép">';
    sz += '<div class="card-body">';
    sz += '<h5 class="card-title">' + elem.film_cim + '</h5>';
    sz += '<p class="card-text">' + elem.film_leiras + '</p>';
    sz += '</div>';
    sz += '<div class="card-body">';
    //sz += '</a>';
    sz += '<button id="film_bovebben' + elem.film_id + '" type="button" onclick="modal(\''+elem.film_id+'\',\''+elem.film_cim+'\',\''+elem.film_kep+'\',\''+elem.film_leiras+'\')" data-bs-toggle="modal" data-bs-target="#myModal" name="'+elem.film_id+'" class="card-link btn btn-outline-success">' + "Bővebben" + '</button>';
    sz += '<ul class="list-group list-group-flush">';
    sz += '<li class="list-group-item">Értékelés: ' + elem.film_ertekeles + ' <a href=""><i class="fas fa-thumbs-up ertekeles_nyil_fel"></i> </a> <a href=""><i class="fas fa-thumbs-down ertekeles_nyil_le"></i></a> </li>';
    sz += '<li class="list-group-item">' + "A second item" + '</li>';
    sz += '<li class="list-group-item">' + "A third item" + '</li>';
    sz += '</ul>';
    sz += '</div>';
    sz += '</div>';

    document.getElementById("tablazat").innerHTML = sz;
}}





modal=(id,cim,kep,leiras,)=> {
    document.getElementById("modal-fejlec").innerText = cim;
    let modal_content = '<img class="modal-image" src="http://zarodolgozat.test/backend/kepek/' + kep + '" alt="film_kép">';
    modal_content += '<p class="modal-leiras">' + leiras + '</p>';
    modal_content += '<div id="comments">  </div>';
    document.getElementById("modal-torzs").innerHTML = modal_content;
}
    /*let kommentek = fetch('http://zarodolgozat.test/backend/get_comments.php?id='+id+'',
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json());
    //console.log(kommentek);




function show_comments(id){
    const response = fetch('http://zarodolgozat.test/backend/get_comments.php?id='+id+'',
        {
            method:'GET',
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(x => x.json())
        .then(x => console.log(x));
}


async function postData(url = 'http://zarodolgozat.test/backend/get_comments.php?id='+id+'', data = {}) {
    const response = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json'
        },
        redirect: 'follow',
        referrerPolicy: 'no-referrer',
        body: JSON.stringify(data)
    });
    return response.json();
}

postData('http://zarodolgozat.test/backend/get_comments.php')
    .then(data => {
        console.log(data);
    });



function show_comments(id){

    let sz="";
    for (var elem2 of id){
        sz += id.ertekeles_szoveg;
        document.getElementById("comments").innerHTML = sz;
    }}*/
