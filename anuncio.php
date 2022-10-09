<?php include 'includes/templates/header.php'; ?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="imagen de la propiedad" loading="lazy">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="Icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis esse veniam iste voluptates quidem, aliquam quod laborum cumque. Magni eligendi numquam laudantium quas? Neque ratione earum, eaque at nam accusantium?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam nam ducimus impedit reiciendis dolores laudantium nesciunt sunt sequi quod modi debitis repellendus doloribus inventore, voluptatum nisi ad officiis qui nulla?</p>
        </div>
    </main>

<?php 
    include 'includes/templates/footer.php'; 
?>