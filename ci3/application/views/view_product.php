<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>All Product</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 40px 20px;
      background-color: #f0f2f5;
    }

    .card {
      position: relative;
      width: 90%;
      max-width: 1200px;
      margin: auto;
      background: #fafafa;
      border-radius: 14px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      padding: 60px 30px 30px;
    }

    .card-header {
      position: absolute;
      top: -30px;
      left: 50%;
      width: 90%;
      transform: translateX(-50%);
      background: linear-gradient(135deg, #000, #222);
      color: white;
      padding: 14px 30px;
      font-size: 18px;
      font-weight: 600;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      text-align: center;
      letter-spacing: 0.5px;
    }

    .card-body {
      margin-top: 20px;
    }

    .add-btn {
      background-color: #000;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      display: inline-block;
      margin-bottom: 20px;
      transition: 0.2s;
    }

    .add-btn:hover {
      background-color: #333;
    }

    .message-box {
      margin-bottom: 20px;
      padding: 12px 20px;
      border-radius: 8px;
      font-weight: 500;
      font-size: 14px;
    }

    .message-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .message-error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      font-size: 15px;
    }

    th, td {
      padding: 12px 10px;
      text-align: left;
      border-bottom: 1px solid #e0e0e0;
      vertical-align: top;
    }

    tr:hover {
      background-color: #f9f9f9;
    }

    th {
      color: #000;
      font-weight: 600;
    }

    th i {
      font-style: normal;
      margin-left: 4px;
      color: #ccc;
    }

    img {
      max-height: 60px;
      border-radius: 6px;
      object-fit: cover;
    }

    .action-btn {
      display: inline-block;
      padding: 8px 14px;
      margin: 4px 4px 4px 0;
      color: white;
      border-radius: 6px;
      font-size: 13px;
      font-weight: bold;
      text-align: center;
      text-decoration: none;
      transition: 0.2s;
    }

    .edit {
      background-color: #f1c40f;
    }

    .edit:hover {
      background-color: #d4ac0d;
    }

    .delete {
      background-color: #e74c3c;
    }

    .delete:hover {
      background-color: #c0392b;
    }

    .no-data {
      text-align: center;
      padding: 20px;
      color: #777;
      font-style: italic;
    }

        tbody tr:hover {
    background-color:rgb(220, 220, 219); /* warna kuning muda saat hover */
    transition: background-color 0.2s ease;
    cursor: pointer;
    }

  </style>
</head>
<body>

  <div class="card">
    <div class="card-header">🛒 All Product</div>
    <div class="card-body">

      <a href="<?= base_url('index.php/product/add'); ?>" class="add-btn">➕ Add New</a>

      <!-- FLASH MESSAGE -->
      <?php if ($this->session->flashdata('success')): ?>
        <div class="message-box message-success">
          <?= $this->session->flashdata('success'); ?>
        </div>
      <?php elseif ($this->session->flashdata('error')): ?>
        <div class="message-box message-error">
          <?= $this->session->flashdata('error'); ?>
        </div>
      <?php endif; ?>

      <table>
        <thead>
          <tr>
            <th>ID <i>⇅</i></th>
            <th>Jenis Produk <i>⇅</i></th>
            <th>Deskripsi <i>⇅</i></th>
            <th>Gambar <i>⇅</i></th>
            <th>Created At <i>⇅</i></th>
            <th>Updated At <i>⇅</i></th>
            <th>Action <i>⇅</i></th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($produk)): ?>
            <?php foreach ($produk as $p): ?>
              <tr>
                <td><?= $p->id; ?></td>
                <td><?= $p->nama; ?></td>
                <td><?= $p->deskripsi; ?></td>
                <td>
                  <?php if (!empty($p->image_url)): ?>
                    <img src="<?= base_url($p->image_url); ?>" alt="Gambar" width="80">
                  <?php else: ?>
                    (Kosong)
                  <?php endif; ?>
                </td>
                <td><?= $p->created_at; ?></td>
                <td><?= $p->updated_at; ?></td>
                <td>
                  <a href="<?= base_url('index.php/product/edit/'.$p->id); ?>" class="action-btn edit">✏️ Edit</a>
                  <a href="<?= base_url('index.php/product/delete/'.$p->id); ?>" class="action-btn delete" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="no-data">Belum ada data produk.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

    </div>
  </div>

</body>
</html>
