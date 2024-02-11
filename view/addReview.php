<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<section class="section-review">
    <form class="review-carrito">
        <h1 style="font-size: 30px">¡Pedido realizado correctamente!</h1>
        <h2 class="title-review">Deje aqui su reseña:</h2>
        <input id="pedidoID" name="idPedido" type="hidden" value="<?= $_GET['pedido'] ?>" readonly><br>
        <input id="nombreDeUsuario" name="nombreDeUsuario" type="hidden" value="<?= $_GET['user'] ?>" readonly><br>
        Título de reseña: <input id="tituloReview" name="titleReview" type="text"><br>
        Puntuación: <input id="puntosReview" name="puntosReview" type="number" placeholder="valor entre 0 y 5" min="0" max="5"><br>
        <div id="div-text-reseña"> 
            <p>Texto de reseña: </p>
            <textarea id="textoReview" name="textReview" type="text"></textarea><br>
        </div>
        <button onclick="sendReview()" class="btn-sendReview" id="btn-sendReview">Enviar reseña</button>
    </form>
</section>
<script src="model\insertReview.js"></script>