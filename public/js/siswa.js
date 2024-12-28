// public/js/siswa.js

function showSiswaDetail(nama, nis, kelas, alamat) {
    const detailContent = `
        <h3 class="text-lg font-semibold text-gray-800">${nama}</h3>
        <p class="text-sm text-gray-600">NIS: ${nis}</p>
        <p class="text-sm text-gray-600">Kelas: ${kelas}</p>
        <p class="text-sm text-gray-600">Alamat: ${alamat}</p>
    `;
    document.getElementById('siswaDetailContent').innerHTML = detailContent;
    openModal('modalSiswaDetail');
}

function printSiswaRaport(nama) {
    alert('Fitur cetak raport untuk ' + nama + ' sedang dalam pengembangan.');
}
