const fs = require('fs-extra');

// Hapus semua file di direktori tujuan
fs.emptyDirSync('berkas/build');

// Copy seluruh file dari direktori asal ke direktori tujuan
fs.copySync('public/build', 'berkas/build');
