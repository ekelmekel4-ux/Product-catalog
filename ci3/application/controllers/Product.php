<?php
class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Model_product');
        $this->load->library('upload');
        $this->load->library('session'); // pastikan ini ada
    }

    public function index()
    {
        $data['produk'] = $this->Model_product->get_all();
        $this->load->view('view_product', $data);
    }

    public function add()
    {
        $this->load->view('add_product');
    }

    public function insert()
    {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 5120;
        $config['file_name'] = uniqid();

        $this->upload->initialize($config);

        $image_url = null;
        if (!empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image_url = 'assets/uploads/' . $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors('', ''));
                redirect('product');
                return;
            }
        }

        $data = [
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'image_url' => $image_url,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Model_product->insert($data)) {
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan produk.');
        }

        redirect('product');
    }

    public function edit($id)
    {
        $data['produk'] = $this->Model_product->get_by_id($id);
        $this->load->view('edit_product', $data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $produk = $this->Model_product->get_by_id($id);
        $image_url = $produk->image_url;

        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        $config['file_name'] = uniqid();

        $this->upload->initialize($config);

        if (!empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $image_url = 'assets/uploads/' . $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', 'Gagal upload gambar: ' . $this->upload->display_errors('', ''));
                redirect('product');
                return;
            }
        }

        $data = [
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'image_url' => $image_url,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Model_product->update($id, $data)) {
            $this->session->set_flashdata('success', 'Produk berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui produk.');
        }

        redirect('product');
    }

    public function delete($id)
    {
        if ($this->Model_product->delete($id)) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus produk.');
        }

        redirect('product');
    }
}
