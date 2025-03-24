
document.addEventListener("DOMContentLoaded", function () {
    // Seleccionamos todos los botones que abren el modal
    const botonesModal = document.querySelectorAll('[data-bs-toggle="modal"]');
    
    // Iterar sobre los botones y añadir el evento click
    botonesModal.forEach(boton => {
        boton.addEventListener("click", function () {
            const codigo = this.getAttribute("data-codigo"); // Capturar el Codigo_ben
            console.log("Codigo enviado al servidor:", codigo);

            if (codigo) {
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
                                alert("Error: " + datos.error);
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

                xhr.send("codigo=" + encodeURIComponent(codigo));
            } else {
                console.error("Codigo_ben no válido o no definido.");
            }
        });
    });
});
