window.onload = function() {
fetch('../backend/get_film_data.php')
.then(x => x.json())
.then(y => megjelenit(y))
}

function megjelenit(adatok){
console.log(adatok);

let sz="";
for (var elem of adatok) {
    //sz += '<a style="all: unset" data-bs-toggle="modal" data-bs-target="#myModal">';
    sz += '<div class="card" onclick="" style="width: 300px;">';
    sz += '<img src="../backend/kepek/' + elem.film_image + '" class="card-img-top" alt="film_kép">';
    sz += '<div class="card-body">';
    sz += '<h5 class="card-title">' + elem.film_title + '</h5>';
    sz += '<p class="card-text">' + elem.film_description + '</p>';
    sz += '</div>';
    sz += '<div class="card-body">';
    //sz += '</a>';
    sz += '<button id="film_bovebben' + elem.film_id + '" type="button" onclick="modal(\''+elem.film_id+'\',\''+elem.film_title+'\',\''+elem.film_image+'\',\''+elem.film_description+'\')" data-bs-toggle="modal" data-bs-target="#filmCard" name="'+elem.film_id+'" class="card-link btn btn-outline-success">' + "Bővebben" + '</button>';
    sz += '<ul class="list-group list-group-flush">';
    sz += '<li class="list-group-item">Értékelés: ' + elem.film_review + ' <div style="display: flex"> </li>';
    sz += '<li class="list-group-item">' + elem.film_length + ' perc</li>';
    sz += '<li class="list-group-item"><button onclick="favorite_star(\''+elem.film_id+'\')"> <i id="stars'+elem.film_id+'"  class="far fa-star"> </i> <span>kedvencekhez ad </span> </button> </li>';
    sz += '</ul>';
    sz += '</div>';
    sz += '</div>';

    document.getElementById("tablazat").innerHTML = sz;
}}




modal=(id,title,image,description)=> {
    document.getElementById("modal-fejlec").innerText = title;
    let modal_content = '<img class="modal-image" src="../backend/kepek/' + image + '" alt="film_kép">';
    modal_content += '<p class="modal-leiras">' + description + '</p>';
    modal_content += '<div id="comments">  </div>';
    document.getElementById("modal-torzs").innerHTML = modal_content;
}



function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}

function favorite_star(star_id){
    let stars="stars"
    let element = document.getElementById(stars+star_id)
    //alert(element);

    if(element.className=='far fa-star'){
        element.className='fas fa-star';
    }else{
        element.className='far fa-star';
    }




}


    /*let kommentek = fetch('../backend/get_comments.php?id='+id+'',
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json());
    //console.log(kommentek);




function show_comments(id){
    const response = fetch('../backend/get_comments.php?id='+id+'',
        {
            method:'GET',
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(x => x.json())
        .then(x => console.log(x));
}


async function postData(url = '../backend/get_comments.php?id='+id+'', data = {}) {
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

postData('../backend/get_comments.php')
    .then(data => {
        console.log(data);
    });



function show_comments(id){

    let sz="";
    for (var elem2 of id){
        sz += id.ertekeles_szoveg;
        document.getElementById("comments").innerHTML = sz;
    }}*/
