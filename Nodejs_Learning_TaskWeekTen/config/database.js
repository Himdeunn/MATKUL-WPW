const mysql = require('mysql2');

// Membuat koneksi ke database MySQL
const pool = mysql.createPool({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'db_mahasiswa'
});

// Membuat promise pool untuk async/await
const promisePool = pool.promise();

module.exports = promisePool;