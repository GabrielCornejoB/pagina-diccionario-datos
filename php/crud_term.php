<?php

if (isset($_POST['id_action'])) {
    $id_action = $_POST['id_action'];
    if ($id_action == 1) {        // CREATE    
        if (isset($_POST['term'])) {
            require_once 'connection.php';
            $term = $_POST['term'];
            $term_exp = $_POST['term_exp'];

            $query = "INSERT INTO terminos (termino, explicacion_termino) VALUES ('$term','$term_exp');";
            mysqli_query($conn, $query);
            header("location: ../terminos.php");
            exit();
        }
        else {      // Error
            header("location: ../index.php");
            exit();
        }
    }
    elseif ($id_action == 2) {    // UPDATE
        if (isset($_POST['crud_term_id']) && isset($_POST['crud_term_desc']) && isset($_POST['crud_term_exp'])){
            require_once 'connection.php';
            $term_id = $_POST['crud_term_id'];
            $term_desc = $_POST['crud_term_desc'];
            $term_exp = $_POST['crud_term_exp'];

            $query = "UPDATE terminos SET termino='$term_desc', explicacion_termino='$term_exp' WHERE id_termino=$term_id;";
            mysqli_query($conn, $query);
            header("location: ../terminos.php");
            exit();
        }
        else {      // Error
            header("location: ../index.php");
            exit();
        }
    }
    elseif ($id_action == 3) {    // DELETE
        if (isset($_POST['crud_term_id'])) {
            require_once 'connection.php';
            $term_id = $_POST['crud_term_id'];

            $query = "DELETE FROM terminos WHERE id_termino=$term_id;";
            mysqli_query($conn, $query);
            header("location: ../terminos.php");
            exit();
        }
        else {      // Error
            header("location: ../index.php");
            exit();
        }
    }
}