//MOSTRAR REVIEWS
let resultado;
//Recogida de array asociativo de reviews completas en variable
let arrayReviews = fetch('/index.php?controller=api&action=buscar_review')
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
document.addEventListener('DOMContentLoaded', () => {
  mostrarReseñas(resultado);
});

document.getElementById('selectorCalificacion').addEventListener('change', filtrarReseñas);
document.getElementById('orden-ascendente').addEventListener('click', ordenarReseñasAscendente);
document.getElementById('orden-descendente').addEventListener('click', ordenarReseñasDescendente);

function filtrarReseñas() {
  const filtroValoracion = parseInt(document.getElementById('selectorCalificacion').value);

  const reseñasFiltradas = resultado.filter(reseña => {
    return filtroValoracion === 6 || parseInt(reseña.calificacion) === filtroValoracion;
  });

  if (reseñasFiltradas.length === 0) {
    // No hay reseñas disponibles
    mostrarReseñas(reseñasFiltradas);
    notie.alert({
      type: 2,
      text: 'No hay reseñas disponibles',
      position: 'top'
    });
  } else {
    // Mostrar las reseñas filtradas
    notie.alert({
      type: 1,
      text: 'Hay reseñas disponibles',
      position: 'top'
    });
    mostrarReseñas(reseñasFiltradas);
  }
}

function ordenarReseñasAscendente() {
  resultado.sort((a, b) => a.calificacion - b.calificacion);
  mostrarReseñas(resultado);
}

function ordenarReseñasDescendente() {
  resultado.sort((a, b) => b.calificacion - a.calificacion);
  mostrarReseñas(resultado);
}
function mostrarReseñas(reseñas) {
  const container = document.getElementById('reviewsSection');
  container.innerHTML = "";

  reseñas.forEach(review => {
      const reviewDiv = document.createElement('div');
      reviewDiv.classList.add('review');

      reviewDiv.innerHTML = `
          <h1 class="title-review">${review.titulo}</h1>
          <p class="puntos-review">${review.calificacion}/5 estrellas</p>
          <p class="text-review">${review.texto}</p>
      `;

      container.appendChild(reviewDiv);
  });
}