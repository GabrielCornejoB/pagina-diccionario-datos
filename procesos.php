<?php
    require_once 'php/functions.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesos impactados</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <?php
        generate_nav("Procesos relacionados");
    ?>
    <br>
    <div class="content">
        <p style='text-align:center;margin-bottom:10px;'>Estas son los <strong>procesos</strong> de la compañía impactados por el dato que están definidos actualmente:</p>
        <?php
            generate_processes();
        ?>
    </div>
    <script src="js/main.js"></script>
</body>
</html>