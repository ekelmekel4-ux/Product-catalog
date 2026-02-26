<?php
class Model_product extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta'); // ⏰ Set zona waktu ke WIB
        $this->load->model('Model_product');
    }

    // Ambil semua data produk
    function get_all()
    {
        $this->db->order_by('id', 'ASC'); // Urutkan berdasarkan ID
        return $this->db->get('products')->result();
    }

    // Ambil 1 data produk berdasarkan ID
    function get_by_id($id)
    {
        return $this->db->get_where('products', ['id' => $id])->row();
    }

    // Tambah data baru
    function insert($data)
    {
        return $this->db->insert('products', $data);
    }

    // Update data berdasarkan ID
    function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    // Hapus data berdasarkan ID
    function delete($id)
    {
        return $this->db->delete('products', ['id' => $id]);
    }
}
