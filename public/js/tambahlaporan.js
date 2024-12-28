// public/js/tambahLaporan.js

function handleSubmitLaporan(event) {
    event.preventDefault();
    // Ambil data dari form dan kirim ke server
    const formData = new FormData(event.target);
    // Lakukan pengiriman data menggunakan fetch atau AJAX
    alert('Data laporan baru berhasil ditambahkan!');
    closeModal('modalTambah');
}
