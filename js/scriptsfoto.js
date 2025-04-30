document.addEventListener("DOMContentLoaded", function () {
    const guardarFotos = document.getElementById("guardarFotos");

    // Función para mostrar la vista previa de la imagen
    window.mostrarVistaPrevia = function (indice) {
        const input = document.getElementById(`fileInput${indice}`);
        const preview = document.getElementById(`preview${indice}`);
    
        if (input.files && input.files[0]) {
            const reader = new FileReader();
    
            reader.onload = function (e) {
                preview.src = e.target.result; // Asignar la URL Base64 a la imagen
            };
    
            reader.onerror = function (error) {
                console.error("Error al leer el archivo:", error);
            };
    
            reader.readAsDataURL(input.files[0]); // Leer el archivo como Base64
        } else {
            preview.src = ''; // Limpiar la previsualización si no hay archivo
            console.error("No se seleccionó ningún archivo.");
        }
    };

    guardarFotos.addEventListener("click", function () {
        Convertir();
        const fotos = [];
        const totalImagenesMax = 4; // Número máximo de imágenes posibles
        let totalImagenes = 0; // Contador dinámico para imágenes seleccionadas

        try {
            // Imprime los valores para verificar
            const preview = document.getElementById(`preview${i}`);
            // Obtén el valor del elemento con id 'txt_tema'
            const temaelement = document.getElementById(`txt_tema${i}`);
            const tema = temaelement.textContent.replace("Tema: ", "");
            // Obtén el valor del elemento con id 'txt_mes'
            const meselement = document.getElementById(`txt_mes${i}`);
            const mes = meselement.textContent.replace("Mes: ", "");
            // Obtén el valor del elemento con id 'codigo_ben'
            let codigoBenElement = document.getElementById("codigo_ben");
            let codigoBeneficiario = codigoBenElement.textContent.replace("Código: ", "");
            // Obtén el valor del elemento con id 'area_ben'
            const areaBenElement = document.getElementById("area_ben");
            const area = areaBenElement.textContent.replace("Área: ", "");


            // Verificar si la imagen fue seleccionada y es una cadena Base64 válida
            if (preview.src && preview.src.startsWith("data:image")) {
                totalImagenes++; // Incrementar el contador de imágenes seleccionadas

                // Agregar la imagen Base64 al arreglo
                fotos.push({
                    Foto_foto: preview.src, // Guardar la imagen Base64
                    Tema_foto: tema,
                    Fecha_foto: mes,
                    Codigo_ben: codigoBeneficiario,
                    Id_area: area, // Usar el valor numérico del área
                    Id_sec: 1, // Valor fijo
                    Id_an: 1   // Valor fijo
                });
            } 
            
        }
        catch (error) {
            console.error("Error al parsear JSON:", error.message);
        } 

        if (fotos.length === 0) {
            alert("No hay imágenes válidas para guardar.");
            return;
        }

        // Enviar datos al servidor mediante AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "guardar_fotos.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                try {
                    const respuesta = JSON.parse(xhr.responseText);
                    if (respuesta.success) {
                        Swal.fire({
                            icon: "success",
                            title: "¡Éxito!",
                            text: "Las fotos se han guardado correctamente.",
                        }).then(() => {
                            location.reload(); // Recargar la página
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: respuesta.error,
                        });
                    }
                } catch (error) {
                    console.error("Error al parsear JSON:", error.message);
                }
            }
        };
        xhr.send(JSON.stringify({ fotos }));
    });

});
 
 // Función genérica para cargar y previsualizar imágenes---------------------------------
    // function setupImagePreview(inputId, imgId) {
    //     const fileInput = document.getElementById(inputId);
    //     const imgPreview = document.getElementById(imgId);

    //     fileInput.addEventListener('change', function (event) {
    //         const file = event.target.files[0];
    //         if (file) {
    //             const reader = new FileReader();
    //             reader.onload = function (e) {
    //                 imgPreview.src = e.target.result; // Mostrar la previsualización
    //             };
    //             reader.readAsDataURL(file); // Leer el archivo como base64
    //         } else {
    //             imgPreview.src = ''; // Si no hay archivo, limpiar la previsualización
    //         }
    //     });
    // }

    // // Configurar todas las entradas y previsualizaciones
    // setupImagePreview('fileInput1', 'preview1');
    // setupImagePreview('fileInput2', 'preview2');
    // setupImagePreview('fileInput3', 'preview3');
    // setupImagePreview('fileInput4', 'preview4');
    // setupImagePreview('fileInput5', 'preview5');

// <!-- Creación de documento de Word -->
// <!-- Exportar documento Word -->
    $(document).ready(function () {
        // Asociar el evento click al botón "Generar Documento"
        $(".ExportToWord").off("click").on("click", function (event) {
            event.preventDefault(); // Evitar el comportamiento predeterminado del botón
            if (Convertir()) {
                $("#content").wordExport();
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: 'El documento se ha generado correctamente.',
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al validar los datos.',
                });
            }
        });
    });

    function Convertir()
    {
        try {
        //---DETERMINAR TEMA SEGUN LA EDAD
        const edad = document.getElementById("Fechanac_ben");
        const edadCalculada = calcularEdad(edad.textContent);        
        const area_ben = document.getElementById("area_ben");
        const area = area_ben.textContent;

        // Areas : 1:Espiritual ; 2:Cognitiva ; 3:Física ; 4:Socioemocional
        // Primer switch: Determina el rango de edad
        switch (true) {
            case (edadCalculada >= 3 && edadCalculada <= 5):
                 // Segundo switch: Determina el área
                 switch (area) {
                    case "1": //Espiritual
                        console.log("Área: Espiritual");
                        // Lógica específica para niños de 6-8 años en el área espiritual
                        break;

                    case "2": //Cognitiva
                        console.log("Área: Cognitiva");
                        // Lógica específica para niños de 6-8 años en el área Cognitiva
                        break;

                    case "3": //Física
                        console.log("Área: Física");
                        // Lógica específica para niños de 6-8 años en el área Física
                        break;

                    case "4": //Socioemocional
                        console.log("Área: Socioemocional");
                        // Lógica específica para niños de 6-8 años en el área socioemocional
                        break;

                    default:
                        console.log("Área no válida.");
                }
                break;

            case (edadCalculada >= 6 && edadCalculada <= 8):
                // Segundo switch: Determina el área
                switch (area) {
                    case "1": //Espiritual
                        console.log("Área: Espiritual");
                        // Lógica específica para niños de 6-8 años en el área espiritual
                        break;

                    case "2": //Cognitiva
                        console.log("Área: Cognitiva");
                        // Lógica específica para niños de 6-8 años en el área Cognitiva
                        break;

                    case "3": //Física
                        console.log("Área: Física");
                        // Lógica específica para niños de 6-8 años en el área Física
                        break;

                    case "4": //Socioemocional
                        console.log("Área: Socioemocional");
                        // Lógica específica para niños de 6-8 años en el área socioemocional
                        break;

                    default:
                        console.log("Área no válida.");
                }
                break;

            case (edadCalculada >= 9 && edadCalculada <= 11):
                switch (area) {
                    case "1": //Espiritual
                        console.log("Área: Espiritual");
                        // Lógica específica para niños de 6-8 años en el área espiritual
                        break;

                    case "2": //Cognitiva
                        console.log("Área: Cognitiva");
                        // Lógica específica para niños de 6-8 años en el área Cognitiva
                        break;

                    case "3": //Física
                        console.log("Área: Física");
                        // Lógica específica para niños de 6-8 años en el área Física
                        break;

                    case "4": //Socioemocional
                        console.log("Área: Socioemocional");
                        // Lógica específica para niños de 6-8 años en el área socioemocional
                        break;

                    default:
                        console.log("Área no válida.");
                }
                break;
                break;

            case (edadCalculada >= 12 && edadCalculada <= 14):
                switch (area) {
                    case "1": //Espiritual
                        console.log("Área: Espiritual");
                        // Lógica específica para niños de 6-8 años en el área espiritual
                        break;

                    case "2": //Cognitiva
                        console.log("Área: Cognitiva");
                        // Lógica específica para niños de 6-8 años en el área Cognitiva
                        break;

                    case "3": //Física
                        console.log("Área: Física");
                        // Lógica específica para niños de 6-8 años en el área Física
                        break;

                    case "4": //Socioemocional
                        console.log("Área: Socioemocional");
                        // Lógica específica para niños de 6-8 años en el área socioemocional
                        break;

                    default:
                        console.log("Área no válida.");
                }
                break;
                break;

            case (edadCalculada >= 15 && edadCalculada <= 18):
                switch (area) {
                    case "1": //Espiritual
                        console.log("Área: Espiritual");
                        // Lógica específica para niños de 6-8 años en el área espiritual
                        break;

                    case "2": //Cognitiva
                        console.log("Área: Cognitiva");
                        // Lógica específica para niños de 6-8 años en el área Cognitiva
                        break;

                    case "3": //Física
                        console.log("Área: Física");
                        // Lógica específica para niños de 6-8 años en el área Física
                        break;

                    case "4": //Socioemocional
                        console.log("Área: Socioemocional");
                        // Lógica específica para niños de 6-8 años en el área socioemocional
                        break;

                    default:
                        console.log("Área no válida.");
                }
                break;
                break;

            case (edadCalculada >= 19):
                switch (area) {
                    case "1": //Espiritual
                        console.log("Área: Espiritual");
                        // Lógica específica para niños de 6-8 años en el área espiritual
                        break;

                    case "2": //Cognitiva
                        console.log("Área: Cognitiva");
                        // Lógica específica para niños de 6-8 años en el área Cognitiva
                        break;

                    case "3": //Física
                        console.log("Área: Física");
                        // Lógica específica para niños de 6-8 años en el área Física
                        break;

                    case "4": //Socioemocional
                        console.log("Área: Socioemocional");
                        // Lógica específica para niños de 6-8 años en el área socioemocional
                        break;

                    default:
                        console.log("Área no válida.");
                }
                break;
            default:
                console.log("Edad fuera de los rangos definidos.");
        }

        return;
        //Eliminar botones
        const elemento1 = document.getElementById("btn1");
        elemento1.remove(); 
        const elemento2 = document.getElementById("btn2");
        elemento2.remove(); 
        const elemento3 = document.getElementById("btn3");
        elemento3.remove(); 
        const elemento4 = document.getElementById("btn4");
        elemento4.remove(); 
        
        //Eliminar select y obtener sus datos.
        const mes1 = document.getElementById("select_mes1");
        const mes2 = document.getElementById("select_mes2");
        const mes3 = document.getElementById("select_mes3");
        const mes4 = document.getElementById("select_mes4");  
        //Asignar valor de mes  
        const textmes1 = mes1.options[mes1.selectedIndex].text + " - 2025";
        const textmes2 = mes2.options[mes2.selectedIndex].text + " - 2025";
        const textmes3 = mes3.options[mes3.selectedIndex].text + " - 2025";
        const textmes4 = mes4.options[mes4.selectedIndex].text + " - 2025";
        document.getElementById("txt_mes1").style.visibility = "visible";
        document.getElementById("txt_mes2").style.visibility = "visible";
        document.getElementById("txt_mes3").style.visibility = "visible";
        document.getElementById("txt_mes4").style.visibility = "visible";
        document.getElementById("txt_mes1").innerHTML = textmes1;   
        document.getElementById("txt_mes2").innerHTML = textmes2;   
        document.getElementById("txt_mes3").innerHTML = textmes3;   
        document.getElementById("txt_mes4").innerHTML = textmes4;   
        const selec1 = document.getElementById("select_mes1");
        selec1.remove();
        const selec2 = document.getElementById("select_mes2");
        selec2.remove();
        const selec3 = document.getElementById("select_mes3");
        selec3.remove();
        const selec4 = document.getElementById("select_mes4");
        selec4.remove();
            
        //Eliminar input y obtener sus datos. 
        document.getElementById("txt_tema1").style.visibility = "visible";
        document.getElementById("txt_tema2").style.visibility = "visible";
        document.getElementById("txt_tema3").style.visibility = "visible";
        document.getElementById("txt_tema4").style.visibility = "visible";      
        //Asignar valor de tema  
        document.getElementById("txt_tema1").innerHTML = document.getElementById("tema1").value;          
        document.getElementById("txt_tema2").innerHTML = document.getElementById("tema2").value;          
        document.getElementById("txt_tema3").innerHTML = document.getElementById("tema3").value;  
        document.getElementById("txt_tema4").innerHTML = document.getElementById("tema4").value;   
        document.getElementById("tema1").remove();
        document.getElementById("tema2").remove();
        document.getElementById("tema3").remove();
        document.getElementById("tema4").remove();
        const codigo_ben = document.getElementById("codigo_ben");
        codigo_ben.remove();
        area_ben.remove();
        edad.remove();

        return true;
        } catch (error) {
            console.error("Ocurrió un error:", error);
            return false;
        }
    }

    // document.getElementById('showPanel1').addEventListener('click', function() {
    //     document.getElementById('panel1').classList.remove('d-none');
    //     document.getElementById('panel2').classList.add('d-none');
    // });

    // document.getElementById('showPanel2').addEventListener('click', function() {
    //     document.getElementById('panel2').classList.remove('d-none');
    //     document.getElementById('panel1').classList.add('d-none');
    // });


    
    // CALCULAR EDAD
    function calcularEdad(fechaNacimiento) {
        // Convertir la fecha de nacimiento a un objeto Date
        const fechaNac = new Date(fechaNacimiento);
    
        // Fecha límite: 01/04/2025
        const fechaLimite = new Date(2025, 3, 1); // Meses en JavaScript son base 0 (abril = 3)
    
        // Calcular la diferencia en años
        let edad = fechaLimite.getFullYear() - fechaNac.getFullYear();
    
        // Ajustar si aún no ha cumplido años en el año límite
        if (
            fechaLimite.getMonth() < fechaNac.getMonth() || 
            (fechaLimite.getMonth() === fechaNac.getMonth() && fechaLimite.getDate() < fechaNac.getDate())
        ) {
            edad--; // Restar 1 año si aún no ha cumplido años
        }
    
        return edad;
    }
    