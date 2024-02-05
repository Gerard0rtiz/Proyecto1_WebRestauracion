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
            // Obtener el JSON enviado desde el cliente
            $data = json_decode(file_get_contents('php://input'), true);
        
            // Obtener la cantidad de puntos canjeados
            $puntosCanjeados = $data['puntosCanjeados'];

            //Obtener puntos actuales
            $puntosTotales = UsuarioDAO::getPuntosByUser($puntosUser);

            //Cálculo nuevo saldo de puntos
            $puntosNuevos = $puntosTotales - $puntosCanjeados;
        
            // Realizar la actualización de puntos en la base de datos
            $updatePuntos = UsuarioDAO::updatePuntos($puntosUser, $puntosNuevos);

            echo json_encode($updatePuntos, JSON_UNESCAPED_UNICODE);
            return;
        }

        //Actualizar puntos cuando se finalice la compra con los puntos obtenidos
        if (isset($_GET['action']) && $_GET['action'] == 'actualizar_saldo_puntos') {
            // Obtener el JSON enviado desde el cliente
            $data = json_decode(file_get_contents('php://input'), true);
    
            // Obtener el nombre de usuario y los puntos ganados
            $nombreUsuario = $puntosUser;
            $puntosGanados = $data['puntosGanados'];
            
            //Obtener puntos actuales
            $puntosTotales = UsuarioDAO::getPuntosByUser($puntosUser);

            //Cálculo nuevo saldo de puntos
            $puntosNuevos = $puntosTotales + $puntosGanados;
    
            //Llamar al método en UsuarioDAO para actualizar el saldo de puntos
            UsuarioDAO::actualizarSaldoPuntos($nombreUsuario, $puntosNuevos);
    
            echo json_encode(['status' => 'success'], JSON_UNESCAPED_UNICODE);
            return;
        }


        //Obtener puntos del usuario que está activo
        if (isset($_GET['action']) && $_GET['action'] == "obtener_puntos") {
            $puntos = UsuarioDAO::getPuntosByUser($puntosUser);
            echo json_encode($puntos, JSON_UNESCAPED_UNICODE);
            return;
        }

        //Filtrar reseñas por la puntuación introducida dentro del input
        /*if (isset($_GET['action']) && $_GET['action'] == "filtrar_review") {
            $reviews = ReviewDAO::getReviewByCalificacion();

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
        }*/
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
