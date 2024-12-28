// public/js/kelas_sore.js

function openKelasSoreModal() {
    document.getElementById('modalKelasSore').classList.remove('hidden');
}

function closeKelasSoreModal() {
    document.getElementById('modalKelasSore').classList.add('hidden');
}

function handleKelasSoreSubmit(event) {
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
        alert('Data kelas sore berhasil disimpan!');
        closeKelasSoreModal();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
