const btnCart = document.querySelector(".container-icon");
const containerCartProducts = document.querySelector(
  ".container-cart-products"
);
btnCart.addEventListener("click", () => {
  containerCartProducts.classList.toggle("hidden-cart");
});

document.addEventListener("DOMContentLoaded", function () {
  // Captura el botón de eliminar
  const eliminarBtn = document.querySelector(".eliminar");
});
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

// Cargar el encabezado desde un archivo externo
fetch('encabezado.html')
    .then(response => response.text())
    .then(data => {
        document.getElementById('header-placeholder').innerHTML = data;
    });
