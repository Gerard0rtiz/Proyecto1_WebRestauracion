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
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $stmt->bind_result($idReview, $nombreUser, $calificacion, $titulo, $texto);

        while ($stmt->fetch()) {
            $review = new Usuario($idReview, $nombreUser, $calificacion, $titulo, $texto);
            $reviews[] = $review;
        }

        $stmt->close();
        $con->close();

        return $reviews;
    }
}
