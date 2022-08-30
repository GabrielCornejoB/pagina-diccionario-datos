<?php
    require_once "php/functions.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atríbutos / Datos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <?php
        generate_nav("AtrÍbutos / Datos");
    ?>
    <br>
    <div class="content">
        <p style='text-align:center;margin-bottom:10px;'>Estos son los <strong>atríbutos</strong> que están definidos actualmente, al dar <strong>click</strong> en un atríbuto puede ver la información adicional del mismo.</p>
        <?php
            generate_attributes();
        ?>
    </div>
    <form action="php/crud_attr.php" method='post' class="crud-form">
        <p>En esta sección se pueden agregar nuevos Atríbutos. Complete los campos de texto a continuación y luego presione <strong>"Agregar"</strong> para adicionarlo a la base de datos.</p><hr>
        <br>
        <input type="text" name="id_action" value='1' hidden>

        <div class='form-row'>
            <p>Término del atríbuto</p>
            <select name="crud_attr_idTerm" id="terms" style='width:60%' required>
                <option disabled selected value style="color:gray"> -- seleccione el término al que pertenecerá el nuevo atríbuto -- </option>
                <?php
                    generate_select_terms();
                ?>
        </select></div><br>

        <div class='form-row'><p>Nombre del atríbuto</p><input type='text' name='crud_attr_atributo' required></div><br>
        <div class='form-row'><p>Descripción:</p><textarea type='text' name='crud_attr_descripcion' required></textarea></div><br>
        <div class='form-row'><p>Descripción:</p><textarea type='text' name='crud_attr_descripcion' required></textarea></div><br>
        <div class='form-row'><p>Descripción:</p><textarea type='text' name='crud_attr_descripcion' required></textarea></div><br>
        <div class='form-row'><p>Abreviaturas:</p><input type='text' name='crud_attr_abreviaturas' required></div><br>
        <div class='form-row'><p>Referencias:</p><input type='text' name='crud_attr_referencias' required></div><br>
        <div class='form-row'><p>Términos/Datos relacionados:</p><input type='text' name='crud_attr_terminos' required></div><br>
        <div class='form-row'><p>Política de calidad:</p><textarea type='text' name='crud_attr_polCalidad' required></textarea></div><br>
        <div class='form-row'><p>Política de seguridad:</p><textarea type='text' name='crud_attr_polSeguridad' required></textarea></div><br>
        <div class=form-row><p>¿El atríbuto se degrada con el tiempo?</p><div class='radios'><label>SI</label><input type='radio' name='crud_attr_decay' id='si' value='1' checked><label>NO</label><input type='radio' name='crud_attr_decay' id='no' value='0'></div></div><br>
        <div class='form-row'><p>Indicadores de calidad:</p><input type='text' name='crud_attr_indicadores'  required></div><br>
        <div class='form-row'><p>Fichas de calidad:</p><input type='text' name='crud_attr_fichas'  required></div><br>
        <div class='form-row'><p>Propietario:</p><input type='text' name='crud_attr_propietario' required></div><br>
        <div class='form-row'><p>Data Steward:</p><input type='text' name='crud_attr_steward'  required></div><br>
        <div class='form-row'><p>Personal de captura:</p><input type='text' name='crud_attr_captura'  required></div><br>
        <div class='form-row'><p>Personal de actualización:</p><input type='text' name='crud_attr_actualizacion'  required></div><br>
        <div class='form-row'><p>Personal que lo utiliza:</p><input type='text' name='crud_attr_utilizacion'  required></div><br>
        <div class='form-row'><p>Formato:</p><textarea type='text' name='crud_attr_formato'  required></textarea></div><br>
        <div class=form-row><p>¿Es un campo calculado?</p><div class='radios'><label>SI</label><input type='radio' name='crud_attr_calculado' id='si' value='1' checked><label>NO</label><input type='radio' name='crud_attr_calculado' id='no' value='0'></div></div><br>
        <div class='form-row'><p>Formula campo calculado:</p><input type='text' name='crud_attr_formulaCampo'  required></div><br>
        <div class='form-row'><p>Reportes:</p><textarea type='text' name='crud_attr_reportes' required></textarea></div><br>
        <div class='form-row'><p>Dashboards:</p><textarea type='text' name='crud_attr_dashboards'  required></textarea></div><br>
        <div class='form-row'><p>Comentarios:</p><input type='text' name='crud_attr_comentarios'  required></div><br>
        <div class='form-row'><p>Quienes aprueban:</p><input type='text' name='crud_attr_aprueban'  required></div><br>
        <button type='submit'>Agregar</button>";
    </form>
    <script src="js/main.js"></script>
</body>
</html>