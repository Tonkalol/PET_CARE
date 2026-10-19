<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetCare - Veterinaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <div class="logo"><a href="../Proyecto PHP/Main.php">PetCare</a></div>
        <nav>
            <div class="auth-buttons">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <div class="Sesion">
                        <a href="profile.php"><i class="fa-solid fa-dog"></i></a>
                        <div class="cerrar"><button><a href="../Data/Logout.php">Cerrar sesión</a></button></div>
                    </div>
                <?php else: ?>
                    <a href="login.php"><button>Login</button></a>
                    <a href="Reg.php"><button>Registrate</button></a>
                <?php endif; ?>
            </div>
            
            <?php
            $archivoActual = basename($_SERVER['PHP_SELF']);
            if ($archivoActual === "Main.php"): ?>
                <ul>
                    <li><a href="#alimenta">Alimenta a tu mascota</a></li>
                    <li><a href="#servicios">Conoce nuestros servicios</a></li>
                    <li><a href="#sobre-nosotros">Sobre nosotros</a></li>
                </ul>
            <?php endif; ?>
        </nav>
    </header>
</body>
</html>
