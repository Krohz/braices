<?php 
    require '../../includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: /');
    }

    //Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensaje de errores
    $errores = [];

    $titulo = "";
    $precio = "";
    $descripcion = "";
    $habitaciones = "";
    $wc = "";
    $estacionamientos = "";
    $vendedorId = "";

    // Ejecuta el codigo despues que el usuario envia el formulario
    // Super Globales de POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>"; 

        echo "<pre>";
        var_dump($_FILES);
        echo "</pre>"; 

        
        
        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamientos = mysqli_real_escape_string($db, $_POST['estacionamientos']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        //Asignar files hacia una variable
        $imagen = $_FILES['imagen'];


        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }
        if (!$precio) {
            $errores[] = "Debes añadir un precio";
        }
        if (strlen($descripcion) < 50) {
            $errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }
        if (!$habitaciones) {
            $errores[] = "El número de habitaciones es obligatorios";
        }
        if (!$wc) {
            $errores[] = "El número de baños es obligatorios";
        }
        if(!$estacionamientos){
            $errores[] = "El número de lugares de estacionamientos es obligatorios";
        }
        if (!$vendedorId) {
            $errores[] = "Elije un vendedor";
        }

        if (!$imagen['name'] || $imagen['error']) {
            $errores[] = "La imagen es obligatoria";
        }

        //Validar por tamaño 1mb max
        $medida = 1000 * 1000;

        if($imagen['size'] > $medida){
            $errores[] = 'La imagen es muy pesada';
        }


        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>"; 
        
        //Revisar que el arreglo de errores este vacio
        if (empty($errores)) {
            // Subida de archivos

            //Crear una carpeta
            $carpetaImagenes = '../../imagenes';

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            //Generar un nombre unico para la imagen
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
            

            //Subir la imagen a la carpeta
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" .$nombreImagen );


            //Insertar en la Base de datos - como normalmente en MySql
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamientos, creado, vendedores_id) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamientos', '$creado', '$vendedorId' )";

            //echo $query;

            $resultado = mysqli_query($db, $query);
            if($resultado){
                //Redireccionar al usuario una vez que todo este bien
                header('Location:/admin?resultado=1');
            }
        }


    }

    incluirTemplate('header');
    ?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
            
        <?php endforeach;?>

        <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo?>"> 

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" id="descripcion"><?php echo $descripcion?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>
                <label for="habitaciones">habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo $habitaciones?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo $wc?>">

                <label for="estacionamientos">estacionamiento:</label>
                <input type="number" id="estacionamientos" name="estacionamientos" placeholder="Ej: 3" min="1" max="9" value="<?php echo $estacionamientos?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor" id="">
                    <option value="">-- Seleccione --</option>
                    <?php while ($vendedor = mysqli_fetch_assoc($resultado)) :?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?>
                        value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " .
                        $vendedor['apellido']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>