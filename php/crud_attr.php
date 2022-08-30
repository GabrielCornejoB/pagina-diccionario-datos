<?php

if (isset($_POST['id_action'])) {
    $id_action = $_POST['id_action'];
    if ($id_action == 1) {
        require_once "connection.php";
        $attr_atributo = $_POST['crud_attr_atributo'];

        $attr_termId = $_POST['crud_attr_idTerm'];

        $attr_descripcion = $_POST['crud_attr_descripcion'];
        $attr_abreviaturas = $_POST['crud_attr_abreviaturas'];
        $attr_referencias = $_POST['crud_attr_referencias'];
        $attr_terminos = $_POST['crud_attr_terminos'];
        $attr_polCalidad = $_POST['crud_attr_polCalidad'];
        $attr_polSeguridad = $_POST['crud_attr_polSeguridad'];
        $attr_decay = $_POST['crud_attr_decay'];
        $attr_indicadores = $_POST['crud_attr_indicadores'];
        $attr_fichas = $_POST['crud_attr_fichas'];
        $attr_propietario = $_POST['crud_attr_propietario'];
        $attr_steward = $_POST['crud_attr_steward'];
        $attr_captura = $_POST['crud_attr_captura'];
        $attr_actualizacion = $_POST['crud_attr_actualizacion'];
        $attr_utilizacion = $_POST['crud_attr_utilizacion'];
        $attr_formato = $_POST['crud_attr_formato'];
        $attr_calculado = $_POST['crud_attr_calculado'];
        $attr_formulaCampo = $_POST['crud_attr_formulaCampo'];
        $attr_reportes = $_POST['crud_attr_reportes'];
        $attr_dashboards = $_POST['crud_attr_dashboards'];
        $attr_comentarios = $_POST['crud_attr_comentarios'];
        $attr_aprueban = $_POST['crud_attr_aprueban'];

        $query = "INSERT INTO atributos (atributo, id_termino, descripcion, abreviaturas, referencias, terminos_datos_relac, politica_calidad, politica_seguridad, data_decay, indicadores_calidad, fichas_calidad, propietario, data_steward, personal_captura, personal_actualizacion, personal_utiliza, formato, es_campo_calculado, formula_campo_calculado, reportes, dashboards, comentarios, aprueban) 
                    VALUES ('$attr_atributo', '$attr_termId', '$attr_descripcion', '$attr_abreviaturas',
                    '$attr_referencias', '$attr_terminos', '$attr_polCalidad', '$attr_polSeguridad',
                    '$attr_decay', '$attr_indicadores', '$attr_fichas', '$attr_propietario',
                    '$attr_steward', '$attr_captura', '$attr_actualizacion', '$attr_utilizacion',
                    '$attr_formato', '$attr_calculado', '$attr_formulaCampo', '$attr_reportes',
                    '$attr_dashboards', '$attr_comentarios', '$attr_aprueban');";
        mysqli_query($conn, $query);
        header("location: ../atributos.php");
        exit();

    }
    elseif ($id_action == 2) {
        require_once "connection.php";
        $attr_id = $_POST['crud_attr_id'];

        $attr_atributo = $_POST['crud_attr_atributo'];
        $attr_descripcion = $_POST['crud_attr_descripcion'];
        $attr_abreviaturas = $_POST['crud_attr_abreviaturas'];
        $attr_referencias = $_POST['crud_attr_referencias'];
        $attr_terminos = $_POST['crud_attr_terminos'];
        $attr_polCalidad = $_POST['crud_attr_polCalidad'];
        $attr_polSeguridad = $_POST['crud_attr_polSeguridad'];
        $attr_decay = $_POST['crud_attr_decay'];
        $attr_indicadores = $_POST['crud_attr_indicadores'];
        $attr_fichas = $_POST['crud_attr_fichas'];
        $attr_propietario = $_POST['crud_attr_propietario'];
        $attr_steward = $_POST['crud_attr_steward'];
        $attr_captura = $_POST['crud_attr_captura'];
        $attr_actualizacion = $_POST['crud_attr_actualizacion'];
        $attr_utilizacion = $_POST['crud_attr_utilizacion'];
        $attr_formato = $_POST['crud_attr_formato'];
        $attr_calculado = $_POST['crud_attr_calculado'];
        $attr_formulaCampo = $_POST['crud_attr_formulaCampo'];
        $attr_reportes = $_POST['crud_attr_reportes'];
        $attr_dashboards = $_POST['crud_attr_dashboards'];
        $attr_comentarios = $_POST['crud_attr_comentarios'];
        $attr_aprueban = $_POST['crud_attr_aprueban'];

        $query = "UPDATE atributos SET atributo='$attr_atributo', descripcion='$attr_descripcion', 
                    abreviaturas='$attr_abreviaturas', referencias='$attr_referencias',
                    terminos_datos_relac='$attr_terminos', politica_calidad='$attr_polCalidad',
                    politica_seguridad='$attr_polSeguridad', data_decay='$attr_decay',
                    indicadores_calidad='$attr_indicadores', fichas_calidad='$attr_fichas',
                    propietario='$attr_propietario', data_steward='$attr_steward',
                    personal_captura='$attr_captura', personal_actualizacion='$attr_actualizacion',
                    personal_utiliza='$attr_utilizacion', formato='$attr_formato',
                    es_campo_calculado='$attr_calculado', formula_campo_calculado='$attr_formulaCampo',
                    reportes='$attr_reportes', dashboards='$attr_dashboards',
                    comentarios='$attr_comentarios', aprueban='$attr_aprueban'
                WHERE id_atributo=$attr_id;";
        mysqli_query($conn, $query);
        header("location: ../atributos.php");
        exit();
    }
    elseif ($id_action == 3) {

    }
}