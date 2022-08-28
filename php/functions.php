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
            "<a href='#'>Fuentes de Datos</a>" .
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
            echo "<p>" . $row['termino'] . "</p><hr>";
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
            echo "<p><strong>Termino:</strong> " . $term['termino'] . "</p>";
            $id_term = $term['id_termino'];

            $query_attrs = "SELECT * FROM atributos WHERE id_termino=$id_term;";
            $result_attrs = mysqli_query($conn, $query_attrs);
            $result_attrs_rows = mysqli_num_rows($result_attrs);
            if ($result_attrs_rows > 0) {
                echo "<div class='attrs'>";
                while ($attr = mysqli_fetch_assoc($result_attrs)) {
                    echo "<p><strong>Atríbuto:</strong> " . $attr['atributo'] . "</p>";
                }
                echo "</div><hr>";
            }
        }
        echo "</div>";
    }
}