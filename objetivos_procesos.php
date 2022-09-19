<?php
    require_once 'php/functions.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objetivos y Procesos</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <?php
        generate_nav("Objetivos y Procesos");
    ?>
    <br>
    <div class="content">
        <p style='text-align:center;margin-bottom:10px;'>Estas son los <strong>Procesos</strong> de la compañía y los <strong>Objetivos estratégicos</strong> impactados por el dato que están definidos actualmente:</p>
        <?php
            generate_objs_procs();
        ?>
    </div>
    <div class="split-div">
        <form action="php/crud_obj.php" method="post" class='crud-form'>
            <p>En esta sección se pueden agregar nuevos Objetivos estratégicos. Primero seleccione a que atríbuto pertenecerá este, y luego, en el campo de texto, ingrese el nuevo Objetivo y por ultimo presione <strong>"Agregar"</strong> para adicionarlo a la base de datos.</p><hr>
            <br>
            <input type="text" name="id_action" value='1' hidden>
            <div class="form-row">
                <p>Atríbuto del objetivo</p>
                <select name="crud_obj_idAttr" id="terms" style='width:60%' required>
                    <option disabled selected value style="color:gray"> -- seleccione el atríbuto al que pertenecerá el nuevo objetivo -- </option>             
                    <?php
                        generate_select_attrs();
                    ?>
                </select>
            </div>
            <br>
            <div class="form-row">
                <p>Objetivo</p>
                <select name="crud_obj_idObj" id="terms" style='width:60%' required>
                <option disabled selected value style="color:gray"> -- seleccione el objetivo -- </option>             
                <?php
                    generate_select_objs();
                ?>
                </select>
            </div>
            <br><br>
            <button type="submit">Agregar</button>
        </form>

        <form action="php/crud_proc.php" method="post" class='crud-form'>
            <p>En esta sección se pueden agregar nuevos Procesos. Primero seleccione a que atríbuto pertenecerá este, y luego, en el campo de texto, ingrese el nuevo Proceso y por ultimo presione <strong>"Agregar"</strong> para adicionarlo a la base de datos.</p><hr>
            <br>
            <input type="text" name="id_action" value='1' hidden>
            <div class="form-row">
                <p>Atríbuto del proceso</p>
                <select name="crud_proc_idAttr" id="terms" style='width:60%' required>
                <option disabled selected value style="color:gray"> -- seleccione el atríbuto al que pertenecerá el nuevo objetivo -- </option>             
                <?php
                    generate_select_attrs();
                ?>
                </select>
            </div>
            <br>
            <div class="form-row">
                <p>Proceso</p>
                <select name="crud_proc_idProc" id="terms" style='width:60%' required>
                <option disabled selected value style="color:gray"> -- seleccione el proceso-- </option>             
                <?php
                    generate_select_procs();
                ?>
                </select>
            </div>
            <br><br>
            <button type="submit">Agregar</button>
        </form>
    </div>
    <script src="js/main.js"></script>
</body>
</html>