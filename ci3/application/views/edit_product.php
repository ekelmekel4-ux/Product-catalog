<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
  <!-- Font Awesome CDN for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: #f2efef;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .container {
      width: 100%;
      max-width: 650px;
      position: relative;
    }

    .card {
      background: #fbfbfa;
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.07);
      padding: 60px 30px 30px;
      position: relative;
    }

    .card-header {
      position: absolute;
      top: -30px;
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(135deg, #000, #000);
      color: white;
      padding: 16px 40px;
      font-size: 18px;
      font-weight: 600;
      border-radius: 10px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 70%;
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

    .preview {
      margin-top: 16px;
    }

    .preview img {
      width: 130px;
      border-radius: 8px;
    }

    .actions {
      margin-top: 30px;
      display: flex;
      justify-content: flex-start;
      gap: 10px;
    }

    .btn {
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      font-size: 14px;
      color: white;
      cursor: pointer;
      transition: 0.3s ease;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .btn-update {
      background-color: #000;
    }

    .btn-back {
      background-color: #e53935;
    }

    .btn i {
      font-size: 15px;
    }

    .btn:hover {
      transform: scale(1.03);
      opacity: 0.9;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="card-header"><i class="fas fa-edit"></i> Edit Product</div>
    <div class="card">
      <form action="<?= base_url('index.php/product/update'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $produk->id; ?>">

        <label for="nama">Nama Produk</label>
        <input type="text" id="nama" name="nama" value="<?= $produk->nama; ?>" required>

        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" required><?= $produk->deskripsi; ?></textarea>

        <label for="image">Ganti Gambar</label>
        <input type="file" id="image" name="image" accept="image/*">

        <?php if (!empty($produk->image_url)): ?>
          <div class="preview">
            <p>Gambar Saat Ini:</p>
            <img src="<?= base_url($produk->image_url); ?>" alt="Gambar Produk">
          </div>
        <?php endif; ?>

        <div class="actions">
          <button type="submit" class="btn btn-update">
            <i class="fas fa-save"></i> UPDATE
          </button>
          <a href="<?= base_url('index.php/product'); ?>" class="btn btn-back">
            <i class="fas fa-arrow-left"></i> BACK
          </a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
