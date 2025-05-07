const Mahasiswa = require('../models/mahasiswaModel');

// Controller untuk menangani operasi CRUD pada mahasiswa
exports.index = async (req, res) => {
  try {
    const mahasiswaList = await Mahasiswa.getAll();
    res.render('mahasiswa/index', {
      title: 'Daftar Mahasiswa',
      mahasiswaList
    });
  } catch (error) {
    console.error('Error:', error);
    res.status(500).send('Terjadi kesalahan pada server');
  }
};

exports.showAddForm = (req, res) => {
  res.render('mahasiswa/add', {
    title: 'Tambah Mahasiswa'
  });
};

exports.addMahasiswa = async (req, res) => {
  try {
    // Mengambil data dari form
    const mahasiswaData = {
      nama: req.body.nama,
      nrp: req.body.nrp,
      kelas: req.body.kelas,
      jenis_kelamin: req.body.jenis_kelamin,
      agama: req.body.agama,
      tempat_lahir: req.body.tempat_lahir,
      tanggal_lahir: req.body.tanggal_lahir,
      alamat: req.body.alamat,
      sd: req.body.sd,
      smp: req.body.smp,
      sma: req.body.sma,
      email: req.body.email,
      homepage: req.body.homepage,
      hobby: req.body.hobby,
      interest: Array.isArray(req.body.interest) ? req.body.interest.join(',') : req.body.interest
    };

    // Menyimpan data ke database
    await Mahasiswa.create(mahasiswaData);
    
    // Redirect ke halaman daftar mahasiswa
    res.redirect('/');
  } catch (error) {
    console.error('Error:', error);
    res.status(500).send('Terjadi kesalahan pada server');
  }
};

exports.showMahasiswa = async (req, res) => {
  try {
    const id = req.params.id;
    const mahasiswa = await Mahasiswa.getById(id);
    
    if (!mahasiswa) {
      return res.status(404).send('Mahasiswa tidak ditemukan');
    }

    // Mengubah string interest menjadi array
    if (mahasiswa.interest) {
      mahasiswa.interestArray = mahasiswa.interest.split(',');
    } else {
      mahasiswa.interestArray = [];
    }

    res.render('mahasiswa/detail', {
      title: 'Detail Mahasiswa',
      mahasiswa
    });
  } catch (error) {
    console.error('Error:', error);
    res.status(500).send('Terjadi kesalahan pada server');
  }
};

exports.showEditForm = async (req, res) => {
  try {
    const id = req.params.id;
    const mahasiswa = await Mahasiswa.getById(id);
    
    if (!mahasiswa) {
      return res.status(404).send('Mahasiswa tidak ditemukan');
    }

    // Mengubah string interest menjadi array
    if (mahasiswa.interest) {
      mahasiswa.interestArray = mahasiswa.interest.split(',');
    } else {
      mahasiswa.interestArray = [];
    }

    res.render('mahasiswa/edit', {
      title: 'Edit Mahasiswa',
      mahasiswa
    });
  } catch (error) {
    console.error('Error:', error);
    res.status(500).send('Terjadi kesalahan pada server');
  }
};

exports.updateMahasiswa = async (req, res) => {
  try {
    const id = req.params.id;
    
    // Mengambil data dari form
    const mahasiswaData = {
      nama: req.body.nama,
      nrp: req.body.nrp,
      kelas: req.body.kelas,
      jenis_kelamin: req.body.jenis_kelamin,
      agama: req.body.agama,
      tempat_lahir: req.body.tempat_lahir,
      tanggal_lahir: req.body.tanggal_lahir,
      alamat: req.body.alamat,
      sd: req.body.sd,
      smp: req.body.smp,
      sma: req.body.sma,
      email: req.body.email,
      homepage: req.body.homepage,
      hobby: req.body.hobby,
      interest: Array.isArray(req.body.interest) ? req.body.interest.join(',') : req.body.interest
    };

    // Update data di database
    const success = await Mahasiswa.update(id, mahasiswaData);
    
    if (!success) {
      return res.status(404).send('Mahasiswa tidak ditemukan');
    }
    
    // Redirect ke halaman detail mahasiswa
    res.redirect(`/mahasiswa/${id}`);
  } catch (error) {
    console.error('Error:', error);
    res.status(500).send('Terjadi kesalahan pada server');
  }
};

exports.deleteMahasiswa = async (req, res) => {
  try {
    const id = req.params.id;
    const success = await Mahasiswa.delete(id);
    
    if (!success) {
      return res.status(404).send('Mahasiswa tidak ditemukan');
    }
    
    // Redirect ke halaman daftar mahasiswa
    res.redirect('/');
  } catch (error) {
    console.error('Error:', error);
    res.status(500).send('Terjadi kesalahan pada server');
  }
};