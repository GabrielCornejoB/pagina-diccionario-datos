<?php

if (isset($_POST['id_action'])) {
    $id_action = $_POST['id_action'];
    if ($id_action == 1) {        // CREATE    
        if (isset($_POST['term'])) {
            require_once 'connection.php';
            $term = $_POST['term'];

            $query = "INSERT INTO terminos (termino) VALUES ('$term');";
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
        if (isset($_POST['crud_term_id']) && isset($_POST['crud_term_desc'])){
            require_once 'connection.php';
            $term_id = $_POST['crud_term_id'];
            $term_desc = $_POST['crud_term_desc'];

            $query = "UPDATE terminos SET termino='$term_desc' WHERE id_termino=$term_id;";
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

    }
}