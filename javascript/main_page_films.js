window.onload = function() {

    fetch('routes.php?action=AllFilmData')
        .then(function(response) {
            return response.json()
        })
        .then(function(filmData) {

            //console.log(review)
            //console.log(filmData);
            var clean = filmData.filter((filmData, index, self) =>
                index === self.findIndex((t) => (t.save === filmData.save && t.film_title === filmData.film_title)));

            //console.log(clean);
            let sz="";
            let user_id=document.getElementById("userstatus").innerText;
            for (var item of clean) {
                //if (item.favorite_film_id!=item.film_id) {
                //sz += '<a style="all: unset" data-bs-toggle="modal" data-bs-target="#myModal">';
                sz += '<div class="card" onclick="" style="width: 300px;">';
                sz += '<img src="backend/kepek/' + item.film_image + '" class="card-img-top" alt="film_kép">';
                sz += '<div class="card-body">';
                sz += '<h5 class="card-title">' + item.film_title + '</h5>';
                sz += '<p class="card-text">' + item.film_description + '</p>';
                sz += '</div>';
                sz += '<div class="card-body">';
                //sz += '</a>';
                sz += '<button id="film_bovebben' + item.film_id + '" type="button" onclick="modal(\'' + item.film_id + '\',\'' + item.film_title + '\',\'' + item.film_image + '\',\'' + item.film_description + '\');show_comments(\'' + item.film_id + '\')" data-bs-toggle="modal" data-bs-target="#filmCard" name="' + item.film_id + '" class="card-link btn btn-outline-success">' + "Bővebben" + '</button>';
                sz += '<ul style="padding-top: 10px !important;" class="list-group list-group-flush">';
                sz += '<li class="list-group-item">Értékelés: <div id="review_'+item.film_id+'"></div><div style="display: flex"> </li>';
                sz += ' <input name="review_value" type="hidden" id="review_value_'+item.film_id+'" />'
                sz += '<li class="list-group-item">' + item.film_length + ' perc</li>';
                sz += '<div id="form_container">';
                if (item.favorite_user_id!=user_id) {
                    sz += '<li class="list-group-item"><button class="btn btn-outline-success" id="favorite_button' + item.film_id + '" onclick="favorite_star(\'' + item.film_id + '\')"> <i id="stars' + item.film_id + '" class="far fa-star"></i> <span>kedvencekhez ad </span> </input> </li>';
                }
                else{
                    sz += '<li class="list-group-item"><button class="btn btn-outline-success" id="favorite_button' + item.film_id + '" onclick="favorite_star(\'' + item.film_id + '\')"> <i id="stars' + item.film_id + '" class="fas fa-star"></i> <span>kedvencekből elvesz </span> </input> </li>';

                }
                sz += '</div>';
                sz += '</ul>';
                sz += '</div>';
                sz += '</div>';

                document.getElementById("tablazat").innerHTML = sz;

            }

            // do stuff with `data`, call second `fetch`
            return fetch('routes.php?action=GetReview')
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(review) {

            //console.log(review);
            let review_data="";
            for (var item of review){
                review_data=item.review_value;
                document.getElementById("review_"+item.review_film_id).innerText=review_data;
                document.getElementById("review_value_"+item.review_film_id).value=review_data;
            }


        })
        .catch(function(error) {
            console.log('Requestfailed', error)
        });
}


modal=(id,title,image,description)=> {
    let modal_review_current_value = document.getElementById("review_value_"+id).value;
    let modal_review_current = "modal_review_"+id;

    document.getElementById("modal-fejlec").innerText = title;
    let modal_content ='<div id="modal-contents-image" class="img-fluid row">';
    modal_content += '<img class="modal-image img-fluid" src="backend/kepek/' + image + '" alt="film_kép">';
    modal_content += '<span id="modal-contents-description">' + description + '</span>';
    modal_content += '</div>';
    modal_content += '<form method="POST">';
    modal_content += '<input type="hidden" id="comment_film_id" name="commentFilmId" value='+id+' >';
    modal_content += '<div id="writeComment" >';
    modal_content += '<p style="font-weight: bold;margin-top: 1rem; border-top: 1px solid rgba(0,0,0,0);">Értékelés írása:</p>';
    modal_content += '<div><input name="reviewValue" type="number" placeholder="Értékeld a filmet" max="10" min="1"> /10 (egész számot adj meg!)';
    modal_content += '<p>Össz értékelés alapján: <span id="modal_review_'+id+'"></span> </p> </div>';
    modal_content += '<textarea id="comment" name="commentContent" rows="4" cols="35"> </textarea> <input name="commentUp" style="margin-bottom: 30px !important;width: 10ch;" type="submit" class="btn btn-outline-success" value="Mentés">';
    modal_content += '</div>';
    modal_content += '</form>';

    document.getElementById("modal-bodyContent").innerHTML = modal_content;
    document.getElementById(modal_review_current).innerText = modal_review_current_value;

}


function show_comments(id){
    fetch('routes.php?action=AllComments&id='+id+'')
        .then(x => x.json())
        .then(y => comment_onModal(y));
}

function comment_onModal(commentData){
    let comment="";
    let admin=document.getElementById("adminstatus").innerText;
    
    console.log(commentData);
    if (commentData==0){
        comment+="Írj véleményt a filmről!";
    }
    else {
        for (let item of commentData) {
            comment +='<div id="modal-comments">';
            comment += '<h1>' + item.users_name + '</h1>';
            comment += '<span>' + item.review_content + '</span>';
            comment +='<hr>';
            comment +='</div>';

            if (admin == 1) {
                comment += '<form method="POST">';
                comment += '<input type="hidden" name="review_id" value='+item.review_id+'>';
                comment += '<button class="btn btn-outline-warning" type="submit" name="deleteCommentForm">Komment törlése</button>';
                comment += '</form>';
            }
        }
    }document.getElementById("comments").innerHTML = comment;}

function favorite_star(film_id){
    let stars="stars"
    let element = document.getElementById(stars+film_id)

    if(element.className=='far fa-star'){
        element.className='fas fa-star';
        favorite_up(film_id);

    }else{
        element.className='far fa-star';
        favorite_down(film_id);
    }
}

function favorite_up (filmid) {
    var theForm, newInput;
    theForm = document.createElement('form');
    theForm.action = 'routes.php?action=AddFavorite&filmid='+filmid+'';
    theForm.method = 'post';
    newInput = document.createElement('input');
    newInput.type = 'hidden';
    newInput.name = 'favorite_film_id';
    theForm.appendChild(newInput);
    document.getElementById('form_container').appendChild(theForm);
    theForm.submit();
}

function favorite_down(filmid){
    var theForm, newInput;
    theForm = document.createElement('form');
    theForm.action = 'routes.php?action=RemoveFavorite&filmid='+filmid+'';
    theForm.method = 'post';
    newInput = document.createElement('input');
    newInput.type = 'hidden';
    newInput.name = 'favorite_film_id';
    theForm.appendChild(newInput);
    document.getElementById('form_container').appendChild(theForm);
    theForm.submit();
}
