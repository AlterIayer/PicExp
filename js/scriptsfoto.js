 // Función genérica para cargar y previsualizar imágenes
    function setupImagePreview(inputId, imgId) {
        const fileInput = document.getElementById(inputId);
        const imgPreview = document.getElementById(imgId);

        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imgPreview.src = e.target.result; // Mostrar la previsualización
                };
                reader.readAsDataURL(file); // Leer el archivo como base64
            } else {
                imgPreview.src = ''; // Si no hay archivo, limpiar la previsualización
            }
        });
    }

    // Configurar todas las entradas y previsualizaciones
    setupImagePreview('fileInput1', 'preview1');
    setupImagePreview('fileInput2', 'preview2');
    setupImagePreview('fileInput3', 'preview3');
    setupImagePreview('fileInput4', 'preview4');

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
        const textmes1 = mes1.options[mes1.selectedIndex].text;
        const mes2 = document.getElementById("select_mes2");
        const textmes2 = mes2.options[mes2.selectedIndex].text;
        const mes3 = document.getElementById("select_mes3");
        const textmes3 = mes3.options[mes3.selectedIndex].text;
        const mes4 = document.getElementById("select_mes4");
        const textmes4 = mes4.options[mes4.selectedIndex].text;
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
        document.getElementById("txt_tema1").innerHTML = document.getElementById("tema1").value;          
        document.getElementById("txt_tema2").innerHTML = document.getElementById("tema2").value;          
        document.getElementById("txt_tema3").innerHTML = document.getElementById("tema3").value;  
        document.getElementById("txt_tema4").innerHTML = document.getElementById("tema4").value;   
        document.getElementById("tema1").remove();
        document.getElementById("tema2").remove();
        document.getElementById("tema3").remove();
        document.getElementById("tema4").remove();

        return true;
        } catch (error) {
            console.error("Ocurrió un error:", error);
            return false;
        }
    }
