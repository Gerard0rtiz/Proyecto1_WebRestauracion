<div class="global-frame">
    <div class="superbloque-reviews">
        <div class="bloque-reviews">
            <div>
                <select class="filtro-reviews">
                    <option selected value="1">Ascendente</option>
                    <option value="0">Descendente</option>
                </select>
            </div>
            <div class="reviewsSection">
                <div class="review">
                    <h1 class="title-review">Precios asequibles</h1>
                    <p class="puntos-review">4/5 estrellas</p>
                    <p class="text-review">
                        Después de comprar una pizza y una bebida, he visto que los precios son bastante asequibles y
                        no son muy exagerados. Además de que estaba bastante bueno lo que compramos.
                    </p>
                </div>
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