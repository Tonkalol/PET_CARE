document.addEventListener("DOMContentLoaded", function () {
    const openModalButton = document.getElementById("openModal");
    const closeModalButton = document.getElementById("closeModal");
    const modal = document.getElementById("modal");

    openModalButton.addEventListener("click", function () {
        modal.style.display = "block"; 
    });

    closeModalButton.addEventListener("click", function () {
        modal.style.display = "none"; 
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const fechaInput = document.getElementById('fecha');
    
    const startHour = 8;
    const endHour = 16;
    
    function getCurrentDateTime() {
        const now = new Date();
        return now.toISOString().slice(0, 16);
    }

    function validateDateTime(selectedDateTime) {
        const selectedDate = new Date(selectedDateTime);
        const dayOfWeek = selectedDate.getDay();

        if (dayOfWeek === 0 || dayOfWeek === 6) {
            alert('Solo puedes seleccionar días de lunes a viernes.');
            return false;
        }

        const selectedHour = selectedDate.getHours();
        if (selectedHour < startHour || selectedHour >= endHour) {
            alert('Solo puedes seleccionar horarios entre 8:00 AM y 4:00 PM.');
            return false;
        }

        return true;
    }

    fechaInput.min = getCurrentDateTime();

    fechaInput.addEventListener('change', function () {
        if (!validateDateTime(fechaInput.value)) {
            fechaInput.value = '';
        }
    });
});
