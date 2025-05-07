const express = require('express');
const router = express.Router();
const mahasiswaController = require('../controllers/mahasiswaController');

// Routing untuk operasi CRUD mahasiswa
router.get('/', mahasiswaController.index); // GET /mahasiswa/
router.get('/add', mahasiswaController.showAddForm); // GET /mahasiswa/add
router.post('/', mahasiswaController.addMahasiswa); // POST /mahasiswa
router.get('/:id', mahasiswaController.showMahasiswa); // GET /mahasiswa/:id
router.get('/:id/edit', mahasiswaController.showEditForm); // GET /mahasiswa/:id/edit
router.put('/:id', mahasiswaController.updateMahasiswa); // PUT /mahasiswa/:id
router.delete('/:id', mahasiswaController.deleteMahasiswa); // DELETE /mahasiswa/:id

module.exports = router;