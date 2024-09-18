document.addEventListener("DOMContentLoaded", function () {
    const filterForm = document.getElementById("filter-form");
    const bookItems = document.querySelectorAll(".book-item");
  
    filterForm.addEventListener("change", function () {
      const selectedFilters = Array.from(
        filterForm.querySelectorAll('input[type="checkbox"]:checked')
      ).map((cb) => cb.value);
  
      bookItems.forEach((item) => {
        const itemPrice = item.getAttribute("data-price");
        if (selectedFilters.length === 0 || selectedFilters.includes(itemPrice)) {
          item.style.display = "block";
        } else {
          item.style.display = "none";
        }
      });
    });
  });
  