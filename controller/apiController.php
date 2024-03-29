<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'model/reviewDAO.php';
require_once 'model/categoriaDAO.php';
require_once 'model/usuarioDAO.php';
require_once 'model/review.php';

class apiController
{
    //API pero por como está montado mi código, me veo forzado a nombrarlo "index"
    public function index()
    {
        $puntosUser = $_SESSION['activeUser'];

        //Mostrar reseñas al entrar a la página de "Reseñas"
        //Verificar si la clave 'action' está presente en $_GET
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

        //Actualizar puntos cada vez que se canjean
        if (isset($_GET['action']) && $_GET['action'] == 'actualizar_puntos') {
            //Obtener el JSON enviado desde el cliente
            $json_data = file_get_contents('php://input');
            $data = json_decode($json_data, true);

            // Verificar si la decodificación del JSON fue exitosa
            if ($data === null) {
                echo json_encode(['status' => 'error', 'message' => 'Error al decodificar JSON']);
                exit;
            }

            $puntosCanjeados = $data['puntosCanjeados'];
            $puntosTotales = UsuarioDAO::getPuntosByUser($puntosUser);
            $puntosNuevos = $puntosTotales - $puntosCanjeados;
            $updatePuntos = UsuarioDAO::updatePuntos($puntosUser, $puntosNuevos);

            echo json_encode($updatePuntos, JSON_UNESCAPED_UNICODE);
            return;
        }

        //Obtener puntos del usuario que está activo
        if (isset($_GET['action']) && $_GET['action'] == "obtener_puntos") {
            $puntos = UsuarioDAO::getPuntosByUser($puntosUser);
            echo json_encode($puntos, JSON_UNESCAPED_UNICODE);
            return;
        }

        if (isset($_GET['action']) && $_GET['action'] == "add_review"){
            $pedidoId = isset($_GET['pedidoId']) ? $_GET['pedidoId'] : null;
            $username = isset($_GET['username']) ? $_GET['username'] : null;
            $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : null;
            $calificacion = isset($_GET['puntos']) ? $_GET['puntos'] : null;
            $texto = isset($_GET['texto']) ? $_GET['texto'] : null;
        
            if ($pedidoId !== null && $username !== null && $titulo !== null && $calificacion !== null && $texto !== null) {
                $newReview = ReviewDAO::addReviewBBDD($pedidoId, $username, $calificacion, $titulo, $texto);
                echo json_encode($newReview, JSON_UNESCAPED_UNICODE);
                return;
            } else {
                echo json_encode(['error' => 'Faltan parámetros en la solicitud.'], JSON_UNESCAPED_UNICODE);
                return;
            }
        }
    }

    public function showReviews()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        //Verificar si se recibieron datos válidos en la solicitud POST
        $encodedReviews = file_get_contents("php://input");
        $decodedReviews = json_decode($encodedReviews, true);

        if (!is_array($decodedReviews)) {
            //Si los datos no son un array, asignar un array vacío para evitar el error
            $decodedReviews = [];
        }

        $categorias = categoriaDAO::getAllCat();

        include_once "view/header.php";
        include_once "view/reviews.php";
        include_once "view/footer.php";
    }
}
