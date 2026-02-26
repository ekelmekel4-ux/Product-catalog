<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      margin: 0;
      padding: 40px 20px;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      width: 100%;
      max-width: 700px;
      position: relative;
    }

    .card {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
      padding: 60px 30px 30px 30px;
      position: relative;
      z-index: 1;
    }

    .card-header {
      position: absolute;
      top: -30px;
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(135deg, #000, #222);
      color: white;
      padding: 14px 30px;
      font-size: 18px;
      font-weight: 600;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      text-align: center;
      width: 90%;
      z-index: 2;
    }

    label {
      font-size: 14px;
      color: #555;
      margin-top: 20px;
      display: block;
    }

    input[type="text"],
    textarea {
      width: 100%;
      padding: 12px;
      font-size: 15px;
      border: none;
      border-bottom: 2px solid #ccc;
      background: transparent;
      margin-top: 6px;
      transition: 0.3s;
    }

    input[type="text"]:focus,
    textarea:focus {
      border-bottom: 2px solid #000;
      outline: none;
    }

    input[type="file"] {
      margin-top: 12px;
    }

    .actions {
      margin-top: 30px;
      display: flex;
      justify-content: flex-start;
      gap: 12px;
    }

    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      font-size: 14px;
      color: white;
      cursor: pointer;
      transition: 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-save {
      background-color: #000;
    }

    .btn-save:hover {
      background-color: #333;
    }

    .btn-back {
      background-color: #e53935;
    }

    .btn-back:hover {
      background-color: #c62828;
    }

    .btn i {
      margin-right: 6px;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="card">
      <div class="card-header">📝 Add New Product</div>
      <form action="<?= base_url('index.php/product/insert'); ?>" method="post" enctype="multipart/form-data">
        <label for="nama">Jenis Produk</label>
        <input type="text" id="nama" name="nama" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>

        <label for="image">Gambar</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <div class="actions">
          <button type="submit" class="btn btn-save">💾 Save</button>
          <a href="<?= base_url('index.php/product'); ?>" class="btn btn-back">🔙 Back</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
