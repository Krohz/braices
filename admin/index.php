<?php 
    require '../includes/funciones.php';
    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: /');
    }

    // Importar la conexion
    require '../includes/config/database.php';
    $db = conectarDB();
    // Escribir el query
    $query = "SELECT * FROM propiedades";
    // Consultar la BD
    $resultadoConsulta = mysqli_query($db, $query);



    // Muestra mensaje
    $resultado = $_GET['resultado'] ?? null;



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            //Eliminar el archivo
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            unlink('../imagenes' . "/" . $propiedad['imagen']);
            

            //Eliminar propiedad 
            $query = "DELETE FROM propiedades WHERE id = ${id}";
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                header('location: /admin?resultado=3');
            }
        }
    }

    //Incluye un template
    incluirTemplate('header');
    ?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if ($resultado === '1' ):?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif($resultado === '2'): ?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php elseif($resultado === '3'): ?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php endif; ?>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody><!--Mostrar los resultados-->
                <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td> <?php echo $propiedad['id']; ?> </td>
                    <td> <?php echo $propiedad['titulo']; ?> </td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?> " class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id'];?> ">

                            <input type="submit" class ="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'];?>" class ="boton-amarillo-block">Actualizar</a>
                    </td>
                    <?php endwhile; ?>
                </tr>
            </tbody>
        </table>
    </main>

<?php 

    // Cerra la conexion - OPCIONAL
    mysqli_close($db);

    incluirTemplate('footer');
?>