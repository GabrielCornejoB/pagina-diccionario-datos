<?php
    require_once 'php/functions.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riesgos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <?php
        generate_nav("Riesgos");
    ?>
    <br>
    <div class="content">
        <p style='text-align:center;margin-bottom:10px;'>Estas son los <strong>riesgos</strong> para cada dato que están definidos actualmente:</p>
        <?php
            generate_dangers();
        ?>
    </div>
    <form action="php/crud_dang.php" method='post' class="crud-form">
        <p>En esta sección se pueden agregar nuevas riesgos a los datos. Complete los campos de texto a continuación y luego presione <strong>"Agregar"</strong> para adicionarlo a la base de datos.</p><hr>
        <br><input type="text" name="id_action" value='1' hidden>
        <div class="form-row">
            <p>Atríbuto al que pertenecerá el riesgo</p>
            <select name="crud_dang_idAttr" id="attrs" style='width:60%' required>
            <option disabled selected value style="color:gray"> -- seleccione el atríbuto al que pertenecerá la nueva fuente de datos -- </option>
            <?php
                generate_select_attrs();
            ?>
            </select>
        </div><br>
        <div class="form-row">
            <p>Riesgo para el atríbuto</p>
            <select name="crud_dang" id="dangs" style="width:60%" required>
                <option disabled selected value style="color:gray"> -- seleccione el riesgo para el atríbuto -- </option>
                <option value="Filtración">Filtración</option>
                <option value="Cumplimiento">Cumplimiento</option>
            </select>
        </div><br>
        <div class="form-row"><p>Explicación del riesgo</p><textarea type='text' name='crud_dang_exp' required></textarea></div><br>
        <button type='submit'>Agregar</button>";
    </form>
    <script src="js/main.js"></script>
</body>
</html>