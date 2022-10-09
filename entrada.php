<?php include 'includes/templates/header.php'; ?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="imagen de la propiedad" loading="lazy">
        </picture>
        <p class="informacion-meta">Escrito el: <span>21/09/22</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">

            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis esse veniam iste voluptates quidem, aliquam quod laborum cumque. Magni eligendi numquam laudantium quas? Neque ratione earum, eaque at nam accusantium?</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam nam ducimus impedit reiciendis dolores laudantium nesciunt sunt sequi quod modi debitis repellendus doloribus inventore, voluptatum nisi ad officiis qui nulla?</p>
        </div>
    </main>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos Reservador 2022 &copy</p>
    </footer>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>