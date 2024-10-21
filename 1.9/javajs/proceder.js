document.addEventListener("DOMContentLoaded", function () {
  const paymentForm = document.getElementById("paymentForm");
  const paymentError = document.getElementById("payment-error");

  paymentForm.addEventListener("submit", function (event) {
      event.preventDefault(); // Evita que el formulario se envíe inmediatamente

      // Validación de campos
      const cardNumber = document.getElementById("card-number");
      const cardHolder = document.getElementById("card-holder");
      const month = document.getElementById("month");
      const year = document.getElementById("year");
      const cvv = document.getElementById("cvv");

      let errors = [];

      if (!cardNumber.value) {
          errors.push("Número de tarjeta");
          cardNumber.style.borderColor = "red";
      } else {
          cardNumber.style.borderColor = "";
      }

      if (!cardHolder.value) {
          errors.push("Titular de la tarjeta");
          cardHolder.style.borderColor = "red";
      } else {
          cardHolder.style.borderColor = "";
      }

      if (!month.value) {
          errors.push("Mes de vencimiento");
          month.style.borderColor = "red";
      } else {
          month.style.borderColor = "";
      }

      if (!year.value) {
          errors.push("Año de vencimiento");
          year.style.borderColor = "red";
      } else {
          year.style.borderColor = "";
      }

      if (!cvv.value) {
          errors.push("CVV");
          cvv.style.borderColor = "red";
      } else {
          cvv.style.borderColor = "";
      }

      if (errors.length > 0) {
          // Muestra el error si faltan campos
          const errorMessage = "Faltan los siguientes campos: " + errors.join(", ") + ".";
          paymentError.textContent = errorMessage;
          paymentError.setAttribute("aria-live", "assertive");
      } else {
          paymentError.textContent = ""; // Limpia el mensaje de error si todo está bien

          // Confirmación de compra
          const confirmMessage = confirm("¿Estás seguro de que deseas finalizar la compra?");
          if (confirmMessage) {
              alert("Compra finalizada con éxito. ¡Gracias por tu compra!");
              paymentForm.submit(); // Envía el formulario si la compra es confirmada
          } else {
              alert("Has cancelado la compra.");
          }
      }
  });
});
