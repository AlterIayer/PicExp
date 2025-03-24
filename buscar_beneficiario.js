document.addEventListener("DOMContentLoaded", function () {
    const buscador = document.getElementById("buscador");
    if (buscador) {
        buscador.addEventListener("input", function () {
            const termino = this.value;

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "buscar_beneficiarios.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        try {
                            const datos = JSON.parse(xhr.responseText);

                            // Verificar si la respuesta tiene un error
                            if (datos.error) {
                                console.error("Error del servidor:", datos.error);
                                const tabla = document.getElementById("tablaDatos");
                                tabla.innerHTML = `<tr><td colspan="6">${datos.error}</td></tr>`;
                                return;
                            }

                            // Actualizar la tabla con los datos
                            const tabla = document.getElementById("tablaDatos");
                            tabla.innerHTML = ""; // Limpiar la tabla
                            datos.forEach(function (fila) {
                                const tr = document.createElement("tr");
                                tr.innerHTML = `
                                    <td>${fila.Codigo_ben}</td>
                                    <td>${fila.Nombre_ben}</td>
                                    <td>${fila.Apellidos_ben}</td>
                                    <td>${fila.Telefono1_ben || 'N/A'}</td>
                                    <td>${fila.Telefono2_ben || 'N/A'}</td>
                                    <td>${fila.Fechanac_ben_for}</td>
                                `;
                                tabla.appendChild(tr);
                            });
                        } catch (e) {
                            console.error("Error al analizar JSON:", e.message);
                            console.error("Respuesta del servidor:", xhr.responseText);
                        }
                    } else {
                        console.error("Error en la solicitud AJAX:", xhr.statusText);
                    }
                }
            };

            xhr.send("termino=" + encodeURIComponent(termino));
        });
    }
});
