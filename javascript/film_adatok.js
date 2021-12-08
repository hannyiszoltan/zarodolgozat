window.onload = function() {
fetch('http://zarodolgozat.test/backend/json_lekerdezes.php')
.then(x => x.json())
.then(y => megjelenit(y))
}

function megjelenit(adatok){
console.log(adatok);
var i=1;
for (var elem of adatok){



}


}