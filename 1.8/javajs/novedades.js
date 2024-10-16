document.addEventListener("DOMContentLoaded", function () {
  const checkboxes = document.querySelectorAll('input[name="price-filter"]');
  const products = document.querySelectorAll(".book-item");

  checkboxes.forEach((checkbox) => {
      checkbox.addEventListener("change", function () {
          filterProducts();
      });
  });

  function filterProducts() {
      const selectedPrices = Array.from(checkboxes)
          .filter(checkbox => checkbox.checked)
          .map(checkbox => checkbox.value);

      products.forEach((product) => {
          const productPriceRange = product.getAttribute("data-price");

          if (selectedPrices.length === 0 || selectedPrices.includes(productPriceRange)) {
              product.style.display = "block"; // Mostrar el producto
          } else {
              product.style.display = "none"; // Ocultar el producto
          }
      });
  }
});

  