// public/js/laporan.js

function showDetail(nama, kelas, nilai_matematika, nilai_ipa, nilai_ppkn, nilai_bahasa_indonesia, jumlah_hadir, jumlah_tidak_hadir, catatan) {
    const detailContent = `
        <h3 class="text-lg font-semibold text-gray-800">${nama}</h3>
        <p class="text-sm text-gray-600">Kelas: ${kelas}</p>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="bg-gray-50 p-3 rounded">
                <p class="text-sm text-gray-600">Nilai Matematika: ${nilai_matematika}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded">
                <p class="text-sm text-gray-600">Nilai IPA: ${nilai_ipa}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded">
                <p class="text-sm text-gray-600">Nilai PPKN: ${nilai_ppkn}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded">
                <p class="text-sm text-gray-600">Nilai Bahasa Indonesia: ${nilai_bahasa_indonesia}</p>
            </div>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600">Jumlah Hadir: ${jumlah_hadir}</p>
            <p class="text-sm text-gray-600">Jumlah Tidak Hadir: ${jumlah_tidak_hadir}</p>
        </div>
        <div class="mb-4">
            <p class="text-sm text-gray-600 mb-1">Catatan:</p>
            <p class="text-sm text-gray-800">${catatan}</p>
        </div>
    `;
    document.getElementById('detailContent').innerHTML = detailContent;
    openModal('modalDetail');
}

function printRaport(nama) {
    alert('Fitur cetak raport untuk ' + nama + ' sedang dalam pengembangan.');
}
