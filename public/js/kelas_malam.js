// public/js/kelas_malam.js

function openKelasMalamModal() {
    document.getElementById('modalKelasMalam').classList.remove('hidden');
}

function closeKelasMalamModal() {
    document.getElementById('modalKelasMalam').classList.add('hidden');
}

function handleKelasMalamSubmit(event) {
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
        alert('Data kelas malam berhasil disimpan!');
        closeKelasMalamModal();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
