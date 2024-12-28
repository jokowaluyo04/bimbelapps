// public/js/manajemen_akun.js

function showModal() {
    document.getElementById('modalTitle').textContent = 'Tambah Akun Baru';
    document.getElementById('accountForm').reset();
    document.getElementById('accountModal').classList.remove('hidden');
}

function showEditModal(user) {
    document.getElementById('modalTitle').textContent = 'Edit Akun';
    document.getElementById('nama').value = user.nama;
    document.getElementById('username').value = user.username;
    document.getElementById('role').value = user.role;
    document.getElementById('status').value = user.status;
    document.getElementById('password').value = '';
    document.getElementById('accountModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('accountModal').classList.add('hidden');
}

function deleteUser(userId) {
    if (confirm('Apakah Anda yakin ingin menghapus akun ini?')) {
        // Tambahkan fungsi AJAX untuk menghapus akun di sini
        alert('Akun dengan ID ' + userId + ' akan dihapus.');
    }
}
