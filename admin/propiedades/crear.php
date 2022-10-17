<?php 
    //Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Super Globales de POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";    

        $titulo = $_POST['titulo'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $habitaciones = $_POST['habitaciones'];
        $wc = $_POST['wc'];
        $estacionamientos = $_POST['estacionamientos'];
        $vendedorId = $_POST['vendedor'];

        //Insertar en la Base de datos - como normalmente en MySql
        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamientos, vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamientos', '$vendedorId' )";

        //echo $query;

        $resultado = mysqli_query($db, $query);
        if($resultado){
            echo "Correctamente";
        }
    }


    require '../../includes/funciones.php';
    incluirTemplate('header');
    ?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <form action="/admin/propiedades/crear.php" class="formulario" method="POST">
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad"> 

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" id="descripcion"></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>
                <label for="habitaciones">habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9">

                <label for="estacionamientos">estacionamiento:</label>
                <input type="number" id="estacionamientos" name="estacionamientos" placeholder="Ej: 3" min="1" max="9">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor" id="">
                    <option value="1">Cristian</option>
                    <option value="2">Karen</option>
                </select>
            </fieldset>

            <input type="submit" value="Crear propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>