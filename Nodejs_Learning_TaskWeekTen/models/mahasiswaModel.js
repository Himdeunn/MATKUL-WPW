const db = require('../config/database');

class Mahasiswa {
  // Mendapatkan semua data mahasiswa
  static async getAll() {
    try {
      const [rows] = await db.query('SELECT * FROM mahasiswa ORDER BY created_at DESC');
      return rows;
    } catch (error) {
      throw error;
    }
  }

  // Mendapatkan data mahasiswa berdasarkan ID
  static async getById(id) {
    try {
      const [rows] = await db.query('SELECT * FROM mahasiswa WHERE id = ?', [id]);
      return rows[0];
    } catch (error) {
      throw error;
    }
  }

  // Menambahkan data mahasiswa baru
  static async create(mahasiswaData) {
    try {
      const {
        nama, nrp, kelas, jenis_kelamin, agama, tempat_lahir, tanggal_lahir,
        alamat, sd, smp, sma, email, homepage, hobby, interest
      } = mahasiswaData;

      const query = `
        INSERT INTO mahasiswa 
        (nama, nrp, kelas, jenis_kelamin, agama, tempat_lahir, tanggal_lahir,
        alamat, sd, smp, sma, email, homepage, hobby, interest, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
      `;

      const [result] = await db.query(query, [
        nama, nrp, kelas, jenis_kelamin, agama, tempat_lahir, tanggal_lahir,
        alamat, sd, smp, sma, email, homepage, hobby, interest
      ]);

      return result.insertId;
    } catch (error) {
      throw error;
    }
  }

  // Mengupdate data mahasiswa
  static async update(id, mahasiswaData) {
    try {
      const {
        nama, nrp, kelas, jenis_kelamin, agama, tempat_lahir, tanggal_lahir,
        alamat, sd, smp, sma, email, homepage, hobby, interest
      } = mahasiswaData;

      const query = `
        UPDATE mahasiswa 
        SET nama = ?, nrp = ?, kelas = ?, jenis_kelamin = ?, agama = ?, 
        tempat_lahir = ?, tanggal_lahir = ?, alamat = ?, sd = ?, smp = ?, 
        sma = ?, email = ?, homepage = ?, hobby = ?, interest = ?, 
        updated_at = NOW()
        WHERE id = ?
      `;

      const [result] = await db.query(query, [
        nama, nrp, kelas, jenis_kelamin, agama, tempat_lahir, tanggal_lahir,
        alamat, sd, smp, sma, email, homepage, hobby, interest, id
      ]);

      return result.affectedRows > 0;
    } catch (error) {
      throw error;
    }
  }

  // Menghapus data mahasiswa
  static async delete(id) {
    try {
      const [result] = await db.query('DELETE FROM mahasiswa WHERE id = ?', [id]);
      return result.affectedRows > 0;
    } catch (error) {
      throw error;
    }
  }
}

module.exports = Mahasiswa;