window.onload = function() {
fetch('http://zarodolgozat.test/backend/get_film_data.php')
.then(x => x.json())
.then(y => megjelenit(y))
}

function megjelenit(adatok){
console.log(adatok);

let sz="";
for (var elem of adatok) {
    //sz += '<a style="all: unset" data-bs-toggle="modal" data-bs-target="#myModal">';
    sz += '<div class="card" onclick="" style="width: 300px;">';
    sz += '<img src="http://zarodolgozat.test/backend/kepek/' + elem.film_image + '" class="card-img-top" alt="film_kép">';
    sz += '<div class="card-body">';
    sz += '<h5 class="card-title">' + elem.film_title + '</h5>';
    sz += '<p class="card-text">' + elem.film_description + '</p>';
    sz += '</div>';
    sz += '<div class="card-body">';
    //sz += '</a>';
    sz += '<button id="film_bovebben' + elem.film_id + '" type="button" onclick="modal(\''+elem.film_id+'\',\''+elem.film_title+'\',\''+elem.film_image+'\',\''+elem.film_description+'\')" data-bs-toggle="modal" data-bs-target="#filmCard" name="'+elem.film_id+'" class="card-link btn btn-outline-success">' + "Bővebben" + '</button>';
    sz += '<ul class="list-group list-group-flush">';
    sz += '<li class="list-group-item">Értékelés: ' + elem.film_review + ' <div style="display: flex">     <div class="rating" > <i class="far fa-star-half"></i><i class="far fa-star-half fa-flip-horizontal"></i></div>\n    <div class="rating" > <i class="far fa-star-half"></i><i class="far fa-star-half fa-flip-horizontal"></i></div>\n    <div class="rating" > <i class="far fa-star-half"></i><i class="far fa-star-half fa-flip-horizontal"></i></div>\n    <div class="rating" > <i class="far fa-star-half"></i><i class="far fa-star-half fa-flip-horizontal"></i></div>\n    <div class="rating" > <i class="far fa-star-half"></i><i class="far fa-star-half fa-flip-horizontal"></i></div>\n </div> </li>';
    sz += '<li class="list-group-item">' + elem.film_length + ' perc</li>';
    sz += '<li class="list-group-item">' + "A third item" + '</li>';
    sz += '</ul>';
    sz += '</div>';
    sz += '</div>';

    document.getElementById("tablazat").innerHTML = sz;
}}




modal=(id,title,image,description)=> {
    document.getElementById("modal-fejlec").innerText = title;
    let modal_content = '<img class="modal-image" src="http://zarodolgozat.test/backend/kepek/' + image + '" alt="film_kép">';
    modal_content += '<p class="modal-leiras">' + description + '</p>';
    modal_content += '<div id="comments">  </div>';
    document.getElementById("modal-torzs").innerHTML = modal_content;
}



function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
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
