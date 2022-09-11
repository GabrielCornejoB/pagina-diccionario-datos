<?php

if (isset($_POST['id_action'])) {
    $id_action = $_POST['id_action'];
    if ($id_action == 1) {
        require_once 'connection.php';
        $id_attr = $_POST['crud_proc_idAttr'];
        $proc = $_POST['proc']; 

        $query = "INSERT INTO procesos (proceso, id_atributo) VALUES ('$proc', '$id_attr');";
        mysqli_query($conn, $query);
        header("location: ../procesos.php");
        exit();
    }
}