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
                    }
                }
                elseif ($id_type == 2) {        // Attr

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