const fs = require('fs-extra');

// Hapus semua file di direktori tujuan
fs.emptyDirSync('berkas/build');

// Copy seluruh file dari direktori asal ke direktori tujuan
fs.copySync('public/build', 'berkas/build');
fs.copySync('public/sitemap.xml', 'berkas/sitemap.xml');
fs.copySync('public/images', 'berkas/images');
fs.copySync('public/audios', 'berkas/audios');
fs.copySync('public/robots.txt', 'berkas/robots.txt');
