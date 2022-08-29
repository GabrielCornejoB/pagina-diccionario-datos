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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <?php
        generate_nav("TÉrminos del negocio");
    ?>
    <br>
    <div class="content">
        <p style='text-align:center;margin-bottom:10px;'>Estos son los <strong>términos de negocio</strong> que están definidos actualmente:</p>
        <?php
            generate_terms();
        ?>
    </div>
    <form action="php/crud_term.php" method="post" class='create-form'>
        <p>En esta sección se pueden agregar nuevos Términos de negocio. En el campo de texto que se encuentra a continuación, ingrese el nuevo Término y luego presione <strong>"Agregar"</strong> para adicionarlo a la base de datos.</p>
        <br>
        <input type="text" name="id_type" value='1' hidden>
        <input type="text" name="term" placeholder='Término de negocio' title='Escriba aquí el nuevo término de negocio' required>
        <br><br>
        <button type="submit">Agregar</button>
    </form>

    <script src="js/main.js"></script>
</body>
</html>