window.onload = function() {
    fetch('../backend/get_favorites.php')
        .then(x => x.json())
        .then(y => megjelenit(y))
}

function megjelenit(filmData){

    console.log(filmData);

    let sz="";


    for (var item of filmData) {
            //sz += '<a style="all: unset" data-bs-toggle="modal" data-bs-target="#myModal">';
            sz += '<div class="card" onclick="" style="width: 300px;">';
            sz += '<img src="../backend/kepek/' + item.film_image + '" class="card-img-top" alt="film_kép">';
            sz += '<div class="card-body">';
            sz += '<h5 class="card-title">' + item.film_title + '</h5>';
            sz += '<p class="card-text">' + item.film_description + '</p>';
            sz += '</div>';
            sz += '<div class="card-body">';
            //sz += '</a>';
            sz += '<button id="film_bovebben' + item.film_id + '" type="button" onclick="modal(\'' + item.film_id + '\',\'' + item.film_title + '\',\'' + item.film_image + '\',\'' + item.film_description + '\');show_comments(\'' + item.film_id + '\')" data-bs-toggle="modal" data-bs-target="#filmCard" name="' + item.film_id + '" class="card-link btn btn-outline-success">' + "Bővebben" + '</button>';
            sz += '<ul style="padding-top: 10px !important;" class="list-group list-group-flush">';
            sz += '<li class="list-group-item">Értékelés: ' + item.film_review + ' <div style="display: flex"> </li>';
            sz += '<li class="list-group-item">' + item.film_length + ' perc</li>';
            sz += '<div id="form_container">';
            sz += '<li class="list-group-item"><button id="favorite_button' + item.film_id + '" onclick="favorite_star(\'' + item.film_id + '\')"> <i id="stars' + item.film_id + '" class="fas fa-star"></i> <span>kedvencekhez ad </span> </input> </li>';
            sz += '</div>';
            sz += '</ul>';
            sz += '</div>';
            sz += '</div>';

            document.getElementById("tablazat").innerHTML = sz;

    }}


modal=(id,title,image,description)=> {
    document.getElementById("modal-fejlec").innerText = title;
    let modal_content ='<div id="modal-contents-image" class="img-fluid row">';
    modal_content += '<img class="modal-image img-fluid" src="../backend/kepek/' + image + '" alt="film_kép">';
    modal_content += '<span id="modal-contents-description">' + description + '</span>';
    modal_content += '</div>';
    modal_content += '<form action="../backend/post_comment.php" method="post">';
    modal_content += '<input type="hidden" id="comment_film_id" name="comment_film_id" value='+id+' >';
    modal_content += '<div id="writeComment" >';
    modal_content += '<p style="font-weight: bold;border-top: 1px solid rgba(0,0,0,0);">Megjegyzés írása:</p>';
    modal_content += '<textarea id="comment" name="comment" rows="4" cols="35"> </textarea> <input style="margin-bottom: 30px !important;width: 80px;" type="submit" class="btn btn-outline-success" value="Mentés">';
    modal_content += '</div>';
    modal_content += '</form>';
    modal_content += '<div id="comments"></div>';

    document.getElementById("modal-bodyContent").innerHTML = modal_content;
}


function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
}


function show_comments(id){
    const response = fetch('../backend/get_comments.php?id='+id+'',
        {
            method:'GET',
            headers:{
                'Content-Type':'application/json'
            }
        })
        .then(x => x.json())
        .then(x => comment_onModal(x));
}

function comment_onModal(commentData){
    let comment="";
    let admin=document.getElementById("adminstatus").innerText;
    console.log(commentData);

    for (let item of commentData){
        comment+='<h1>'+item.users_name+'</h1>';
        comment+='<span>'+item.review_content+'</span>';

        if (admin==1){
            comment+='<form action="../backend/delete_comments.php" method="post">'
            comment+='<button type="submit" name="id" value="\''+item.review_id+'\'" onclick="delete_comment(\''+item.review_id+'\')">Komment törlése</button>'; //lehet kell a ++
            comment+='</form>'
        }

    }
    document.getElementById("comments").innerHTML=comment;
}

function favorite_star(star_id){
    let stars="stars"
    let element = document.getElementById(stars+star_id)
    //alert(element);

    if(element.className=='far fa-star'){
        element.className='fas fa-star';
        favorite_up(star_id);

    }else{
        element.className='far fa-star';
        favorite_down(star_id);
    }
}


function favorite_up (id) {
    var theForm, newInput;
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = '../backend/post_favorite.php';
    theForm.method = 'post';
    // Next create the <input>s in the form and give them names and values
    newInput = document.createElement('input');
    newInput.type = 'hidden';
    newInput.name = 'favorite_film_id';
    newInput.value = id;
    // Now put everything together...
    theForm.appendChild(newInput);
    // ...and it to the DOM...
    document.getElementById('form_container').appendChild(theForm);
    // ...and submit it
    theForm.submit();
}


function favorite_down(id){
    var theForm, newInput;
    // Start by creating a <form>
    theForm = document.createElement('form');
    theForm.action = '../backend/delete_favorite.php';
    theForm.method = 'post';
    // Next create the <input>s in the form and give them names and values
    newInput = document.createElement('input');
    newInput.type = 'hidden';
    newInput.name = 'favorite_film_id';
    newInput.value = id;
    // Now put everything together...
    theForm.appendChild(newInput);
    // ...and it to the DOM...
    document.getElementById('form_container').appendChild(theForm);
    // ...and submit it
    theForm.submit();
}



/*
    let kommentek = fetch('../backend/get_comments.php?id='+id+'',
        {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json());
    //console.log(kommentek);
*/