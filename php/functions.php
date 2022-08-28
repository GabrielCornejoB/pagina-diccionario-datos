<?php
function generate_nav() {
    echo "<button class='hamburger-menu'>" .
            "<div class='bar'></div>" .
        "</button>";
}
function generate_hamburger_menu() {
    echo "<nav class='navbar-2'>" .
            "<a href='#'>Términos de negocio</a>" .
            "<a href='#'>Atríbutos / Datos</a>" . 
            "<a href='#'>Fuentes de Datos</a>" .
            "<a href='#'>Objetivos</a>" .
            "<a href='#'>Procesos</a>" .
            "<a href='#'>Riesgos</a>" .
        "</nav>";
}