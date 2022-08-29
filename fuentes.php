<?php
    require_once 'php/functions.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuentes de Datos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="#" />
</head>
<body>
    <?php
        generate_nav("Fuentes de Datos");
    ?>
    <br>
    <div class="content">
        <p style='text-align:center;margin-bottom:10px;'>Estas son las <strong>fuentes de datos</strong> que están definidos actualmente, al dar <strong>click</strong> en una de estas puede ver la información adicional de la misma.</p>
        <?php
            generate_sources();
        ?>
    </div>
    <script src="js/main.js"></script>
</body>
</html>