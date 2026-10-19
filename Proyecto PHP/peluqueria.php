<head>
    <title>PetCare - Spa para Mascotas</title>
    <link rel="stylesheet" href="./style/Spelu.css">
</head>
<?php
include_once './layouts/header.php';
?>

<mainBox>
    <section id="descripcion">
        <h2> Invitación al Spa para Mascotas: Un Día de Mimos y Amor</h2>
        <p>¿Quieres regalarle a tu peludo mejor amigo un día lleno de amor, relajación y cuidados especiales? Te invitamos con muchísimo cariño al Spa para Mascotas, donde transformamos cada visita en una experiencia única de bienestar.</p>
    </section>

    <section id="servicios">
        <h2>Conoce nuestro servicios</h2>
        <div class="servicios">
            <div class="servicio">
                <img src="./style/img/bano-relax.jpg" alt="Baño Relax">
                <div class="description">
                    <h3>1. Baño Relax</h3>
                    <p>Un baño relajante con productos naturales que dejan a tu mascota limpia, suave y perfumada.</p>
                </div>
            </div>
            <div class="servicio">
                <img src="./style/img/corte-pelo.jpg" alt="Corte de Pelo y Estilo">
                <div class="description">
                    <h3>2. Corte de Pelo y Estilo</h3>
                    <p>Servicio de estilismo para mantener a tu mascota con un look fresco y cómodo.</p>
                </div>
            </div>
            <div class="servicio">
                <img src="./style/img/masaje.jpg" alt="Masajes Antiestrés">
                <div class="description">
                    <h3>3. Masajes Antiestrés</h3>
                    <p>Masajes que alivian el estrés y relajan a tu mascota después de un día activo.</p>
                </div>
            </div>
            <div class="servicio">
                <img src="./style/img/cuidado-unas.jpg" alt="Cuidado de Uñas">
                <div class="description">
                    <h3>4. Cuidado de Uñas</h3>
                    <p>Corte y limado de uñas para garantizar el confort y la salud de sus patas.</p>
                </div>
            </div>
            <div class="servicio">
                <img src="./style/img/aromaterapia.jpg" alt="Aromaterapia">
                <div class="description">
                    <h3>5. Aromaterapia</h3>
                    <p>Sesiones de aromaterapia con aceites esenciales para promover la relajación.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="agenda">
        <h2>¡Agenda tu cita ahora!</h2>
        <p>No esperes más para consentir a tu mascota. Programa su visita al spa hoy mismo.</p>
        <button class="cta-button"><a href="agendar.php">Agendar cita</a></button>
    </section>

</mainBox>

<?php include_once './layouts/footer.php' ?>
</body>

</html>