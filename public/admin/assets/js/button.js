// JavaScript
const yearButtons = document.querySelectorAll('.btn-year');

yearButtons.forEach(button => {
    button.addEventListener('click', () => {
        yearButtons.forEach(btn => {
            btn.classList.remove('active'); // Hapus kelas 'active' dari semua tombol
        });
        button.classList.add('active'); // Tambahkan kelas 'active' pada tombol yang dipilih
    });
});
