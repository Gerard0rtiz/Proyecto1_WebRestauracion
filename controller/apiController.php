<?php
require_once 'model/reviewDAO.php';
require_once 'model/review.php';

class apiController
{

    public function index()
    {
        //Verificar si la clave 'action' está presente en $_POST
        if (isset($_GET['action']) && $_GET['action'] == "buscar_review") {
            $reviews = ReviewDAO::getAllReviews();

            //Transformar array asociativo directamente
            $ReviewArray = [];
            foreach ($reviews as $review) {
                $ReviewArray[] = [
                    'ID' => $review['idReview'],
                    'nombreUsuario' => $review['nombreUser'],
                    'calificacion' => $review['calificacion'],
                    'titulo' => $review['titulo'],
                    'texto' => $review['texto'],
                ];
            }
            echo json_encode($ReviewArray, JSON_UNESCAPED_UNICODE);
            return;
        }
    }

    public function showReviews()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $categorias = categoriaDAO::getAllCat();

        include_once "view/header.php";
        include_once "view/reviews.php";
        include_once "view/footer.php";
    }
}
