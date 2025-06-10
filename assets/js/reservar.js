// Validar instantáneamente el número de teléfono
document.getElementById('telefono').addEventListener('input', function() {
    const telefono = this.value;
    const telefonoRegex = /^[0-9]{9}$/; // Número de 9 dígitos
    const errorTelefono = document.getElementById('error-telefono');
    if (!telefonoRegex.test(telefono)) {
        errorTelefono.textContent = 'El número de teléfono debe ser válido (9 dígitos).';
    } else {
        errorTelefono.textContent = '';
    }
});

// Validar instantáneamente el correo electrónico
document.getElementById('correo').addEventListener('input', function() {
    const correo = this.value;
    const correoRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Formato de correo válido
    const errorCorreo = document.getElementById('error-correo');
    if (!correoRegex.test(correo)) {
        errorCorreo.textContent = 'El correo electrónico no es válido.';
    } else {
        errorCorreo.textContent = '';
    }
});

// Mostrar menú de grupo si hay más de 5 personas
document.getElementById('personas').addEventListener('input', function() {
    const personas = parseInt(this.value, 10);
    const menuGrupoContainer = document.getElementById('menuGrupoContainer');
    if (personas > 5) {
        menuGrupoContainer.style.display = 'block';
    } else {
        menuGrupoContainer.style.display = 'none';
    }
});

// Cambiar las opciones de hora según la zona seleccionada
document.getElementById('zona').addEventListener('change', function() {
    const zona = this.value;
    const horaSelect = document.getElementById('hora');
    horaSelect.innerHTML = ''; // Limpiar las opciones

    if (zona === 'terraza') {
        // Horarios para la terraza
        horaSelect.innerHTML = `
            <option value="13:00">13:00</option>
            <option value="13:30">13:30</option>
            <option value="14:00">14:00</option>
            <option value="14:30">14:30</option>
            <option value="15:00">15:00</option>
            <option value="15:30">15:30</option>

            <option value="20:30">20:30</option>
            <option value="21:00">21:00</option>
            <option value="21:30">21:30</option>
            <option value="22:00">22:00</option>
        `;
    } else {
        // Horarios para el comedor
        horaSelect.innerHTML = `
            <option value="13:00">13:00</option>
            <option value="15:00">15:00</option>
            <option value="20:30">20:30</option>
            <option value="22:00">22:00</option>
        `;
    }
});

// Validar fecha, hora y personas antes de enviar el formulario
document.getElementById('reservaForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const telefono = document.getElementById('telefono').value;
    const correo = document.getElementById('correo').value;
    const zona = document.getElementById('zona').value;
    const fecha = document.getElementById('fecha').value;
    const hora = document.getElementById('hora').value;
    const personas = parseInt(document.getElementById('personas').value, 10);
    const menuGrupo = document.getElementById('menu_grupo').value;

    const hoy = new Date();
    hoy.setHours(0, 0, 0, 0);

    // Validaciones
    if (new Date(fecha) < hoy) {
        Swal.fire('Error', 'No puedes reservar en una fecha pasada.', 'error');
        return;
    }

    if (new Date(fecha).getTime() === hoy.getTime()) {
        const horaActual = new Date().toTimeString().split(':').slice(0, 2).join(':');
        if (hora <= horaActual) {
            Swal.fire('Error', 'No puedes reservar en un turno que ya ha pasado.', 'error');
            return;
        }
    }

    if (personas > 50) {
        Swal.fire('Error', 'No puedes reservar más de 50 personas por turno.', 'error');
        return;
    }

    if (personas > 5 && !menuGrupo) {
        Swal.fire('Error', 'Debes seleccionar un menú para grupos de más de 5 personas.', 'error');
        return;
    }

    // Mostrar alerta con la información de la reserva
    Swal.fire({
        title: 'Confirmar Reserva',
        html: `
            <p><strong>Nombre:</strong> ${nombre}</p>
            <p><strong>Teléfono:</strong> ${telefono}</p>
            <p><strong>Correo:</strong> ${correo}</p>
            <p><strong>Zona:</strong> ${zona}</p>
            <p><strong>Fecha:</strong> ${fecha}</p>
            <p><strong>Hora:</strong> ${hora}</p>
            <p><strong>Personas:</strong> ${personas}</p>
            ${personas > 4 ? `<p><strong>Menú:</strong> ${menuGrupo}</p>` : ''}
        `,
        showCancelButton: true,
        confirmButtonText: 'Confirmar',
        cancelButtonText: 'Enviar mail de confirmación',
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar la reserva al backend
            const formData = new FormData(this);

            fetch('/brunet/views/client/reservar.php', {
                method: 'POST',
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Reserva realizada!',
                            text: data.message,
                        }).then(() => {
                            // Redirigir o limpiar el formulario
                            document.getElementById('reservaForm').reset();
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message,
                        });
                    }
                })
                .catch((error) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo un problema al procesar la solicitud. Por favor, inténtalo de nuevo.',
                    });
                    console.error('Error:', error);
                });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Aquí puedes implementar la lógica para enviar el correo de confirmación
            Swal.fire('Correo enviado', 'Se ha enviado un correo de confirmación.', 'info');
        }
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const fechaInput = document.getElementById('fecha');
    const horaSelect = document.getElementById('hora');
    const personasInput = document.getElementById('personas');
    const zonaSelect = document.getElementById('zona');
    const menuGrupoContainer = document.getElementById('menuGrupoContainer');
    const menuGrupoSelect = document.getElementById('menu_grupo');

    // Horarios disponibles según el día de la semana y la zona
    const horarios = {
        comedor: {
            2: ['13:00', '15:00'], // Martes
            3: ['13:00', '15:00'], // Miércoles
            4: ['13:00', '15:00'], // Jueves
            5: ['13:00', '15:00', '20:30', '21:00', '21:30', '22:00'], // Viernes
            6: ['13:00', '15:00', '20:30', '21:00', '21:30', '22:00'], // Sábado
            0: ['13:00', '15:00'], // Domingo
        },
        terraza: {
            2: ['13:00', '15:00'], // Martes
            3: ['13:00', '15:00'], // Miércoles
            4: ['13:00', '15:00'], // Jueves
            5: ['13:00', '15:00', '20:30', '21:00', '21:30', '22:00'], // Viernes
            6: ['13:00', '15:00', '20:30', '21:00', '21:30', '22:00'], // Sábado
            0: ['13:00', '15:00'], // Domingo
        },
    };

    // Actualizar las opciones de hora según el día y la zona seleccionada
    function actualizarHoras() {
        const fecha = new Date(fechaInput.value);
        const diaSemana = fecha.getDay(); // 0 = Domingo, 1 = Lunes, ..., 6 = Sábado
        const zona = zonaSelect.value;
        const horasDisponibles = horarios[zona]?.[diaSemana] || [];

        // Deshabilitar las horas no disponibles
        Array.from(horaSelect.options).forEach((option) => {
            option.disabled = !horasDisponibles.includes(option.value);
        });

        // Seleccionar automáticamente la primera hora disponible
        const primeraHoraDisponible = Array.from(horaSelect.options).find(
            (option) => !option.disabled
        );
        if (primeraHoraDisponible) {
            horaSelect.value = primeraHoraDisponible.value;
        } else {
            horaSelect.value = ''; // Si no hay horas disponibles
        }
    }

    // Mostrar u ocultar el menú de grupo según el número de personas
    personasInput.addEventListener('input', () => {
        const numPersonas = parseInt(personasInput.value, 10);

        if (numPersonas >= 5) {
            menuGrupoContainer.style.display = 'block';
            menuGrupoSelect.required = true;
        } else {
            menuGrupoContainer.style.display = 'none';
            menuGrupoSelect.required = false;
            menuGrupoSelect.value = ''; // Reiniciar el valor del menú de grupo
        }
    });

    // Actualizar las horas cuando cambie la fecha o la zona
    fechaInput.addEventListener('change', actualizarHoras);
    zonaSelect.addEventListener('change', actualizarHoras);

    const infoImportanteBtn = document.getElementById('infoImportanteBtn');
    const horarioBtn = document.getElementById('horarioBtn');

    // Mostrar información importante
    infoImportanteBtn.addEventListener('click', () => {
        Swal.fire({
            title: 'Información Importante',
            html: `
                <p>Recuerda reservar tu mesa con antelación, no se aceptan reservas para el mismo día por la web.</p>
                <p>Para reservar el mismo día o cancelar la reserva, por favor, contacte con nosotros al <strong>633 616 417</strong>.</p>
                <p>¡Te esperamos!</p>
            `,
            icon: 'info',
        });
    });

    // Mostrar horario
    horarioBtn.addEventListener('click', () => {
        Swal.fire({
            title: 'Horario',
            html: `
                <p><strong>Martes a Jueves:</strong> 13:00 - 17:00</p>
                <p><strong>Viernes y Sábado:</strong> 13:00 - 17:00 y 20:30 - 24:00</p>
                <p><strong>Domingo:</strong> 13:00 - 17:00</p>
            `,
            icon: 'info',
        });
    });

    const header = document.querySelector("header"); // Asegúrate de que el header esté presente en la página

    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });

    const reservaForm = document.getElementById('reservaForm');

    // Validar horario de reserva
    reservaForm.addEventListener('submit', (e) => {
        const fecha = new Date(document.getElementById('fecha').value);
        const hora = document.getElementById('hora').value;

        const diaSemana = fecha.getDay(); // 0 = Domingo, 1 = Lunes, ..., 6 = Sábado
        const horarios = {
            2: ['13:00', '15:00'], // Martes
            3: ['13:00', '15:00'], // Miércoles
            4: ['13:00', '15:00'], // Jueves
            5: ['13:00', '15:00', '20:30', '22:00'], // Viernes
            6: ['13:00', '15:00', '20:30', '22:00'], // Sábado
            0: ['13:00', '15:00'], // Domingo
        };

        if (!horarios[diaSemana] || !horarios[diaSemana].includes(hora)) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Horario no válido',
                text: 'Por favor, selecciona un horario válido según el día de la semana.',
            });
        }
    });

    // Inicializar Flatpickr en el campo de fecha
    flatpickr("#fecha", {
        dateFormat: "Y-m-d", // Formato de fecha
        minDate: "today", // No permitir fechas pasadas
        locale: "es", // Idioma español
        position: "auto center", // Centrar el calendario
        onOpen: function(selectedDates, dateStr, instance) {
            // Cambiar el tamaño del calendario al abrir
            instance.calendarContainer.style.fontSize = "1rem";
        },
    });
});