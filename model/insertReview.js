function sendReview() {
    let pedidoId = encodeURIComponent(document.getElementById('pedidoID').value);
    let username = encodeURIComponent(document.getElementById('nombreDeUsuario').value);
    let titulo = encodeURIComponent(document.getElementById('tituloReview').value);
    let puntos = encodeURIComponent(document.getElementById('puntosReview').value);
    let texto = encodeURIComponent(document.getElementById('textoReview').value);
    let apiUrl = `http://localhost/index.php?controller=api&action=add_review&pedidoId=${pedidoId}&username=${username}&titulo=${titulo}&puntos=${puntos}&texto=${texto}`;

    fetch(apiUrl, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    })
        .then(respuesta => window.location.href = "index.php?controller=api&action=showReviews")
        .catch(error => {
            console.error('Error:', error);
        });
}