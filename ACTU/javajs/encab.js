// narrador comienzo -------------------------------
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

// Función que narra cuando se carga la página
//window.addEventListener('load', function() {
//  narrarTexto('Estás en la página inicial');
//});
// narrador final -------------------------------


// modo oscuro comienzo -------------------------------
document.addEventListener('DOMContentLoaded', () => {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;
    
    // Comprueba si el modo nocturno está almacenado en el localStorage
    if (localStorage.getItem('darkMode') === 'enabled') {
        body.classList.add('dark-mode');
    }

    darkModeToggle.addEventListener('click', () => {
        // Alterna el modo nocturno
        if (body.classList.contains('dark-mode')) {
            body.classList.remove('dark-mode');
            localStorage.setItem('darkMode', 'disabled');
        } else {
            body.classList.add('dark-mode');
            localStorage.setItem('darkMode', 'enabled');
        }
    });
});
// modo oscuro final -------------------------------


//chatbot confi comienzo -------------
window.addEventListener("mouseover", initLandbot, { once: true });
window.addEventListener("touchstart", initLandbot, { once: true });
var myLandbot;
function initLandbot() {
  if (!myLandbot) {
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.async = true;
    s.addEventListener("load", function () {
      var myLandbot = new Landbot.Livechat({
        configUrl:
          "https://storage.googleapis.com/landbot.site/v3/H-2601708-5JDGWETFOQE5BLBZ/index.json",
      });
    });
    s.src = "https://cdn.landbot.io/landbot-3/landbot-3.0.0.js";
    var x = document.getElementsByTagName("script")[0];
    x.parentNode.insertBefore(s, x);
  }
}
//chatbot confi final -------------
