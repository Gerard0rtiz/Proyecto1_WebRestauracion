<div class="global-frame">
    <div class="superbloque-reviews">
        <div class="bloque-reviews">
            <div>
                <select class="filtro-reviews">
                    <option selected value="1">Ascendente</option>
                    <option value="0">Descendente</option>
                </select>
            </div>
            <div id="reviewsSection" class="reviewsSection">
                <!--<div id="review" class="review">
                    <h1 id="title-review" class="title-review"></h1>
                    <p id="puntos-review" class="puntos-review">/5 estrellas</p>
                    <p id="text-review" class="text-review"></p>
                </div>-->

            </div>
        </div>
        <aside class="lateral-sb">
            <div class="cat-dest-prods">
                <h3>CATEGORIAS</h3>
                <?php
                foreach ($categorias as $categoria) :
                    echo "<p>" . $categoria->nombreCategoria . "</p>";
                endforeach;
                ?>
                <h3 class="destacadosProd">DESTACADO</h3>
                <div>
                    <ul class="ul-destacados">
                        <li class="li-destacados">
                            <div class="textImg-destacados">
                                <p class="txt-dest">Cerveza de barril 1L</p>
                                <img src="/assets/images/cerveza.png" alt="cerveza">
                            </div>
                            <p>4.99€</p>
                        </li>
                        <li class="li-destacados">
                            <div class="textImg-destacados">
                                <p class="txt-dest">Pizza con tomate frito y mozarella</p>
                                <img src="/assets/images/pizza.png" alt="pizza">
                            </div>
                            <p>8.99€</p>
                        </li>
                        <li class="li-destacados">
                            <div class="textImg-destacados">
                                <p class="txt-dest">Calamares rebozados con rodajas de limón</p>
                                <img src="/assets/images/calamares.png" alt="calamares">
                            </div>
                            <p>5.99€</p>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
    </div>
</div>
<script src="/model/review.js"></script>