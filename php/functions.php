<?php
function generate_nav($page_name) {
    // Aquí irá lo de $_SESSION isset para verificar todo lo del login

    echo "<header class='navbar'>" .
            "<h1 class='header-title'>" . strtoupper($page_name) . "</h2>" .
            "<button class='hamburger-menu'>" .
            "<div class='bar'></div>" .
            "</button>" .
        "</header>";
    echo "<nav class='navbar-2'>" .
            "<a href='index.php'>Inicio</a>" .
            "<a href='terminos.php'>Términos de negocio</a>" .
            "<a href='atributos.php'>Atríbutos / Datos</a>" . 
            "<a href='fuentes.php'>Fuentes de Datos</a>" .
            "<a href='#'>Objetivos</a>" .
            "<a href='#'>Procesos</a>" .
            "<a href='#'>Riesgos</a>" .
        "</nav>";
}

function generate_terms() {
    require "php/connection.php";
    $query = "SELECT * FROM terminos;";
    $result = mysqli_query($conn, $query);
    $result_rows = mysqli_num_rows($result);

    if ($result_rows > 0) {
        echo "<div class='terms'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p><strong>Término:</strong> " . $row['termino'] . "</p><hr>";
        }
        echo "</div>";
    }
}

function generate_attributes() {
    require "php/connection.php";
    $query_terms = "SELECT * FROM terminos;";
    $result_terms = mysqli_query($conn, $query_terms);
    $result_terms_rows = mysqli_num_rows($result_terms);

    if ($result_terms_rows > 0) {
        echo "<div class='terms'>";
        while ($term = mysqli_fetch_assoc($result_terms)) {
            echo "<p><strong>Término:</strong> " . $term['termino'] . "</p>";
            $id_term = $term['id_termino'];

            $query_attrs = "SELECT * FROM atributos WHERE id_termino=$id_term;";
            $result_attrs = mysqli_query($conn, $query_attrs);
            $result_attrs_rows = mysqli_num_rows($result_attrs);
            if ($result_attrs_rows > 0) {
                echo "<div class='attrs'>";
                while ($attr = mysqli_fetch_assoc($result_attrs)) {
                    $id_attr = $attr['id_atributo'];
                    $div_name = "attrs-ext " . $id_attr;
                    echo "<p onclick='toggle_attrs_info(\"$div_name\")'><strong>Atríbuto:</strong> " . $attr['atributo'] . "</p>";

                    echo "<div class='$div_name' style='display: none;'>";
                    echo    "<p style='font-size:25px;font-weight:bold;'>" . $attr['atributo'] . "</p>";
                    echo    "<div class='close-btn'><button onclick='toggle_attrs_info(\"$div_name\")'>X</button></div>";
                    echo    "<p><strong>Descripción:</strong></p><p>" . $attr['descripcion'] . "</p>";
                    echo    "<p><strong>Abreviaturas:</strong></p><p> " . $attr['abreviaturas'] . "</p>";
                    echo    "<p><strong>Referencias:</strong></p><p> " . $attr['referencias'] . "</p>";
                    echo    "<p><strong>Términos o Datos relacionados:</strong></p><p> " . $attr['terminos_datos_relac'] . "</p>";
                    echo    "<p><strong>Política de calidad requerida:</strong></p><p> " . $attr['politica_calidad'] . "</p>";
                    $data_decay = 'NO';
                    if ($attr['data_decay'] == 1) {
                        $data_decay = 'SI';
                    }
                    echo    "<p><strong>¿Es degradable con el tiempo?:</strong></p><p> " . $data_decay . "</p>";
                    echo    "<p><strong>Indicadores de calidad:</strong></p><p> " . $attr['indicadores_calidad'] . "</p>";
                    echo    "<p><strong>Códigos de fichas con indicadores de calidad:</strong></p><p> " . $attr['fichas_calidad'] . "</p>";
                    echo    "<p><strong>Propietario:</strong></p><p> " . $attr['propietario'] . "</p>";
                    echo    "<p><strong>Personal que captura el dato:</strong></p><p> " . $attr['personal_captura'] . "</p>";
                    echo    "<p><strong>Personal que se encarga de actualizar el dato:</strong></p><p> " . $attr['personal_actualizacion'] . "</p>";
                    echo    "<p><strong>Formato o Máscara:</strong></p><p> " . $attr['formato'] . "</p>";
                    $es_calculado = 'NO';
                    if ($attr['es_campo_calculado'] == 1) {
                        $es_calculado = 'SI';
                    }
                    echo    "<p><strong>¿El dato es un campo calculado?:</strong></p><p> " . $es_calculado . "</p>";
                    echo    "<p><strong>Formula si es un campo calculado:</strong></p><p> " . $attr['formula_campo_calculado'] . "</p>";
                    echo    "<p><strong>Códigos de los reportes que usan el dato:</strong></p><p> " . $attr['reportes'] . "</p>";
                    echo    "<p><strong>Códigos de los dashboards que usan el dato:</strong></p><p> " . $attr['dashboards'] . "</p>";
                    echo    "<p><strong>Comentarios, observaciones o justificaciones:</strong></p><p> " . $attr['comentarios'] . "</p>";
                    echo    "<p><strong>Personas o áreas que aprueban:</strong></p><p> " . $attr['aprueban'] . "</p>";
                    echo "</div>";
                }
                echo "</div><hr>";
            }
        }
        echo "</div>";
    }
}