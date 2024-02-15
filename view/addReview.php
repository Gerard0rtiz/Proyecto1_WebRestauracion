<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<div class="qr-insert-section">
    <section class="section-review">
        <form class="review-carrito">
            <h2 class="title-review-2">Deje aqui su reseña:</h2>
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
    <div class="qr-div">
        <p>Leyendo el siguiente QR, podrá acceder a información adicional de su pedido:</p>
        <img id="qrImage" alt="qr-pedido-user"/>
    </div>
</div>
<script src="model\insertReview.js"></script>
<script src="https://unpkg.com/notie"></script>
<script src="model\notiejsPopups.js"></script>