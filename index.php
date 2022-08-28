<?php
    require_once "php/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diccionario datos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="#" />
</head>
<body>
    <header class="navbar">
        <h1 class="header-title">DICCIONARIO DE DATOS</h2>
        <?php
            generate_nav();
        ?>
    </header>
    <?php
        generate_hamburger_menu();
    ?>
    <script src="./js/main.js"></script>
</body>
</html>