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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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

    <form action="php/crud_src.php" method='post' class="crud-form">
        <p>En esta sección se pueden agregar nuevas fuentes de datos. Complete los campos de texto a continuación y luego presione <strong>"Agregar"</strong> para adicionarlo a la base de datos.</p><hr>
        <br><input type="text" name="id_action" value='1' hidden>
        <div class="form-row">
            <p>Atríbuto de la fuente</p>
            <select name="crud_src_idAttr" id="attrs" style='width:60%' required>
            <option disabled selected value style="color:gray"> -- seleccione el atríbuto al que pertenecerá la nueva fuente de datos -- </option>
            <?php
                generate_select_attrs();
            ?>
            </select>
        </div><br>

        <div class="form-row"><p>Nombre del sistema maestro:</p><input type='text' name='crud_src_name' required></div><br>
        <div class="form-row"><p>Tipo de almacenamiento del sistema:</p><input type='text' name='crud_src_type' required></div><br>
        <div class="form-row"><p>Nombre del atríbuto en el sistema maestro:</p><input type='text' name='crud_src_attr' required></div><br>
        <div class="form-row"><p>Política de calidad en el sistema:</p><textarea type='text' name='crud_src_qual' required></textarea></div><br>
        <div class="form-row"><p>Política de seguridad en el sistema:</p><textarea type='text' name='crud_src_secu' required></textarea></div><br>
        <div class="form-row"><p>Forma de generación del atríbuto en el sistema:</p><textarea type='text' name='crud_src_gen' required></textarea></div>
        <br><div class=form-row><p>¿Es lista de valor en el sistema?</p><div class='radios'><label>SI</label><input type='radio' name='crud_src_list' id='si' value='1' checked><label>NO</label><input type='radio' name='crud_src_list'id='no' value='0'></div></div><br>
        <div class=form-row><p>¿Es obligatorio en el sistema?</p><div class='radios'><label>SI</label><input type='radio' name='crud_src_obl' id='si' value='1' checked><label>NO</label><input type='radio' name='crud_src_obl'id='no' value='0'></div></div><br>
        <div class="form-row"><p>Tipo del atríbuto en el sistema:</p><input type='text' name='crud_src_attrType' required></div><br>
        <div class="form-row"><p>Longitud del atríbuto en el sistema:</p><input type='text' name='crud_src_attrLen' required></div><br>
        <div class="form-row"><p>Formula de como lo calcula el sistema:</p><input type='text' name='crud_src_attrCalc' required></div><br>
        <button type='submit'>Agregar</button>";
    </form>

    <script src="js/main.js"></script>
</body>
</html>