// File untuk script pada sisi klien
document.addEventListener('DOMContentLoaded', function() {
  // Script untuk menangani reset form
  const resetButtons = document.querySelectorAll('button[type="reset"]');
  
  resetButtons.forEach(button => {
    button.addEventListener('click', function() {
      if (confirm('Apakah Anda yakin ingin mengosongkan form?')) {
        // Form akan direset oleh HTML native
        return true;
      } else {
        // Batalkan reset
        event.preventDefault();
      }
    });
  });
});