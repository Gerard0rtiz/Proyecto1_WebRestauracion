//MOSTRAR REVIEWS
let resultado;
//Recogida de array asociativo de reviews completas en variable
let arrayReviews = fetch('http://localhost/index.php?controller=api&action=buscar_review')
.then( data => data.json())
//Guardar arrayreviews en una variable para poder trabajar con ella resultado=arrayreviews
.then(arrayReviews => {
    //Guardar arrayReviews en la variable resultado
    resultado = arrayReviews;
  
    //Obtener elemento HTML donde se mostrarán las reseñas
    const container = document.getElementById('reviewsSection');
  
    //Crear divs con reseñas y agregarlos al contenedor
    resultado.forEach(review => {
      const reviewDiv = document.createElement('div');
      reviewDiv.classList.add('review');
  
      reviewDiv.innerHTML = `
        <h1 class="title-review">${review.titulo}</h1>
        <p class="puntos-review">${review.calificacion}/5 estrellas</p>
        <p class="text-review">${review.texto}</p>
      `;
  
      container.appendChild(reviewDiv);
    });
  })
  .catch(error => console.error('Error fetching data:', error));

/*-------------------------------------------------------------*/

//FILTRAR REVIEWS
