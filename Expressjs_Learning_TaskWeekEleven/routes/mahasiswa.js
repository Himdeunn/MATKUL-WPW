const express = require('express');
const router = express.Router();
const Mahasiswa = require('../models/mahasiswa');

// GET - Halaman daftar mahasiswa
router.get('/', async (req, res) => {
  try {
    const mahasiswas = await Mahasiswa.getAll();
    res.render('index', { mahasiswas });
  } catch (error) {
    console.error(error);
    res.status(500).render('error', { message: 'Terjadi kesalahan saat mengambil data' });
  }
});

// GET - Halaman tambah mahasiswa
router.get('/add', (req, res) => {
  res.render('add');
});

// POST - Tambah mahasiswa baru
router.post('/add', async (req, res) => {
  try {
    const {
      nama, nrp, kelas, jenis_kelamin, agama, tempat_lahir, tanggal_lahir,
      alamat, sd, smp, sma, email, homepage, hobby
    } = req.body;

    // Process interest checkboxes
    const interest = [];
    if (req.body.interest_komputer) interest.push('Komputer');
    if (req.body.interest_sport) interest.push('Sport');
    if (req.body.interest_travelling) interest.push('Travelling');
    if (req.body.interest_writing) interest.push('Writing');
    if (req.body.interest_reading) interest.push('Reading');

    await Mahasiswa.create({
      nama, nrp, kelas, jenis_kelamin, agama, tempat_lahir, tanggal_lahir,
      alamat, sd, smp, sma, email, homepage, hobby, interest
    });

    res.redirect('/');
  } catch (error) {
    console.error(error);
    res.status(500).render('error', { message: 'Terjadi kesalahan saat menyimpan data' });
  }
});

// GET - Halaman edit mahasiswa
router.get('/edit/:id', async (req, res) => {
  try {
    const mahasiswa = await Mahasiswa.getById(req.params.id);
    if (!mahasiswa) {
      return res.status(404).render('error', { message: 'Mahasiswa tidak ditemukan' });
    }

    // Parse interest JSON to array if it's a string
    if (typeof mahasiswa.interest === 'string') {
      try {
        mahasiswa.interest = JSON.parse(mahasiswa.interest);
      } catch (e) {
        mahasiswa.interest = [];
      }
    }

    res.render('edit', { mahasiswa });
  } catch (error) {
    console.error(error);
    res.status(500).render('error', { message: 'Terjadi kesalahan saat mengambil data' });
  }
});

// POST - Update mahasiswa
router.post('/edit/:id', async (req, res) => {
  try {
    const {
      nama, nrp, kelas, jenis_kelamin, agama, tempat_lahir, tanggal_lahir,
      alamat, sd, smp, sma, email, homepage, hobby
    } = req.body;

    // Process interest checkboxes
    const interest = [];
    if (req.body.interest_komputer) interest.push('Komputer');
    if (req.body.interest_sport) interest.push('Sport');
    if (req.body.interest_travelling) interest.push('Travelling');
    if (req.body.interest_writing) interest.push('Writing');
    if (req.body.interest_reading) interest.push('Reading');

    await Mahasiswa.update(req.params.id, {
      nama, nrp, kelas, jenis_kelamin, agama, tempat_lahir, tanggal_lahir,
      alamat, sd, smp, sma, email, homepage, hobby, interest
    });

    res.redirect('/');
  } catch (error) {
    console.error(error);
    res.status(500).render('error', { message: 'Terjadi kesalahan saat memperbarui data' });
  }
});

// GET - Delete mahasiswa
router.get('/delete/:id', async (req, res) => {
  try {
    await Mahasiswa.delete(req.params.id);
    res.redirect('/');
  } catch (error) {
    console.error(error);
    res.status(500).render('error', { message: 'Terjadi kesalahan saat menghapus data' });
  }
});

module.exports = router;