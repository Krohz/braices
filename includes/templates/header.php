<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="build/img/logo.svg" alt="Logotipo Web">
                </a>

                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="Icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="build/img/dark-mode.svg" alt="icono dark mode">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                    </nav>
                </div>
            </div> <!-- .barra -->
        </div>
    </header>