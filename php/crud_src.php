<?php

if (isset($_POST['id_action'])) {
    $id_action = $_POST['id_action'];
    if ($id_action == 1){
        require_once 'connection.php';
        $src_idAttr = $_POST['crud_src_idAttr'];
        $src_name = $_POST['crud_src_name'];
        $src_typeA = $_POST['crud_src_type'];
        $src_attrName = $_POST['crud_src_attr'];
        $src_qual = $_POST['crud_src_qual'];
        $src_secu = $_POST['crud_src_secu'];
        $src_gen = $_POST['crud_src_gen'];
        $src_list = $_POST['crud_src_list'];
        $src_obl = $_POST['crud_src_obl'];
        $src_attrType = $_POST['crud_src_attrType'];
        $src_attrLen = $_POST['crud_src_attrLen'];
        $src_attrCalc = $_POST['crud_src_attrCalc'];

        $query = "INSERT INTO fuentes (id_atributo, sistema_maestro, tipo_almacenamiento, nombre_atributo, politica_calidad, politica_seguridad, forma_generacion, lista_de_valor, obligatoriedad, tipo_dato, longitud, formula_campo_calculado)
                    VALUES ('$src_idAttr', '$src_name', '$src_typeA', '$src_attrName', '$src_qual',
                    '$src_secu', '$src_gen', '$src_list', '$src_obl', '$src_attrType', '$src_attrLen', '$src_attrCalc');";
        mysqli_query($conn, $query);
        header("location: ../fuentes.php");
        exit();
    }
    elseif ($id_action == 2){
        require_once 'connection.php';

        $src_id = $_POST['crud_src_id'];

        $src_name = $_POST['crud_src_name'];
        $src_typeA = $_POST['crud_src_type'];
        $src_attrName = $_POST['crud_src_attr'];
        $src_qual = $_POST['crud_src_qual'];
        $src_secu = $_POST['crud_src_secu'];
        $src_gen = $_POST['crud_src_gen'];
        $src_list = $_POST['crud_src_list'];
        $src_obl = $_POST['crud_src_obl'];
        $src_attrType = $_POST['crud_src_attrType'];
        $src_attrLen = $_POST['crud_src_attrLen'];
        $src_attrCalc = $_POST['crud_src_attrCalc'];

        $query = "UPDATE fuentes SET sistema_maestro='$src_name', tipo_almacenamiento='$src_typeA',
                        nombre_atributo='$src_attrName', politica_calidad='$src_qual', politica_seguridad='$src_secu',
                        forma_generacion='$src_gen', lista_de_valor='$src_list', obligatoriedad='$src_obl',
                        tipo_dato='$src_attrType', longitud='$src_attrLen', formula_campo_calculado='$src_attrCalc'
                    WHERE id_fuente=$src_id;";
        mysqli_query($conn, $query);
        header("location: ../fuentes.php");
        exit();
    }
}