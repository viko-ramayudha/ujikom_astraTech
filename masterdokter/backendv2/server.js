const express = require('express');
const mysql = require('mysql2');
const bodyParser = require('body-parser');
const cors = require('cors');
const bcrypt = require('bcrypt'); // For secure password hashing

const app = express();

// Middleware
app.use(bodyParser.json());
app.use(cors());

// Connect to MySQL
const db = mysql.createConnection({
  host: 'localhost',
  user: 'viko_ramayudha',
  password: 'poltek2023', // Ganti dengan password MySQL Anda
  database: 'halo_doc'
});

db.connect(err => {
  if (err) throw err;
  console.log('Connected to MySQL');
});

// app.post('/user', async (req, res) => {
//   const { username, password } = req.body;

//   // Validate empty fields
//   if (!username || !password) {
//     return res.status(400).json({ error: 'Username and password are required' });
//   }

//   try {
//     // Query user by username
//     const [rows] = await pool.query('SELECT * FROM user WHERE username = ?', [username]);
//     const user = rows[0];

//     // Check if user exists
//     if (!user) {
//       return res.status(401).json({ error: 'Invalid username or password' });
//     }

//     // Compare hashed passwords using bcrypt
//     const isPasswordValid = await bcrypt.compare(password, user.password);
//     if (!isPasswordValid) {
//       return res.status(401).json({ error: 'Invalid username or password' });
//     }

//     // Generate a JWT token (consider using a library like jsonwebtoken)
//     const token = 'your_jwt_token_generation_logic'; // Replace with actual token generation logic

//     // Respond with success and the token
//     res.json({ token });
//   } catch (err) {
//     console.error(err);
//     res.status(500).json({ error: 'Internal server error' });
//   }
// });

// CRUD Routes for Spesialisasi


app.post('/login', (req, res) => {
  const { username, password } = req.body;

  const sql = "SELECT id_user, username, password, role FROM user WHERE username = ?";
  db.query(sql, [username], async (err, results) => {
    if (err) {
      console.error('Error querying database:', err);
      return res.status(500).json({ message: 'Internal server error' });
    }

    if (results.length === 0) {
      return res.status(401).json({ message: 'Invalid email or password' });
    }

    const user = results[0];

    // Compare hashed passwords using bcrypt
    try {
      const isPasswordValid = await bcrypt.compare(password, user.password);
      if (!isPasswordValid) {
        return res.status(401).json({ message: 'Invalid email or password' });
      }

      // Password is valid, send back user information
      res.json({ id_user: user.id_user, username: user.username, role: user.role });
    } catch (error) {
      console.error('Error comparing passwords:', error);
      res.status(500).json({ message: 'Internal server error' });
    }
  });
});

app.get('/spesialisasi', (req, res) => {
  const sql = 'SELECT * FROM spesialisasi';
  db.query(sql, (err, results) => {
    if (err) throw err;
    res.json(results);
  });
});

// app.get('/spesialisasi', (req, res) => {
//   const sql = 'SELECT s.*, u.username FROM spesialisasi s LEFT JOIN user u ON s.id_spesialisasi = u.id_spesialisasi;';
//   db.query(sql, (err, results) => {
//     if (err) throw err;

//     // Process the results
//     const usersWithUsername = results.map((row) => {
//       return {
//         ...row, // Include all other columns from the 'spesialisasi' table
//         username: row.username || '-', // Assign a default value if 'username' is NULL
//       };
//     });

//     res.json(usersWithUsername);
//   });
// });

app.get('/spesialisasi/getById/:id', (req, res) => {
  const id_spesialisasi= req.params.id
  const sql = 'SELECT * FROM spesialisasi WHERE id_spesialisasi = ?';
  db.query(sql, [req.params.id], (err, results) => {
    if (err) throw err;
    res.json(results);
  });
});

app.post('/spesialisasi/create', (req, res) => {
  const {  nama_spesialisasi} = req.body;

  // Validate that required fields are present
  if ( !nama_spesialisasi) {
    return res.status(400).json({ error: 'Nama, email, and password are required fields' });
  }

  const sql = 'INSERT INTO spesialisasi (nama_spesialisasi) VALUES ( ?)';
  db.query(sql, [ nama_spesialisasi], (err, result) => {
    if (err) {
      console.error('Error inserting user:', err);
      return res.status(500).json({ error: 'Internal server error' });
    }
    
    res.json({ nama_spesialisasi });
  });
});


app.put('/spesialisasi/edit/:id', (req, res) => {
  const { nama_spesialisasi } = req.body;
  const sql = 'UPDATE spesialisasi SET nama_spesialisasi = ? WHERE id_spesialisasi = ?';
  db.query(sql, [ nama_spesialisasi, req.params.id], (err, result) => {
    if (err) throw err;
    res.json({ message: 'Spesialisasi updated' });
  });
});

app.delete('/spesialisasi/delete/:id', (req, res) => {
  const sql = 'DELETE FROM spesialisasi WHERE id_spesialisasi = ?';
  db.query(sql, [req.params.id], (err, result) => {
    if (err) throw err;
    res.json({ message: 'Data spesialisasi deleted' });
  });
});



// CRUD Routes for Dokter

app.get('/user', (req, res) => {
  const sql = `
    SELECT u.*, s.nama_spesialisasi,
      CASE WHEN u.role = 'doctor' THEN TRUE ELSE FALSE END AS isDoctor
    FROM user u
    LEFT JOIN spesialisasi s ON u.id_spesialisasi = s.id_spesialisasi
    WHERE u.role = 'doctor';
  `;
  db.query(sql, (err, results) => {
    if (err) throw err;

    // Process the results
    const usersWithUsername = results.map((row) => {
      return {
        ...row, // Include all other columns from the 'spesialisasi' table
        isDoctor: row.isDoctor,
        nama_spesialisasi: row.nama_spesialisasi || 'No Username', // Assign a default value if 'username' is NULL
      };
    });

    res.json(usersWithUsername);
  });
});

// app.get('/user', (req, res) => {
//   const sql = 'SELECT * FROM user';
//   db.query(sql, (err, results) => {
//     if (err) throw err;
//     res.json(results);
//   });
// });

app.get('/user/getById/:id', (req, res) => {
  const id_user= req.params.id
  const sql = 'SELECT * FROM user WHERE id_user = ?';
  db.query(sql, [req.params.id], (err, results) => {
    if (err) throw err;
    res.json(results);
  });
});

app.post('/user/create', (req, res) => {
  const { username, email, password, role, id_spesialisasi} = req.body;

  // Validate that required fields are present
  if (!username || !email || !password || !role || !id_spesialisasi) {
    return res.status(400).json({ error: 'Nama, email, and password are required fields' });
  }

  const sql = 'INSERT INTO user (username, email, password, role, id_spesialisasi) VALUES (?, ?, ?, ?, ?)';
  db.query(sql, [username, email, password, role, id_spesialisasi], (err, result) => {
    if (err) {
      console.error('Error inserting user:', err);
      return res.status(500).json({ error: 'Internal server error' });
    }
    
    res.json({ username, email, password, role, id_spesialisasi });
  });
});


app.put('/user/edit/:id', (req, res) => {
  const { username, email, id_spesialisasi } = req.body;
  const sql = 'UPDATE user SET username = ?, email = ?, id_spesialisasi = ?  WHERE id_user = ?';
  db.query(sql, [ username, email, id_spesialisasi, req.params.id], (err, result) => {
    if (err) throw err;
    res.json({ message: 'Dokter updated' });
  });
});

app.delete('/user/delete/:id', (req, res) => {
  const sql = 'DELETE FROM user WHERE id_user = ?';
  db.query(sql, [req.params.id], (err, result) => {
    if (err) throw err;
    res.json({ message: 'Data dokter deleted' });
  });
});


// app.get('/transaksi', (req, res) => {
//   const sql = 'SELECT t.*, dl.nama_layanan FROM transaksi t LEFT JOIN detail_layanan dl ON t.id_layanan = dl.id_layanan;';
//   db.query(sql, (err, results) => {
//     if (err) throw err;
//     res.json(results);
//   });
// });

app.get('/transaksi', (req, res) => {
  const sql = `
    SELECT 
    t.id_trx,
    t.tgl_trx,
    t.username,
    dl.nama_layanan,
    u.username AS dokter_username,
    t.tgl_janjian,
    t.total_hrg
FROM transaksi t
LEFT JOIN detail_layanan dl ON t.id_layanan = dl.id_layanan
LEFT JOIN user u ON t.id_userr = u.id_user AND u.role = 'doctor';

  `;
  
  db.query(sql, (err, results) => {
    if (err) throw err;
    res.json(results);
  });
});
  

// Start the server
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
