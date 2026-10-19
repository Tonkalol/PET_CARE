<head>
    <title>PetCare - Consultas Veterinarias</title>
    <link rel="stylesheet" href="./style/Spelu.css">
</head>
<?php
include_once './layouts/header.php';

if (isset($_SESSION['mascotas'])) {
    $mascotas = $_SESSION['mascotas'];
} else {
    $mascotas = [];
}
?>

<mainBox>
    <section id="consultas">
        <h2>Nuestras consultas</h2>
        <div class="consultas">
            <div class="consulta">
                <img src="./style/img/general.png" alt="Consulta General">
                <div class="description">
                    <h3>Consulta General</h3>
                    <p>Evaluación completa del estado de salud de tu mascota para detectar posibles problemas o mantener su bienestar general.</p>
                </div>
            </div>
            <div class="consulta">
                <img src="./style/img/Vacuna.png" alt="Vacunación">
                <div class="description">
                    <h3>Vacunación</h3>
                    <p>Protege a tu mascota de enfermedades comunes con un programa de vacunación adecuado según su especie y edad.</p>
                </div>
            </div>
            <div class="consulta">
                <img src="./style/img/nutricion.jpg" alt="Consulta Nutricional">
                <div class="description">
                    <h3>Consulta Nutricional</h3>
                    <p>Asesoramiento personalizado sobre la dieta y los alimentos ideales para mantener a tu mascota fuerte y saludable.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="agenda">
        <h2>¡Agenda tu consulta ahora!</h2>
        <p>Programa tu consulta hoy mismo.</p>
        <button class="cta-button" id="openModal">Agendar cita</button>
    </section>
    
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close-button" id="closeModal">&times;</span>
            <h3>Agendar Consulta</h3>
            <form id="appointmentForm" action="../Data/Citas.php" method="POST">
                <div class="form-group">
                    <label for="mascota">Selecciona a tu mascota:</label>
                    <select id="mascota" name="mascota" required>
                        <?php if (!empty($mascotas)): ?>
                            <?php foreach ($mascotas as $mascota): ?>
                                <option value="<?php echo htmlspecialchars($mascota['id']); ?>">
                                    <?php echo htmlspecialchars($mascota['nombre']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No tienes mascotas registradas</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="consulta">Tipo de consulta:</label>
                    <select id="consulta" name="consulta" required>
                        <option value="Consulta General">Consulta General</option>
                        <option value="Vacunación">Vacunación</option>
                        <option value="Desparasitación">Desparasitación</option>
                        <option value="Urgencias">Urgencias</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha">Selecciona la fecha y hora:</label>
                    <input type="datetime-local" id="fecha" name="fecha" min="" required>
                </div>
                <button type="submit" class="cta-button">Confirmar cita</button>
            </form>
        </div>
    </div>

</mainBox>

<?php include_once './layouts/footer.php' ?>
<script src="consulta.js"></script>
</body>

</html>
