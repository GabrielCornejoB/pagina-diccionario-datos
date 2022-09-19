<?php
    require_once "php/functions.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="#" />
</head>
<body>
    <?php
        generate_nav("Editar");
    ?>
    <br>
    <div class="content">
        <?php
            if (isset($_POST['id_type'])) {
                $id_type = $_POST['id_type'];
                if ($id_type == 1) {            // Term
                    if (isset($_POST['term_id']) && isset($_POST['term_desc']) && isset($_POST['term_exp'])) {
                        $term_id = $_POST['term_id'];
                        $term_desc = $_POST['term_desc'];
                        $term_exp = $_POST['term_exp'];

                        echo "<form action='php/crud_term.php' method='post' class='crud-form'>";
                        echo    "<p>En esta sección puede editar el Término de negocio que escogió previamente, cambie los valores en los campos de texto y cuando termine, presione <strong>\"Actualizar\"</strong>.</p><hr>";
                        echo    "<input type='text' name='id_action' value='2' hidden>";
                        echo    "<input type='text' name='crud_term_id' value='" . $term_id . "' hidden>";
                        echo    "<div class='form-row'><p>Término de negocio</p><input type='text' name='crud_term_desc' placeholder='" . $term_desc . "' title='Escriba aquí el nuevo valor del término' required></div><br><br>";
                        echo    "<div class='form-row'><p>Explicación del término</p><textarea type='text' name='crud_term_exp' placeholder='" . $term_exp . "' title='Escriba aquí la nueva explicación del término' required></textarea></div><br><br>";
                        echo    "<button type='submit'>Actualizar</button>";
                        echo "</form>";

                        echo "<form action='php/crud_term.php' method='post' class='crud-form'>";
                        echo    "<p style='color:red'>¡CUIDADO!, presionando el botón <strong>\"Eliminar\"</strong> eliminará el término de negocio y todos los datos que estén relacionados a este. Esto no tiene vuelta atras.</p>";
                        echo    "<input type='text' name='id_action' value='3' hidden>";
                        echo    "<input type='text' name='crud_term_id' value='" . $term_id . "' hidden>";
                        echo    "<br><button type='submit'>ELIMINAR</button>";
                        echo "</form>";
                    }
                }
                elseif ($id_type == 2) {        // Attr
                    if (isset($_POST['attr_id'])) {
                        $attr_id = $_POST['attr_id'];
                        echo "<form action='php/crud_attr.php' method='post' class='crud-form'>";
                        echo    "<p>En esta sección puede editar el Atríbuto que escogió previamente, cambie los valores en los campos de texto y cuando termine, presione <strong>\"Actualizar\"</strong>.</p><hr>";

                        require_once "php/connection.php";
                        $query = "SELECT * FROM atributos WHERE id_atributo=$attr_id;";
                        $sql_attr = mysqli_query($conn, $query);
                        $attr = mysqli_fetch_assoc($sql_attr);

                        echo    "<input type='text' name='id_action' value='2' hidden>";
                        echo    "<input type='text' name='crud_attr_id' value='" . $attr_id . "' hidden>";
                        echo    "<div class='form-row'><p>Nombre del atríbuto</p><input type='text' name='crud_attr_atributo' placeholder='" . $attr['atributo'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Descripción:</p><textarea type='text' name='crud_attr_descripcion' placeholder='" . $attr['descripcion'] . "' required></textarea></div><br>";
                        echo    "<div class='form-row'><p>Abreviaturas:</p><input type='text' name='crud_attr_abreviaturas' placeholder='" . $attr['abreviaturas'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Referencias:</p><input type='text' name='crud_attr_referencias' placeholder='" . $attr['referencias'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Términos/Datos relacionados:</p><input type='text' name='crud_attr_terminos' placeholder='" . $attr['terminos_datos_relac'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Política de calidad:</p><textarea type='text' name='crud_attr_polCalidad' placeholder='" . $attr['politica_calidad'] . "' required></textarea></div><br>";
                        echo    "<div class='form-row'><p>Política de seguridad:</p><textarea type='text' name='crud_attr_polSeguridad' placeholder='" . $attr['politica_seguridad'] . "' required></textarea></div><br>";

                        echo    "<div class=form-row><p>¿El atríbuto se degrada con el tiempo?</p><div class='radios'><label>SI</label><input type='radio' name='crud_attr_decay' id='si' value='1' checked><label>NO</label><input type='radio' name='crud_attr_decay' id='no' value='0'></div></div><br>";

                        echo    "<div class='form-row'><p>Indicadores de calidad:</p><input type='text' name='crud_attr_indicadores' placeholder='" . $attr['indicadores_calidad'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Fichas de calidad:</p><input type='text' name='crud_attr_fichas' placeholder='" . $attr['fichas_calidad'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Propietario:</p><input type='text' name='crud_attr_propietario' placeholder='" . $attr['propietario'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Data Steward:</p><input type='text' name='crud_attr_steward' placeholder='" . $attr['data_steward'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Personal de captura:</p><input type='text' name='crud_attr_captura' placeholder='" . $attr['personal_captura'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Personal de actualización:</p><input type='text' name='crud_attr_actualizacion' placeholder='" . $attr['personal_actualizacion'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Personal que lo utiliza:</p><input type='text' name='crud_attr_utilizacion' placeholder='" . $attr['personal_utiliza'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Formato:</p><textarea type='text' name='crud_attr_formato' placeholder='" . $attr['formato'] . "' required></textarea></div><br>";

                        echo    "<div class=form-row><p>¿Es un campo calculado?</p><div class='radios'><label>SI</label><input type='radio' name='crud_attr_calculado' id='si' value='1' checked><label>NO</label><input type='radio' name='crud_attr_calculado' id='no' value='0'></div></div><br>";
                        
                        echo    "<div class='form-row'><p>Formula campo calculado:</p><input type='text' name='crud_attr_formulaCampo' placeholder='" . $attr['formula_campo_calculado'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Reportes:</p><textarea type='text' name='crud_attr_reportes' placeholder='" . $attr['reportes'] . "' required></textarea></div><br>";
                        echo    "<div class='form-row'><p>Dashboards:</p><textarea type='text' name='crud_attr_dashboards' placeholder='" . $attr['dashboards'] . "' required></textarea></div><br>";
                        echo    "<div class='form-row'><p>Comentarios:</p><input type='text' name='crud_attr_comentarios' placeholder='" . $attr['comentarios'] . "' required></div><br>";
                        echo    "<div class='form-row'><p>Quienes aprueban:</p><input type='text' name='crud_attr_aprueban' placeholder='" . $attr['aprueban'] . "' required></div><br>";
                        echo    "<button type='submit'>Actualizar</button>";
                        echo "</form>";

                        echo "<form action='php/crud_attr.php' method='post' class='crud-form'>";
                        echo    "<p style='color:red'>¡CUIDADO!, presionando el botón <strong>\"Eliminar\"</strong> eliminará el atríbuto. Esto no tiene vuelta atras.</p>";
                        echo    "<input type='text' name='id_action' value='3' hidden>";
                        echo    "<input type='text' name='crud_attr_id' value='" . $attr_id . "' hidden>";
                        echo    "<br><button type='submit'>ELIMINAR</button>";
                        echo "</form>";
                    }
                }
                elseif ($id_type == 3) {        // Src
                    if (isset($_POST['src_id'])) {
                        $src_id = $_POST['src_id'];
                        require_once "php/connection.php";
                        $query = "SELECT * FROM fuentes WHERE id_fuente=$src_id;";
                        $sql_src = mysqli_query($conn, $query);
                        $src = mysqli_fetch_assoc($sql_src);

                        echo "<form action='php/crud_src.php' method='post' class='crud-form'>";
                        echo    "<p>En esta sección puede editar la Fuente de Datos que escogió previamente, cambie los valores en los campos de texto y cuando termine, presione <strong>\"Actualizar\"</strong>.</p><hr>";
                        echo    "<input type='text' name='id_action' value='2' hidden>";
                        echo    "<input type='text' name='crud_src_id' value='" . $src_id . "' hidden>";

                        echo "<div class='form-row'><p>Nombre del sistema maestro:</p><input type='text' name='crud_src_name' placeholder='" . $src['sistema_maestro'] . "' required></div><br>";
                        echo "<div class='form-row'><p>Tipo de almacenamiento del sistema:</p><input type='text' name='crud_src_type' placeholder='" . $src['tipo_almacenamiento'] . "' required></div><br>";
                        echo "<div class='form-row'><p>Nombre del atríbuto en el sistema maestro:</p><input type='text' name='crud_src_attr' placeholder='" . $src['nombre_atributo'] . "' required></div><br>";
                        echo "<div class='form-row'><p>Política de calidad en el sistema:</p><textarea type='text' name='crud_src_qual' placeholder='" . $src['politica_calidad'] . "' required></textarea></div><br>";
                        echo "<div class='form-row'><p>Política de seguridad en el sistema:</p><textarea type='text' name='crud_src_secu' placeholder='" . $src['politica_seguridad'] . "' required></textarea></div><br>";
                        echo "<div class='form-row'><p>Forma de generación del atríbuto:</p><textarea type='text' name='crud_src_gen' placeholder='" . $src['forma_generacion'] . "' required></textarea></div>";
                        echo "<br><div class='form-row'><p>¿Es lista de valor en el sistema?</p><div class='radios'><label>SI</label><input type='radio' name='crud_src_list' id='si' value='1' checked><label>NO</label><input type='radio' name='crud_src_list'id='no' value='0'></div></div><br>";
                        echo "<div class='form-row'><p>¿Es obligatorio en el sistema?</p><div class='radios'><label>SI</label><input type='radio' name='crud_src_obl' id='si' value='1' checked><label>NO</label><input type='radio' name='crud_src_obl'id='no' value='0'></div></div><br>";
                        echo "<div class='form-row'><p>Tipo del atríbuto en el sistema:</p><input type='text' name='crud_src_attrType' placeholder='" . $src['tipo_dato'] . "' required></div><br>";
                        echo "<div class='form-row'><p>Longitud del atríbuto en el sistema:</p><input type='text' name='crud_src_attrLen' placeholder='" . $src['longitud'] . "' required></div><br>";
                        echo "<div class='form-row'><p>Formula de como lo calcula el sistema:</p><input type='text' name='crud_src_attrCalc' placeholder='" . $src['formula_campo_calculado'] . "' required></div><br>";
                        echo "<button type='submit'>Actualizar</button>";

                        echo "</form>";


                        echo "<form action='php/crud_src.php' method='post' class='crud-form'>";
                        echo    "<p style='color:red'>¡CUIDADO!, presionando el botón <strong>\"Eliminar\"</strong> eliminará la Fuente de Datos y todos los datos que estén relacionados a este. Esto no tiene vuelta atras.</p>";
                        echo    "<input type='text' name='id_action' value='3' hidden>";
                        echo    "<input type='text' name='crud_src_id' value='" . $src_id . "' hidden>";
                        echo    "<br><button type='submit'>ELIMINAR</button>";
                        echo "</form>";
                    }
                }
                elseif ($id_type == 4) {        // Obj
                    if (isset($_POST['obj_id'])) {
                        $obj_id = $_POST['obj_id'];
                        $obj_desc = $_POST['obj_desc'];
                        echo "<form action='php/crud_obj.php' method='post' class='crud-form'>";
                        echo    "<p>En esta sección puede editar el Objetivo estratégico que escogió previamente, cambie los valores en los campos de texto y cuando termine, presione <strong>\"Actualizar\"</strong>.</p><hr>";          
                        echo    "<input type='text' name='id_action' value='2' hidden>";
                        echo    "<input type='text' name='crud_obj_id' value='" . $obj_id . "' hidden>";
                        echo    "<input type='text' name='crud_obj_desc' placeholder='" . $obj_desc . "' title='Escriba aquí el nuevo valor del objetivo' required><br><br>";
                        echo    "<button type='submit'>Actualizar</button>";
                        echo "</form>";

                        echo "<form action='php/crud_obj.php' method='post' class='crud-form'>";
                        echo    "<p style='color:red'>¡CUIDADO!, presionando el botón <strong>\"Eliminar\"</strong> eliminará el objetivo estratégico. Esto no tiene vuelta atras.</p>";
                        echo    "<input type='text' name='id_action' value='3' hidden>";
                        echo    "<input type='text' name='crud_obj_id' value='" . $obj_id . "' hidden>";
                        echo    "<br><button type='submit'>ELIMINAR</button>";
                        echo "</form>";
                    }
                }
                elseif ($id_type == 5) {        // Proc
                    if (isset($_POST['proc_id'])) { 
                        $proc_id = $_POST['proc_id'];
                        $proc_desc = $_POST['proc_desc'];
                        echo "<form action='php/crud_proc.php' method='post' class='crud-form'>";
                        echo    "<p>En esta sección puede editar el Proceso que escogió previamente, cambie los valores en los campos de texto y cuando termine, presione <strong>\"Actualizar\"</strong>.</p><hr>";          
                        echo    "<input type='text' name='id_action' value='2' hidden>";
                        echo    "<input type='text' name='crud_proc_id' value='" . $proc_id . "' hidden>";
                        echo    "<input type='text' name='crud_proc_desc' placeholder='" . $proc_desc . "' title='Escriba aquí el nuevo valor del objetivo' required><br><br>";
                        echo    "<button type='submit'>Actualizar</button>";
                        echo "</form>";

                        echo "<form action='php/crud_proc.php' method='post' class='crud-form'>";
                        echo    "<p style='color:red'>¡CUIDADO!, presionando el botón <strong>\"Eliminar\"</strong> eliminará el proceso. Esto no tiene vuelta atras.</p>";
                        echo    "<input type='text' name='id_action' value='3' hidden>";
                        echo    "<input type='text' name='crud_proc_id' value='" . $proc_id . "' hidden>";
                        echo    "<br><button type='submit'>ELIMINAR</button>";
                        echo "</form>";
                    }
                }
                elseif ($id_type == 6) {
                    if (isset($_POST['dang_id']) && isset($_POST['dang_exp'])) {
                        $dang_id = $_POST['dang_id'];
                        $dang_exp = $_POST['dang_exp'];
                        echo "<form action='php/crud_dang.php' method='post' class='crud-form'>";
                        echo    "<p>En esta sección puede editar el Riesgo que escogió previamente, cambie los valores en los campos de texto y cuando termine, presione <strong>\"Actualizar\"</strong>.</p><hr>";          
                        echo    "<input type='text' name='id_action' value='2' hidden>";
                        echo    "<input type='text' name='crud_dang_id' value='" . $dang_id . "' hidden>";
                        echo    "<div class='form-row'>";
                        echo    "<p>Riesgo para el atríbuto</p>";
                        echo    "<select name='crud_dang' id='dangs' style='width:60%' required>";
                        echo        "<option disabled selected value style='color:gray'> -- seleccione el riesgo para el atríbuto -- </option>";
                        echo        "<option value='Filtración'>Filtración</option>";
                        echo        "<option value='Cumplimiento'>Cumplimiento</option>";
                        echo    "</select></div><br>";
                        echo    "<div class='form-row'><p>Explicación del riesgo</p><textarea type='text' name='crud_dang_exp' placeholder='" . $dang_exp . "' required></textarea></div><br>";
                        echo    "<button type='submit'>Actualizar</button>";
                        echo "</form>";

                        echo "<form action='php/crud_dang.php' method='post' class='crud-form'>";
                        echo    "<p style='color:red'>¡CUIDADO!, presionando el botón <strong>\"Eliminar\"</strong> eliminará el riesgo. Esto no tiene vuelta atras.</p>";
                        echo    "<input type='text' name='id_action' value='3' hidden>";
                        echo    "<input type='text' name='crud_dang_id' value='" . $dang_id . "' hidden>";
                        echo    "<br><button type='submit'>ELIMINAR</button>";
                        echo "</form>";
                    }
                }
            }
        ?>
    </div>
    
    <script src="js/main.js"></script> 
</body>
</html>