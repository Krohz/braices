<?php
    //1. Importar la conexion a la BD
    require 'includes/config/database.php';
    $db = conectarDB();

    // 2. Consultar
    $query = "SELECT * FROM propiedades LIMIT ${limite}";

    // 3. Obtener el resultado
    $resultado = mysqli_query($db, $query);
?>

<div class="contenedor-anuncios">
    <!--4. Iterar -->
    <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncios">
        <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio" loading="lazy">
        <div class="contenido-anuncio">
                        <h3><?php echo $propiedad['titulo']; ?></h3>
                        <p><?php echo $propiedad['descripcion']; ?></p>
                        <p class="precio"><?php echo $propiedad['precio']; ?></p>

                        <ul class="iconos-caracteristicas">
                            <li>
                                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                                <p><?php echo $propiedad['wc']; ?></p>
                            </li>
                            <li>
                                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="estacionamiento">
                                <p><?php echo $propiedad['estacionamientos']; ?></p>
                            </li>
                            <li>
                                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio">
                                <p><?php echo $propiedad['habitaciones']; ?></p>
                            </li>
                        </ul>

                        <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                            Ver Propiedad
                        </a>
        </div><!-- Contenido-Anuncio -->
    </div><!-- Anuncios -->
    <?php endwhile; ?>
</div><!-- CONTENEDOR-Anuncios -->

<?php
    //Cerrar conexion
    mysqli_close($db);
?>