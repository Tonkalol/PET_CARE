document.addEventListener('DOMContentLoaded', () => {
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    const mensaje = document.getElementById('mensaje');

    const showTab = (tabName) => {
        tabButtons.forEach(button => {
            button.classList.toggle('active', button.dataset.tab === tabName);
        });

        tabContents.forEach(content => {
            content.style.display = content.id === tabName ? 'block' : 'none';
        });

        if (mensaje && tabName !== 'configuracion') {
            mensaje.remove(); 
        }
    };

    if (openMascotas) {
        showTab('mascotas');
    } else {
        showTab('configuracion');
    }

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            showTab(button.dataset.tab);
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const editButtons = document.querySelectorAll('.edit-button');

    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-target');
            const inputField = document.getElementById(targetId);

            if (inputField.disabled) {
                inputField.disabled = false;
                inputField.focus();
                button.textContent = 'Cancelar';
            } else {
                inputField.disabled = true;
                inputField.value = inputField.defaultValue;
                button.textContent = 'Editar';
            }
        });
    });
});

document.getElementById('showFormButton').addEventListener('click', function() {
    document.getElementById('addMascotaForm').style.display = 'flex';
});

document.getElementById('closeFormButton').addEventListener('click', function() {
    document.getElementById('addMascotaForm').style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target == document.getElementById('addMascotaForm')) {
        document.getElementById('addMascotaForm').style.display = 'none';
    }
});


