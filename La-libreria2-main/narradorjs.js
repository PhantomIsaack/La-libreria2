//-----------------------------------------------------------------------------------
// Variable global para controlar si el narrador está activado o desactivado
let narradorActivo = true;

// Función para activar la narración
function narrarTexto(texto) {
    if (narradorActivo) { // Solo narra si el narrador está activo
        const narrador = new SpeechSynthesisUtterance(texto);
        narrador.lang = 'es-ES'; // Idioma español
        window.speechSynthesis.speak(narrador);
    }
}

// Seleccionamos todos los elementos con la clase 'narrable'
const elementosNarrables = document.querySelectorAll('.narrable');

// Añadimos los eventos a cada elemento narrable
elementosNarrables.forEach(elemento => {
    elemento.addEventListener('mouseover', function() {
        const texto = this.innerText; // Obtenemos el texto del elemento
        narrarTexto(texto);
    });

    elemento.addEventListener('mouseout', function() {
        window.speechSynthesis.cancel(); // Detenemos la narración cuando el mouse salga
    });
});

// Función para alternar el estado del narrador (encender o apagar)
document.getElementById('toggleNarrador').addEventListener('click', function() {
    narradorActivo = !narradorActivo; // Alternar entre encender y apagar

    // Cambiar el texto del botón según el estado del narrador
    if (narradorActivo) {
        this.innerText = 'Apagar narrador';
    } else {
        this.innerText = 'Encender narrador';
        window.speechSynthesis.cancel(); // Detener cualquier narración en curso si se apaga
    }
});
