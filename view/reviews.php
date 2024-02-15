<div class="global-frame">
    <div class="superbloque-reviews">
        <div class="bloque-reviews">
            <div class="bloque-filtros">
                <button id="orden-ascendente">Ascendente</button>
                <button id="orden-descendente">Descendente</button>
                <form action="">
                    <select id="selectorCalificacion" class="selector-calificacion">
                        <option selected value="6">Todas las valoraciones</option>
                        <option value="0">0/5</option>
                        <option value="1">1/5</option>
                        <option value="2">2/5</option>
                        <option value="3">3/5</option>
                        <option value="4">4/5</option>
                        <option value="5">5/5</option>
                    </select>
                </form>
            </div>
            <div id="reviewsSection" class="reviewsSection">
                <!--reviews mostradas por JS-->
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