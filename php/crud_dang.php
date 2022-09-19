<?php
if (isset($_POST['id_action'])) {
    $id_action = $_POST['id_action'];
    if ($id_action == 1) {
        if(isset($_POST['crud_dang_idAttr']) && isset($_POST['crud_dang']) && isset($_POST['crud_dang_exp'])) {
            require_once 'connection.php';
            $crud_dang_idAttr = $_POST['crud_dang_idAttr'];
            $crud_dang = $_POST['crud_dang'];
            $crud_dang_exp = $_POST['crud_dang_exp'];
            $query = "INSERT INTO riesgos (id_atributo, riesgo, explicacion_riesgo) 
                    VALUES ('$crud_dang_idAttr', '$crud_dang', '$crud_dang_exp');";
            mysqli_query($conn, $query);
            header("location: ../riesgos.php");
            exit();
        }  
    }
    elseif ($id_action == 2) {
        if(isset($_POST['crud_dang_id']) && isset($_POST['crud_dang']) && isset($_POST['crud_dang_exp'])) {
            require_once 'connection.php';
            $crud_dang_id = $_POST['crud_dang_id'];
            $crud_dang = $_POST['crud_dang'];
            $crud_dang_exp = $_POST['crud_dang_exp'];
            $query = "UPDATE riesgos SET riesgo='$crud_dang', explicacion_riesgo='$crud_dang_exp' WHERE id_riesgo=$crud_dang_id;";
            mysqli_query($conn, $query);
            header("location: ../riesgos.php");
            exit();
        }
    }
    elseif ($id_action == 3) {
        if(isset($_POST['crud_dang_id'])) {
            require_once 'connection.php';
            $crud_dang_id = $_POST['crud_dang_id'];
            $query = "DELETE FROM riesgos WHERE id_riesgo=$crud_dang_id;";
            mysqli_query($conn, $query);
            header("location: ../riesgos.php");
            exit();
        }
    }
}