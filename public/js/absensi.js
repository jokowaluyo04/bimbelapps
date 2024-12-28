// public/js/absensi.js

function openAbsensiModal() {
    // Logika untuk membuka modal absensi
    document.getElementById('modalAbsensi').classList.remove('hidden');
}

function closeAbsensiModal() {
    // Logika untuk menutup modal absensi
    document.getElementById('modalAbsensi').classList.add('hidden');
}

function handleAbsensiSubmit(event) {
    event.preventDefault();
    // Ambil data dari form dan kirim ke server
    const formData = new FormData(event.target);
    // Lakukan pengiriman data menggunakan fetch atau AJAX
    alert('Data absensi berhasil disimpan!');
    closeAbsensiModal();
}
