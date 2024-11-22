document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filter-form');
    const itemsContainer = document.querySelector('.container-items');
    const items = document.querySelectorAll('.item');

    filterForm.addEventListener('change', function() {

        const checkedBoxes = Array.from(filterForm.querySelectorAll('input[type="checkbox"]:checked'))
                                 .map(checkbox => checkbox.value);

        items.forEach(item => {

            const price = parseInt(item.getAttribute('data-price'));
            let isVisible = false;

            checkedBoxes.forEach(range => {
                const [min, max] = range.split('-').map(Number);
                if (price >= min && price <= max) {
                    isVisible = true;
                }
            });

            item.style.display = isVisible || checkedBoxes.length === 0 ? 'block' : 'none';
        });
    });
});
