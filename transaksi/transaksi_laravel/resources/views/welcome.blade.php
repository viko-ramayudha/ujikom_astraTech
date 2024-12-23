<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halodoc - Official Website</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      
      background-image: url('https://cdn.myportfolio.com/18834e80-a9ef-4e79-8767-1817d931976f/5ee8fba2-8c94-4d60-bb76-684e5bd08d90_rw_1920.png?h=9aa4c035ce9b4b52a64e4a7468dad0d1');
      background-size: cover;
      background-position: center;
      height: 90vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-family: sans-serif;
      color: #fff;
      /* padding-top: 70px; */
    }

    .container {
      background-color: rgba(0, 0, 0, 0.7);
      padding: 30px;
      border-radius: 10px;
      width: 33%;
      height: 80%;
      text-align: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      margin-top:40px;
    }

    h1 {
      font-size: 3rem;
      margin-bottom: 20px;
      color: #9564da;
    }

    p {
      font-size: 1.2rem;
      line-height: 1.5;
      color: #ddd;
      margin-bottom: 30px;
      margin-top: -10px;
    }

    a {
      padding: 5px;
    }

    .button {
      padding: 10px 10px;
      background-color:  transparent;
      color: #005BAA;
      border-color: #005BAA;
      border-radius: 5px ;
      cursor: pointer;
      transition: background-color 0.3s;
      font-weight: bold;
      font-size: 15px;
    }

    .button:hover {
      background-color: #005BAA;
      border-color: #005BAA;
      color: #fff;
      border: 1px solid #005BAA;
      padding: 11px 11px;
    }

    .button-prod {
      margin-top: 28px;
      background-color: #e0004d;
      border-color: #e0004d;
      border-radius: 5px ;
      color: #fff;
      
      padding: 11px 140px;
      font-weight: bold;
      font-size: 15px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .button-prod:hover {
      padding: 11px 140px;
      background-color:  transparent;
      color: #e0004d;
      border-color: #e0004d;
      border-radius: 5px ;
      cursor: pointer;
      transition: background-color 0.3s;
      font-weight: bold;
      font-size: 15px;
    }

    .fas {
      font-size: 3rem;
      margin-bottom: 15px;
      color: #eabe1f;
    }
  </style>
</head>
<body>
  <div class="container">
  <img src="https://upload.wikimedia.org/wikipedia/id/3/39/Logo_Halodoc.png" style="height: 90px; margin-top: 20px; margin-bottom: 50px;" alt="Italian Trulli">
    <h2 style="font-size: 40px; margin-top: -20px;">Welcome to Halodoc</h2>
    <p>Pelopor ekosistem kesehatan digital dengan misi menyederhanakan akses layanan kesehatan dengan mengatasi masalah yang dialami pengguna melalui layanan yang mudah diakses, andal, dan berkualitas.</p>
    <!-- <a href="./mahasiswa/data_read.php">
      <button class="button">Data Mahasiswa</button>
    </a> -->
    <a href="{{ route('kategori.index') }}">
      <button class="button-prod">Lanjut Konsultasi</button>
    </a>
  </div>
</body>
</html>
