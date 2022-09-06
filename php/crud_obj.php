<?php

if (isset($_POST['id_action'])) { 
    $id_action = $_POST['id_action'];
    if ($id_action == 1) {       
        require_once 'connection.php';
        $id_attr = $_POST['crud_obj_idAttr'];
        $obj = $_POST['obj'];
        $query = "INSERT INTO objetivos (objetivo,id_atributo) VALUES ('$obj','$id_attr');";
        mysqli_query($conn, $query);
        header("location: ../objetivos.php");
        exit();
    }
    if ($id_action == 2) {
        require_once 'connection.php';
        $id_obj = $_POST['crud_obj_id'];
        $obj = $_POST['crud_obj_desc'];
        $query = "UPDATE objetivos SET objetivo='$obj' WHERE id_objetivo=$id_obj;";
        mysqli_query($conn, $query);
        header("location: ../objetivos.php");
        exit();
    }
}