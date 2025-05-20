const pool = require('../config/database');

class Mahasiswa {
  // Ambil semua data mahasiswa
  static async getAll() {
    try {
      const [rows] = await pool.query('SELECT * FROM mahasiswa ORDER BY id DESC');
      return rows;
    } catch (error) {
      throw error;
    }
  }

  // Ambil data mahasiswa berdasarkan ID
  static async getById(id) {
    try {
      const [rows] = await pool.query('SELECT * FROM mahasiswa WHERE id = ?', [id]);
      return rows[0];
    } catch (error) {
      throw error;
    }
  }

  // Tambah data mahasiswa baru
  static async create(mahasiswaData) {
    try {
      // Convert interest array to JSON string if needed
      if (Array.isArray(mahasiswaData.interest)) {
        mahasiswaData.interest = JSON.stringify(mahasiswaData.interest);
      } else if (!mahasiswaData.interest) {
        mahasiswaData.interest = '[]';
      }

      const query = `
        INSERT INTO mahasiswa 
        (nama, nrp, kelas, jenis_kelamin, agama, tempat_lahir, tanggal_lahir, 
        alamat, sd, smp, sma, email, homepage, hobby, interest) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
      `;

      const [result] = await pool.query(query, [
        mahasiswaData.nama,
        mahasiswaData.nrp,
        mahasiswaData.kelas,
        mahasiswaData.jenis_kelamin,
        mahasiswaData.agama,
        mahasiswaData.tempat_lahir,
        mahasiswaData.tanggal_lahir,
        mahasiswaData.alamat,
        mahasiswaData.sd,
        mahasiswaData.smp,
        mahasiswaData.sma,
        mahasiswaData.email,
        mahasiswaData.homepage,
        mahasiswaData.hobby,
        mahasiswaData.interest
      ]);

      return result.insertId;
    } catch (error) {
      throw error;
    }
  }

  // Update data mahasiswa
  static async update(id, mahasiswaData) {
    try {
      // Convert interest array to JSON string if needed
      if (Array.isArray(mahasiswaData.interest)) {
        mahasiswaData.interest = JSON.stringify(mahasiswaData.interest);
      } else if (!mahasiswaData.interest) {
        mahasiswaData.interest = '[]';
      }

      const query = `
        UPDATE mahasiswa 
        SET nama = ?, nrp = ?, kelas = ?, jenis_kelamin = ?, agama = ?, 
            tempat_lahir = ?, tanggal_lahir = ?, alamat = ?, sd = ?, smp = ?, 
            sma = ?, email = ?, homepage = ?, hobby = ?, interest = ?
        WHERE id = ?
      `;

      const [result] = await pool.query(query, [
        mahasiswaData.nama,
        mahasiswaData.nrp,
        mahasiswaData.kelas,
        mahasiswaData.jenis_kelamin,
        mahasiswaData.agama,
        mahasiswaData.tempat_lahir,
        mahasiswaData.tanggal_lahir,
        mahasiswaData.alamat,
        mahasiswaData.sd,
        mahasiswaData.smp,
        mahasiswaData.sma,
        mahasiswaData.email,
        mahasiswaData.homepage,
        mahasiswaData.hobby,
        mahasiswaData.interest,
        id
      ]);

      return result.affectedRows;
    } catch (error) {
      throw error;
    }
  }

  // Delete data mahasiswa
  static async delete(id) {
    try {
      const [result] = await pool.query('DELETE FROM mahasiswa WHERE id = ?', [id]);
      return result.affectedRows;
    } catch (error) {
      throw error;
    }
  }
}

module.exports = Mahasiswa;