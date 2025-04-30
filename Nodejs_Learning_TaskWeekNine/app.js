const express = require('express');
const fs = require('fs');
const bodyParser = require('body-parser');
const app = express();
const PORT = 3000;

app.use(express.static('public'));
app.use(bodyParser.urlencoded({ extended: true }));
app.set('view engine', 'ejs');

// Route untuk form
app.get('/', (req, res) => {
  res.render('form');
});

// Route saat form disubmit
app.post('/submit', (req, res) => {
  const data = req.body;
  const content = `
Nama: ${data.nama}
NRP: ${data.nrp}
Kelas: ${data.kelas}
Jenis Kelamin: ${data.jenis_kelamin}
Agama: ${data.agama}
Tempat/Tanggal Lahir: ${data.tempat_lahir} / ${data.tanggal_lahir}
Alamat: ${data.alamat}
Riwayat Pendidikan:
- SD : ${data.sd}
- SMP: ${data.smp}
- SMA: ${data.sma}
Email: ${data.email}
Homepage: ${data.homepage}
Hobby: ${data.hobby}
Interest: ${data.interest?.join(', ')}
----------------------------
`;

  fs.appendFile('data.txt', content, err => {
    if (err) return res.send('Gagal menyimpan data!');
    res.redirect('/success');
  });
});

// Halaman sukses
app.get('/success', (req, res) => {
  res.render('success');
});

app.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});
