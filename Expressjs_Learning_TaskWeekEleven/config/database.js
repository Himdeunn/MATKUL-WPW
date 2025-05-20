const mysql = require('mysql2/promise');
require('dotenv').config();

// Buat pool koneksi MySQL
const pool = mysql.createPool({
  host: process.env.DB_HOST || 'localhost',
  user: process.env.DB_USER || 'root',
  password: process.env.DB_PASSWORD || '',
  database: process.env.DB_NAME || 'db_mahasiswa',
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0
});

// Test koneksi
async function testConnection() {
  try {
    const connection = await pool.getConnection();
    console.log('Database Connected Successfully');
    connection.release();
  } catch (error) {
    console.error('Database Connection Error:', error);
  }
}

testConnection();

module.exports = pool;