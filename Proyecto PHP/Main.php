<?php
include_once './layouts/header.php';
?>

<mainBox>
    <section id="Present">
        <h2>Conoce a PetCare</h2>
        <p>Somos una veterinaria enfocada en el cuidado de los pequeños peludos (y de los que no tienen pelo), y en
            cómo guiar a sus amigos humanos para darles una vida llena de alegría y buena salud.</p>
    </section>

    <section id="alimenta">
        <h2>Alimenta a tu mascota</h2>
        <p>Encuentra la mejor comida para tu mascota según sus necesidades.</p>
        <div class="columns">
            <div class="column1">
                <h3>Comida para Perros</h3>
                <p>La mejor comida para mantener a tu perro saludable y feliz.</p>
                <div class="auth-buttons">
                    <button><a href="comidap.php">Ver alimentos</a></button>
                </div>
            </div>
            <div class="column2">
                <h3>Comida para Gatos</h3>
                <p>Nutrición especializada para tus gatos, adaptada a sus necesidades.</p>
                <div class="auth-buttons">
                    <button><a href="comidag.php">Ver alimentos</a></button>
                </div>
            </div>
            <div class="column3">
                <h3>Comida para Conejos</h3>
                <p>Comida balanceada para mantener a tus conejos saludables.</p>
                <div class="auth-buttons">
                    <button><a href="comidac.php">Ver alimentos</a></button>
                </div>
            </div>
        </div>
    </section>

    <section id="servicios">
        <h2>Conoce nuestros servicios</h2>
        <p>Desde consultas hasta cirugías, ofrecemos una amplia gama de servicios veterinarios.</p>

        <div class="columns">
            <div class="column1">
                <h3>Seguros</h3>
                <p>Te proporcionamos un seguro de salud para tu peludo amigo, incluso ellos merecen una vida
                    saludable.</p>
                <div class="auth-buttons">
                    <button><a href="Consultas.php">Ver más</a></button>
                </div>
            </div>
            <div class="column2">
                <h3>Consultas</h3>
                <p>¿Tu perro despertó con dolor de estómago? ¡Agenda tu cita para revisar que anda mal en esa
                    barriguita!.</p>
                <div class="auth-buttons">
                    <button><a href="Consultas.php">Ver más</a></button>
                </div>
            </div>
            <div class="column3">
                <h3>Baños y Peluquería</h3>
                <p>Quizás es hora de un nuevo look. Vamos a lavar esas patas sucias de tanto jugar y a cortar esas
                    garras rasgadoras de cojines.</p>
                <div class="auth-buttons">
                    <button><a href="peluqueria.php">Ver más</a></button>
                </div>
            </div>
        </div>
    </section>

    <section id="sobre-nosotros">
        <h2>Sobre nosotros</h2>
        <p>En PetCare, nos preocupamos por la salud y bienestar de tu mascota. Conoce más sobre nuestro equipo y
            misión.</p>

        <div class="columns">
            <div class="column1">
                <h3>MISIÓN</h3>
                <p>Nuestra misión como veterinaria es buscar una mejor vida para nuestros animales de compañía, que
                    más que mascotas, se han convertido en un miembro más de la familia, un miembro que también
                    merece una vida llena de diversión y sobre todo salud.</p>
            </div>
            <div class="column2">
                <h3>VISIÓN</h3>
                <p>Queremos que en un futuro, cada dueño sepa cuidar a su animal de compañía de la mejor manera
                    posible, sabiendo qué alimentos y cuidados son beneficiosos para cada animalito, con el fin de
                    que vivan una vida larga junto a nosotros.</p>
            </div>
            <div class="column3">
                <h3>NUESTROS VALORES</h3>
                <p>Creemos que cada criatura en el mundo merece una vida llena de salud y alegrías, incluso los
                    animales a quienes aceptamos en nuestras familias, de los cuales muchas personas olvidan que como nosotros, ellos merecen un cuidado que les permita crecer sanos y fuertes.</p>
            </div>
        </div>
    </section>

    <section id="askUS">
        <form id="Consult">
            <h3>Correo Electrónico</h3>
            <input type="text" name="email">
            <h3>¡Envíanos tus inquietudes o sugerencias!</h3>
            <textarea name="ask" rows="5" style="width: 100%;"></textarea>
            <div class="auth-buttons">
                <button>Enviar</button>
            </div>
        </form>
    </section>

</mainBox>

<?php include_once './layouts/footer.php' ?>
</body>

</html>