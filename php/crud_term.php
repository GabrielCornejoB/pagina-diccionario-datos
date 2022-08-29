<?php

if (isset($_POST['id_type'])) {
    $id_type = $_POST['id_type'];
    if ($id_type == 1) {        // CREATE
        require_once 'connection.php';
        if (isset($_POST['term'])) {
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
    elseif ($id_type == 2) {    // UPDATE

    }
    elseif ($id_type == 3) {    // DELETE

    }
}