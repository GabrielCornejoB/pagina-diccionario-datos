<?php
    require_once "php/functions.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Términos del negocio</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="#" />
</head>
<body>
    <?php
        generate_nav("TÉrminos del negocio");
    ?>
    <br>
    <div class="content">
        <p style='text-align:center'>Estos son los <strong>términos de negocio</strong> que están definidos actualmente:</p>
        <?php
            generate_terms();
        ?>
    </div>

    <script src="js/main.js"></script>
</body>
</html>