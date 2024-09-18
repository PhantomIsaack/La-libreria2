document.addEventListener("DOMContentLoaded", function () {
    const createAccountBtn = document.querySelector(".create-account");
    const backToLoginBtn = document.querySelector(".back-to-login");
  
    const loginSection = document.getElementById("loginSection");
    const registerSection = document.getElementById("registerSection");
  
    createAccountBtn.addEventListener("click", function () {
      loginSection.style.display = "none";
      registerSection.style.display = "block";
    });
  
    backToLoginBtn.addEventListener("click", function () {
      registerSection.style.display = "none";
      loginSection.style.display = "block";
    });
  });



  // Asegúrate de que el DOM esté completamente cargado antes de ejecutar el script
document.addEventListener('DOMContentLoaded', function() {
  // Selecciona el formulario
  const paymentForm = document.getElementById('paymentForm');

  // Añade un event listener para el envío del formulario
  paymentForm.addEventListener('submit', function(event) {
      // Evita el envío real del formulario si es necesario (para pruebas)
      event.preventDefault();

      // Muestra un alert cuando el formulario se envíe
      alert('¡Compra completada exitosamente!');

      // Aquí puedes redirigir o manejar la lógica adicional después de mostrar el alert
      // window.location.href = 'pagina-despues-de-compra.html'; // Ejemplo de redirección
  });
});

document.addEventListener('DOMContentLoaded', function() {
  // Selecciona los campos de mes y año
  const monthField = document.getElementById('month');
  const yearField = document.getElementById('year');

  // Función para permitir solo números
  function restrictToNumbers(event) {
      const key = event.key;
      if (!/[\d]/.test(key) && key !== 'Backspace' && key !== 'Tab' && key !== 'ArrowLeft' && key !== 'ArrowRight') {
          event.preventDefault();
      }
  }

  // Añade el event listener para los campos de mes y año
  monthField.addEventListener('keydown', restrictToNumbers);
  yearField.addEventListener('keydown', restrictToNumbers);
});
