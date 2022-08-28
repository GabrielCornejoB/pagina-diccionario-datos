<?php
function generate_nav($page_name) {
    // Aquí irá lo de $_SESSION isset para verificar todo lo del login

    echo "<header class='navbar'>" .
            "<h1 class='header-title'>" . strtoupper($page_name) . "</h2>" .
            "<button class='hamburger-menu'>" .
            "<div class='bar'></div>" .
            "</button>";
        "</header>";
    echo "<nav class='navbar-2'>" .
            "<a href='index.php'>Inicio</a>" .
            "<a href='terminos.php'>Términos de negocio</a>" .
            "<a href='#'>Atríbutos / Datos</a>" . 
            "<a href='#'>Fuentes de Datos</a>" .
            "<a href='#'>Objetivos</a>" .
            "<a href='#'>Procesos</a>" .
            "<a href='#'>Riesgos</a>" .
        "</nav>";
}