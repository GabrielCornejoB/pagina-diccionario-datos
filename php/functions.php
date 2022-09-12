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
            "<a href='objetivos.php'>Objetivos</a>" .
            "<a href='procesos.php'>Procesos</a>" .
            // "<a href='#'>Riesgos</a>" .
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
            echo "<div class='text-symbol'>";
            echo "<p><strong>Término:</strong>&emsp;" . $row['termino'] . "</p>";
            echo "<form action='editar.php' method='post'>";
            echo    "<input type='text' name='id_type' value='1' hidden>";
            echo    "<input type='text' name='term_id' value='" . $row['id_termino'] . "' hidden>";
            echo    "<input type='text' name='term_desc' value='" . $row['termino'] . "' hidden>";
            echo    "<button type='submit' class='icon-btn'><span class='material-symbols-outlined'>edit</span></button>";
            echo "</form>";
            echo "</div><hr>";
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
            echo "<p><strong>Término:</strong>&emsp;" . $term['termino'] . "</p>";
            $id_term = $term['id_termino'];

            $query_attrs = "SELECT * FROM atributos WHERE id_termino=$id_term;";
            $result_attrs = mysqli_query($conn, $query_attrs);
            $result_attrs_rows = mysqli_num_rows($result_attrs);
            if ($result_attrs_rows > 0) {
                echo "<div class='attrs'>";
                while ($attr = mysqli_fetch_assoc($result_attrs)) {
                    $id_attr = $attr['id_atributo'];
                    $div_name = "info " . $id_attr;

                    echo "<div class='text-symbol'>";
                    echo "<p onclick='toggle_info(\"$div_name\")' style='width:95%;'><strong>Atríbuto:</strong>&emsp;" . $attr['atributo'] . "</p>";

                    echo "<form action='editar.php' method='post' class='form-icon'>";
                    echo    "<input type='text' name='id_type' value='2' hidden>";
                    echo    "<input type='text' name='attr_id' value='" . $attr['id_atributo'] . "' hidden>";
                    echo    "<button type='submit' class='icon-btn icon-attr'><span class='material-symbols-outlined'>edit</span></button>";
                    echo "</form>";

                    echo "</div>";

                    echo "<div class='$div_name' style='display: none;'>";
                    echo    "<p style='font-size:25px;font-weight:bold;'>" . $attr['atributo'] . "</p>";
                    echo    "<div class='close-btn'><button onclick='toggle_info(\"$div_name\")'>X</button></div>";
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
                echo "</div>";
            }
            echo "<hr>";
        }
        echo "</div>";
    }
}
function generate_sources() {
    require "php/connection.php";
    $query_terms = "SELECT * FROM terminos;";
    $result_terms = mysqli_query($conn, $query_terms);
    $result_terms_rows = mysqli_num_rows($result_terms);

    if ($result_terms_rows > 0) {
        echo "<div class='terms'>";
        while ($term = mysqli_fetch_assoc($result_terms)) {
            echo "<p><strong>Término:</strong>&emsp;" . $term['termino'] . "</p>";
            $id_term = $term['id_termino'];

            $query_attrs = "SELECT * FROM atributos WHERE id_termino=$id_term;";
            $result_attrs = mysqli_query($conn, $query_attrs);
            $result_attrs_rows = mysqli_num_rows($result_attrs);

            if ($result_attrs_rows > 0) {
                echo "<div class='attrs-srcs'>";
                while ($attr = mysqli_fetch_assoc($result_attrs)) {
                    echo "<hr><p><strong>Atríbuto:</strong>&emsp;" . $attr['atributo'] . "</p><hr>";
                    $id_attr = $attr['id_atributo'];

                    $query_srcs = "SELECT * FROM fuentes WHERE id_atributo=$id_attr;";
                    $result_srcs = mysqli_query($conn, $query_srcs);
                    $result_srcs_rows = mysqli_num_rows($result_srcs);

                    if ($result_srcs_rows > 0) {
                        echo "<div class='box'>";
                        while ($src = mysqli_fetch_assoc($result_srcs)) {
                            $id_src = $src['id_fuente'];
                            $div_name = "info " . $id_src;


                            echo "<div class='text-symbol'>";
                            echo "<p onclick='toggle_info(\"$div_name\")' style='width:95%'><strong>Fuente de datos:</strong>&emsp;" . $src['sistema_maestro'] . "</p>";
                            echo "<form action='editar.php' method='post' class='form-icon' style='margin-top:5px'>";
                            echo    "<input type='text' name='id_type' value='2' hidden>";
                            echo    "<input type='text' name='attr_id' value='" . $attr['id_atributo'] . "' hidden>";
                            echo    "<button type='submit' class='icon-btn '><span class='material-symbols-outlined' style='font-size:20px;'>edit</span></button>";
                            echo "</form>";
                            echo "</div>";


                            echo "<div class='$div_name' style='display: none;'>";
                            echo    "<p style='font-size:25px;font-weight:bold;'>" . $src['sistema_maestro'] . "</p>";
                            echo    "<div class='close-btn'><button onclick='toggle_info(\"$div_name\")'>X</button></div>";
                            echo    "<p><strong>Tipo de almacenamiento:</strong></p><p>" . $src['tipo_almacenamiento'] . "</p>";
                            echo    "<p><strong>Nombre del dato en el sistema:</strong></p><p>" . $src['nombre_atributo'] . "</p>";
                            echo    "<p><strong>Política de calidad en el sistema:</strong></p><p>" . $src['politica_calidad'] . "</p>";
                            echo    "<p><strong>Política de seguridad en el sistema:</strong></p><p>" . $src['politica_seguridad'] . "</p>";
                            echo    "<p><strong>Forma de generación del dato:</strong></p><p>" . $src['forma_generacion'] . "</p>";
                            $lista_valor = 'NO';
                            if ($src['lista_de_valor'] == 1) {
                                $lista_valor = 'SI';
                            }
                            echo    "<p><strong>¿Es una lista de valor?:</strong></p><p>" . $lista_valor . "</p>";
                            $obligatoriedad = 'NO';
                            if ($src['obligatoriedad'] == 1) {
                                $obligatoriedad = 'SI';
                            }
                            echo    "<p><strong>¿Es un campo obligatorio?:</strong></p><p>" . $obligatoriedad . "</p>";
                            echo    "<p><strong>Tipo del dato en el sistema:</strong></p><p>" . $src['tipo_dato'] . "</p>";
                            echo    "<p><strong>Número de caracteres en el sistema:</strong></p><p>" . $src['longitud'] . "</p>";
                            echo    "<p><strong>Formula si es campo calculado:</strong></p><p>" . $src['formula_campo_calculado'] . "</p>";
                            echo "</div>";
                        }
                        echo "</div>";
                    }
                }
                echo "</div>";
            }     
            echo "<hr>";    
        }
        echo "</div>";
    }
}
function generate_objectives() {
    require "php/connection.php";
    $query_terms = "SELECT * FROM terminos;";
    $result_terms = mysqli_query($conn, $query_terms);
    $result_terms_rows = mysqli_num_rows($result_terms);

    if ($result_terms_rows > 0) {
        echo "<div class='terms'>";
        while ($term = mysqli_fetch_assoc($result_terms)) {
            echo "<p><strong>Término:</strong>&emsp;" . $term['termino'] . "</p>";
            $id_term = $term['id_termino'];

            $query_attrs = "SELECT * FROM atributos WHERE id_termino=$id_term;";
            $result_attrs = mysqli_query($conn, $query_attrs);
            $result_attrs_rows = mysqli_num_rows($result_attrs);

            if ($result_attrs_rows > 0) {
                echo "<div class='attrs-srcs'>";
                while ($attr = mysqli_fetch_assoc($result_attrs)) {
                    echo "<hr><p><strong>Atríbuto:</strong>&emsp;" . $attr['atributo'] . "</p><hr>";
                    $id_attr = $attr['id_atributo'];

                    $query_objs = "SELECT * FROM objetivos WHERE id_atributo=$id_attr;";
                    $result_objs = mysqli_query($conn, $query_objs);
                    $result_objs_rows = mysqli_num_rows($result_objs);

                    if ($result_objs_rows > 0) {
                        echo "<ul style='margin-left:30px'>";
                        while ($obj = mysqli_fetch_assoc($result_objs)) {
                            echo "<div class='text-symbol'>";
                            echo "<li><p style='font-size:15px' ><strong>Objetivo:</strong>&emsp;" . $obj['objetivo'] . "</p></li>";
                            echo "<form action='editar.php' method='post' class='form-icon'>";
                            echo    "<input type='text' name='id_type' value='4' hidden>";
                            echo    "<input type='text' name='obj_id' value='" . $obj['id_objetivo'] . "' hidden>";
                            echo    "<input type='text' name='obj_desc' value='" . $obj['objetivo'] . "' hidden>";
                            echo    "<button type='submit' class='icon-btn icon-obj'><span class='material-symbols-outlined' style='font-size: 17px;'>edit</span></button>";
                            echo "</form>";
                            echo "</div>";
                        }
                        echo "</ul>";
                    }   
                }
                echo "</div>";
            }
            echo "<hr>";
        }
        echo "</div>";
    }
}
function generate_processes() {
    require "php/connection.php";
    $query_terms = "SELECT * FROM terminos;";
    $result_terms = mysqli_query($conn, $query_terms);
    $result_terms_rows = mysqli_num_rows($result_terms);

    if ($result_terms_rows > 0) {
        echo "<div class='terms'>";
        while ($term = mysqli_fetch_assoc($result_terms)) {
            echo "<p><strong>Término:</strong>&emsp;" . $term['termino'] . "</p>";
            $id_term = $term['id_termino'];

            $query_attrs = "SELECT * FROM atributos WHERE id_termino=$id_term;";
            $result_attrs = mysqli_query($conn, $query_attrs);
            $result_attrs_rows = mysqli_num_rows($result_attrs);

            if ($result_attrs_rows > 0) {
                echo "<div class='attrs-srcs'>";
                while ($attr = mysqli_fetch_assoc($result_attrs)) {
                    echo "<hr><p><strong>Atríbuto:</strong>&emsp;" . $attr['atributo'] . "</p><hr>";
                    $id_attr = $attr['id_atributo'];

                    $query_procs = "SELECT * FROM procesos WHERE id_atributo=$id_attr;";
                    $result_procs = mysqli_query($conn, $query_procs);
                    $result_procs_rows = mysqli_num_rows($result_procs);

                    if ($result_procs_rows > 0) {
                        echo "<ul style='margin-left:30px'>";
                        while ($proc = mysqli_fetch_assoc($result_procs)) {
                            echo "<div class='text-symbol'>";
                            echo "<li><p style='font-size:15px'><strong>Proceso:</strong>&emsp;" . $proc['proceso'] . "</p></li>";
                            echo "<form action='editar.php' method='post' class='form-icon'>";
                            echo    "<input type='text' name='id_type' value='5' hidden>";
                            echo    "<input type='text' name='proc_id' value='" . $proc['id_proceso'] . "' hidden>";
                            echo    "<input type='text' name='proc_desc' value='" . $proc['proceso'] . "' hidden>";
                            echo    "<button type='submit' class='icon-btn icon-obj'><span class='material-symbols-outlined' style='font-size: 17px;'>edit</span></button>";
                            echo "</form>";
                            echo "</div>";
                        }
                        echo "</ul>";
                    }   
                }
                echo "</div>";
            }
            echo "<hr>";
        }
        echo "</div>";
    }
}
function generate_select_terms() {
    require "php/connection.php";
    $query = "SELECT * FROM terminos;";
    mysqli_query($conn, $query);
    $result = mysqli_query($conn, $query);
    $result_rows = mysqli_num_rows($result);
    if ($result_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['id_termino'] . "'>" . $row['termino'] . "</option>";
        }
    }
}
function generate_select_attrs() {
    require "php/connection.php";
    $query = "SELECT * FROM atributos;";
    mysqli_query($conn, $query);
    $result = mysqli_query($conn, $query);
    $result_rows = mysqli_num_rows($result);
    if ($result_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['id_atributo'] . "'>" . $row['atributo'] . "</option>";
        }
    }
}