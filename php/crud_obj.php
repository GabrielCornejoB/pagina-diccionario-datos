<?php

if (isset($_POST['id_action'])) { 
    $id_action = $_POST['id_action'];
    if ($id_action == 1) {       
        require_once 'connection.php';
        $id_attr = $_POST['crud_obj_idAttr'];
        $crud_obj_idObj = $_POST['crud_obj_idObj'];
        $query = "INSERT INTO objetivos_relac (id_objetivo,id_atributo) VALUES ('$crud_obj_idObj','$id_attr');";
        mysqli_query($conn, $query);
        header("location: ../objetivos_procesos.php");
        exit();
    }
    elseif ($id_action == 2) {
        require_once 'connection.php';
        $id_obj_relac = $_POST['crud_obj_id'];
        $obj = $_POST['crud_obj_desc'];
        $query = "UPDATE objetivos_relac SET id_objetivo='$obj' WHERE id_objetivo_relac=$id_obj_relac;";
        mysqli_query($conn, $query);
        header("location: ../objetivos_procesos.php");
        exit();
    }
    elseif ($id_action == 3) {
        require_once 'connection.php';
        $obj_id_relac = $_POST['crud_obj_id'];

        $query = "DELETE FROM objetivos_relac WHERE id_objetivo_relac=$obj_id_relac;";
        mysqli_query($conn, $query);
        header("location: ../objetivos_procesos.php");
        exit();
    }
}