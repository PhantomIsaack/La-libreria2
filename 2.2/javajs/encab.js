let narradorActivo = localStorage.getItem("narradorActivo") === "true";

function narrarTexto(texto) {
  if (narradorActivo) {
    const narrador = new SpeechSynthesisUtterance(texto);
    narrador.lang = "es-ES";
    window.speechSynthesis.speak(narrador);
  }
}

const elementosNarrables = document.querySelectorAll(".narrable");
elementosNarrables.forEach((elemento) => {
  elemento.addEventListener("mouseover", function () {
    const texto = this.innerText;
    narrarTexto(texto);
  });

  elemento.addEventListener("mouseout", function () {
    window.speechSynthesis.cancel();
  });
});

const toggleNarradorButton = document.getElementById("toggleNarrador");


if (narradorActivo) {
  toggleNarradorButton.innerText = "Apagar narrador";
} else {
  toggleNarradorButton.innerText = "Encender narrador";
}

toggleNarradorButton.addEventListener("click", function () {
  narradorActivo = !narradorActivo; 

  if (narradorActivo) {
    this.innerText = "Apagar narrador";
  } else {
    this.innerText = "Encender narrador";
    window.speechSynthesis.cancel(); 
  }

  localStorage.setItem("narradorActivo", narradorActivo);
});



document.addEventListener("DOMContentLoaded", () => {
  const darkModeToggle = document.getElementById("darkModeToggle");
  const body = document.body;

  
  if (localStorage.getItem("darkMode") === "enabled") {
    body.classList.add("dark-mode");
  }

  darkModeToggle.addEventListener("click", () => {
    if (body.classList.contains("dark-mode")) {
      body.classList.remove("dark-mode");
      localStorage.setItem("darkMode", "disabled");
    } else {
      body.classList.add("dark-mode");
      localStorage.setItem("darkMode", "enabled");
    }
  });
});


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

document.addEventListener("DOMContentLoaded", function () {
  const backToTopButton = document.querySelector(".back-to-top");

  window.addEventListener("scroll", function () {
    if (window.scrollY > 300) {
      backToTopButton.style.display = "block";
    } else {
      backToTopButton.style.display = "none";
    }
  });

  backToTopButton.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});


document.querySelectorAll('.input-text').forEach(input => {
  input.addEventListener('input', function() {
      this.value = this.value.replace(/[^a-zA-Z\sáéíóúÁÉÍÓÚñÑ]/g, '');
  });
});


document.querySelectorAll('.input-number').forEach(input => {
  input.addEventListener('input', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
  });
});