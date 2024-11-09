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