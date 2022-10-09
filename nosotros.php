<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
    ?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp"> 
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg"> 
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, repellat asperiores. Qui, a? Explicabo sequi, voluptatibus blanditiis exercitationem fugiat laudantium iste odio debitis, deleniti ipsa doloribus? Saepe, possimus? Ipsa, mollitia?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus id cumque esse consectetur, tempore vel veritatis, laudantium, aliquam numquam fugit ut consequatur dolor perferendis corrupti a maxime ex error reiciendis.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus ipsam doloremque eius odit odio, nostrum esse deleniti rerum officia eveniet. Rem vero reiciendis aperiam, sit sint officiis asperiores labore assumenda!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus ipsam doloremque eius odit odio, nostrum esse deleniti rerum officia eveniet. Rem vero reiciendis aperiam, sit sint officiis asperiores labore assumenda!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus ipsam doloremque eius odit odio, nostrum esse deleniti rerum officia eveniet. Rem vero reiciendis aperiam, sit sint officiis asperiores labore assumenda!</p>
            </div>
        </div>
    </section>

<?php 
    incluirTemplate('footer');
?>