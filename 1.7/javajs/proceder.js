document.addEventListener("DOMContentLoaded", function () {
  const paymentForm = document.getElementById("paymentForm");

  paymentForm.addEventListener("submit", function (event) {
    event.preventDefault(); // Evita que el formulario se envíe inmediatamente
    const confirmMessage = confirm(
      "¿Estás seguro de que deseas finalizar la compra?"
    );
    if (confirmMessage) {
      // Si el usuario confirma, envía el formulario
      paymentForm.submit();
    } else {
      // Si el usuario cancela, no se hace nada
      alert("Has cancelado la compra.");
    }
  });
});
