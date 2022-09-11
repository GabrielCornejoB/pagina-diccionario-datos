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
}