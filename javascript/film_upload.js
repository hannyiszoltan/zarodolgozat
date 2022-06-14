function film_cim_kiiratas(){
    var typed = document.getElementById("film_title").value;
    document.getElementById("film_title_card").innerHTML= typed;
}

function init(){
var area = document.getElementById('film_description_card');
if (area.addEventListener) {
    area.addEventListener('input', function() {

    }, false);
} else if (area.attachEvent) {
    area.attachEvent('onpropertychange', function() {
        // IE-specific event handling code
    });
}}

function film_leiras_kiiratas(){
    var typed = document.getElementById("film_description").value;
    document.getElementById("film_description_card").innerHTML=typed;
}

function film_hossz_kiiratas(){
    var typed = document.getElementById("film_length").value;
    document.getElementById("film_length_card").innerHTML=typed+" perc";
}


function preview() {
    previewImg.src=URL.createObjectURL(event.target.files[0]);
}
