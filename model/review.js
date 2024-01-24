//Recogida de array asociativo de reviews completas en variable
let arrayReviews = fetch('http://localhost/index.php?controller=api&action=buscar_review')
.then( data => data.json())
.then( arrayReviews => console.log(arrayReviews));

