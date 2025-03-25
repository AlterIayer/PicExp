document.addEventListener("DOMContentLoaded", function () {
    // Seleccionamos todos los botones que abren el modal
    const botonesModal = document.querySelectorAll('[data-bs-toggle="modal"]');
    let codigoSeleccionado = null;

    // Iterar sobre los botones y añadir el evento click
    botonesModal.forEach(boton => {
        boton.addEventListener("click", function () {
            codigoSeleccionado = this.getAttribute("data-codigo"); // Capturar el Codigo_ben
            console.log("Codigo enviado al servidor:", codigoSeleccionado);
            if (codigoSeleccionado) {
                // Realizar solicitud AJAX
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "get_beneficiario.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log("Respuesta del servidor:", xhr.responseText);
                        try {
                            const datos = JSON.parse(xhr.responseText);
                            console.log("Datos parseados del servidor:", datos);
                            if (datos.error) {
                                console.error("Error del servidor:", datos.error);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: datos.error,
                                });
                            } else {
                                // Actualizar campos del modal
                                document.getElementById("nombre-ben").value = datos.Nombre_ben || "";
                                document.getElementById("apellidos-ben").value = datos.Apellidos_ben || "";
                                document.getElementById("telefono1-ben").value = datos.Telefono1_ben || "";
                                document.getElementById("telefono2-ben").value = datos.Telefono2_ben || "";
                            }
                        } catch (error) {
                            console.error("Error al parsear JSON:", error.message);
                        }
                    }
                };
                xhr.send("codigo=" + encodeURIComponent(codigoSeleccionado));
            } else {
                console.error("Codigo_ben no válido o no definido.");
            }
        });
    });

    // Agregar evento al botón Guardar Cambios
    guardarCambios.addEventListener("click", function () {
        const telefono1 = document.getElementById("telefono1-ben").value.trim();
        const telefono2 = document.getElementById("telefono2-ben").value.trim();
    
        // Validar Teléfono 1 (obligatorio)
        if (!validarTelefono(telefono1)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Teléfono 1 debe tener 8 dígitos y comenzar con 2, 6 o 7.',
            });
            return;
        }
    
        // Validar Teléfono 2 solo si no está vacío
        if (telefono2 && !validarTelefono(telefono2)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El Teléfono 2 debe tener 8 dígitos y comenzar con 2, 6 o 7.',
            });
            return;
        }
    
        if (!codigoSeleccionado) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se ha seleccionado ningún beneficiario.',
            });
            return;
        }
    
        // Realizar solicitud AJAX para actualizar los datoss
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "actualizar_beneficiario.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("Respuesta del servidor:", xhr.responseText);
                try {
                    const respuesta = JSON.parse(xhr.responseText);
                    if (respuesta.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            text: 'Datos actualizados correctamente.',
                        }).then(() => {
                            location.reload(); // Recargar la página para reflejar los cambios
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: respuesta.error,
                        });
                    }
                } catch (error) {
                    console.error("Error al parsear JSON:", error.message);
                }
            }
        };
        xhr.send(`codigo=${encodeURIComponent(codigoSeleccionado)}&telefono1=${encodeURIComponent(telefono1)}&telefono2=${encodeURIComponent(telefono2)}`);
    });

// Función para validar el formato del teléfono
function validarTelefono(telefono) {
    // Verificar longitud máxima de 8 caracteres
    if (telefono.length !== 8) {
        return false;
    }

    // Verificar que comience con 2, 6 o 7
    const primerDigito = telefono.charAt(0);
    return ['2', '6', '7'].includes(primerDigito);
}
});

document.addEventListener("DOMContentLoaded", function () {
    // Manejar clics en los botones de Agregar Fotos
    const botonesAgregarFoto = document.querySelectorAll('.agregar-foto');
    botonesAgregarFoto.forEach(boton => {
        boton.addEventListener('click', function () {
            const codigoBeneficiario = this.getAttribute('data-codigo'); // Obtener el código del beneficiario
            const area = this.getAttribute('data-area'); // Obtener el área seleccionada
            if (codigoBeneficiario && area) {
                // Redirigir a foto.php con los parámetros necesarios
                window.location.href = `foto.php?id=${encodeURIComponent(codigoBeneficiario)}&area=${encodeURIComponent(area)}`;
            } else {
                console.error("Código de beneficiario o área no válidos.");
                alert("Error: Código de beneficiario o área no válidos.");
            }
        });
    });
});