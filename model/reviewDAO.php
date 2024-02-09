<?php
require_once('config/database.php');
require_once('model/usuario.php');
class ReviewDAO
{
    public static function getAllReviews()
    {
        $con = database::connect();
        $reviews = [];

        $sql = "SELECT * FROM reviews";
        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $idReview = $row['IDreview'];
            $nombreUser = $row['nombreDeUsuario'];
            $calificacion = $row['calificacion'];
            $titulo = $row['titulo'];
            $texto = $row['texto'];

            $reviewData = array(
                'idReview' => $idReview,
                'nombreUser' => $nombreUser,
                'calificacion' => $calificacion,
                'titulo' => $titulo,
                'texto' => $texto
            );

            //Agregar el array asociativo a la lista de reviews
            $reviews[] = $reviewData;
        }

        $result->close();
        $con->close();

        return $reviews;
    }

    /*public static function getReviewById($idReview)
    {
        $con = database::connect();

        $stmt = $con->prepare("SELECT * FROM reviews WHERE IDreview=?");
        $stmt->bind_param("s", $idReview);
        $stmt->execute();
        $stmt->bind_result($idReview, $nombreUser, $calificacion, $titulo, $texto);
        $stmt->fetch();
        $review = new Review($idReview, $nombreUser, $calificacion, $titulo, $texto);

        $stmt->close();
        $con->close();
        return $review;
    }*/

    /*public static function getReviewByCalificacion($calificacion)
    {
        $con = database::connect();
        $reviews = [];

        $sql = "SELECT * FROM reviews WHERE calificacion=?";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $calificacion);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_array()) {
            $idReview = $row['IDreview'];
            $nombreUser = $row['nombreDeUsuario'];
            $calificacion = $row['calificacion'];
            $titulo = $row['titulo'];
            $texto = $row['texto'];

            $reviewData = array(
                'idReview' => $idReview,
                'nombreUser' => $nombreUser,
                'calificacion' => $calificacion,
                'titulo' => $titulo,
                'texto' => $texto
            );

            //Añadimos array asociativo a la lista de reviews
            $reviews[] = $reviewData;
        }

        $stmt->close();
        $con->close();
        return $reviews;
    }*/

    public function addReviewBBDD(){
        $con = database::connect();

        $stmt = $con->prepare("INSERT INTO reviews VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $idReview, $nombreUser, $calificacion, $titulo, $texto);
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        return $result;
    }
}
