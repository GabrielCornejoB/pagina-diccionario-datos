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
                    if (isset($_POST['term_id']) && isset($_POST['term_desc'])) {
                        $term_id = $_POST['term_id'];
                        $term_desc = $_POST['term_desc'];
                        echo "<form action='php/crud_term.php' method='post' class='crud-form'>";
                        echo    "<p>En esta sección puede editar el Término de negocio que escogió previamente, cambie los valores en los campos de texto y cuando termine, presione <strong>\"Actualizar\"</strong>.</p><hr>";
                        echo    "<input type='text' name='id_action' value='2' hidden>";
                        echo    "<input type='text' name='crud_term_id' value='" . $term_id . "' hidden>";
                        echo    "<input type='text' name='crud_term_desc' placeholder='" . $term_desc . "' title='Escriba aquí el nuevo valor del término' required><br><br>";
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
                    
                }
                elseif ($id_type == 4) {        // Obj
                    
                }
                elseif ($id_type == 5) {        // Proc
                    
                }
            }
        ?>
    </div>
    
    <script src="js/main.js"></script> 
</body>
</html>