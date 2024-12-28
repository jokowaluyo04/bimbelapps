// public/js/kelas_pagi.js

function openKelasPagiModal() {
    document.getElementById('modalKelasPagi').classList.remove('hidden');
}

function closeKelasPagiModal() {
    document.getElementById('modalKelasPagi').classList.add('hidden');
}

function handleKelasPagiSubmit(event) {
    event.preventDefault();
    // Ambil data dari form dan kirim ke server
    const formData = new FormData(event.target);
    // Kirim data ke server menggunakan fetch
    fetch('/url-ke-server', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        alert('Data kelas pagi berhasil disimpan!');
        closeKelasPagiModal();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
