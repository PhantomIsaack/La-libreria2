document.addEventListener("DOMContentLoaded", function () {
  // Captura el botón de eliminar
  const eliminarBtn = document.querySelector(".eliminar");

  eliminarBtn.addEventListener("click", function () {
    const producto = this.closest(".producto");
    producto.remove();
  });

  // Captura el botón de cancelar
  const cancelarBtn = document.querySelector(".cancelar");

  cancelarBtn.addEventListener("click", function () {
    // Puedes definir la acción que desees aquí
    alert("Acción cancelada.");
  });

  // Captura el botón de proceder al pago
  const procederBtn = document.querySelector(".proceder");

  procederBtn.addEventListener("click", function () {
    window.location.href = "proceder.html"; // Redirige a la página de proceder al pago
  });
});
