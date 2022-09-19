<?php
if (isset($_POST['id_action'])) {
    $id_action = $_POST['id_action'];
    if ($id_action == 1) {
        require_once 'connection.php';
        if(isset($_POST['crud_dang_idAttr']) && isset($_POST['crud_dang']) && isset($_POST['crud_dang_exp'])) {
            $crud_dang_idAttr = $_POST['crud_dang_idAttr'];
            $crud_dang = $_POST['crud_dang'];
            $crud_dang_exp = $_POST['crud_dang_exp'];
        }

        $query = "INSERT INTO riesgos (id_atributo, riesgo, explicacion_riesgo) 
                    VALUES ('$crud_dang_idAttr', '$crud_dang', '$crud_dang_exp');";
        mysqli_query($conn, $query);
        header("location: ../riesgos.php");
        exit();
    }
    elseif ($id_action == 2) {


        $query = "UPDATE";
    }
    elseif ($id_action == 3) {


        $query = "DELETE";
    }
}