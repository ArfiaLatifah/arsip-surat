<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip_surat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Arsip_model');
        $this->load->helper('download');
    }

    public function index()
    {
        $data['arsip'] = $this->Arsip_model->tampil_arsip();

        if ($this->input->post('keyword')) {
            $data['arsip'] = $this->Arsip_model->cari_surat();
        }

        $this->load->view('templates/header');
        $this->load->view('v_data_surat', $data);
        $this->load->view('templates/footer');
    }

    public function detail_surat($id_surat)
    {
        $data['arsip'] = $this->Arsip_model->getSuratByID($id_surat);

        $this->load->view('templates/header');
        $this->load->view('v_detail_surat', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id_surat)
    {
        $where = array('id_surat' => $id_surat);
        $this->Arsip_model->hapus($where, 'arsip');
        $this->session->set_flashdata('message', ' <div class="alert alert-primary" role="alert">
                        <b>Data Arsip Surat Berhasil Dihapus</b></div>');
        redirect('Arsip_surat', 'refresh');
    }

    public function form_unggah()
    {
        $this->load->view('templates/header');
        $this->load->view('v_form_unggah');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('no_surat', 'Nomor Surat', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('file_surat', 'File Surat', 'required');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 44000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_surat')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('templates/header');
            $this->load->view('v_form_unggah', $error);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'no_surat' => $this->input->post('no_surat'),
                'kategori' => $this->input->post('kategori'),
                'judul' => $this->input->post('judul'),
                'file_surat' => $this->upload->data('file_name'),
            );

            $this->Arsip_model->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                                <b>Data berhasil disimpan</b></div>');
            redirect('Arsip_surat', 'refresh');
        }
    }

    public function download($id_surat)
    {
        $data = $this->db->get_where('arsip', ['id_surat' => $id_surat])->row();
        force_download('uploads/' . $data->file_surat, NULL);
    }

    public function form_edit($id_surat)
    {
        $data['arsip'] = $this->Arsip_model->getSuratByID($id_surat);
        $data['kategori'] = ['Undangan', 'Pengumuman', 'Nota Dinas', 'Pemberitahuan'];

        $this->load->view('templates/header');
        $this->load->view('v_form_edit', $data);
        $this->load->view('templates/footer');
    }

    // public function edit($id_surat)
    // {
    //     $config['upload_path']          = './uploads/';
    //     $config['allowed_types']        = 'pdf';
    //     $config['max_size']             = 44000;

    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload('file_surat')) {
    //         $error = array('error' => $this->upload->display_errors());

    //         $this->load->view('templates/header');
    //         $this->load->view('v_form_edit', $error);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $no_surat = $this->input->post('no_surat');
    //         $kategori = $this->input->post('kategori');
    //         $judul = $this->input->post('judul');
    //         $file_surat = $this->upload->data('file_name');

    //         $data = array(
    //             'no_surat' => $no_surat,
    //             'kategori' => $kategori,
    //             'judul' => $judul,
    //             'file_surat' => $file_surat,
    //         );

    //         $where = array(
    //             'id_surat' => $id_surat
    //         );

    //         $this->Arsip_model->edit('arsip', $data, $where);
    //         $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
    //                             <b>Data berhasil diubah</b></div>');
    //         redirect('Arsip_surat', 'refresh');
    //     }
    // }

    public function edit($id_surat)
    {
        $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
        $this->form_validation->set_rules('kategori', 'kategori', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('v_form_edit');
            $this->load->view('templates/footer');
        } else {
            $no_surat = $this->input->post('no_surat');
            $kategori = $this->input->post('kategori');
            $judul = $this->input->post('judul');

            $data = array(
                'no_surat' => $no_surat,
                'kategori' => $kategori,
                'judul' => $judul,
            );

            $where = array(
                'id_surat' => $id_surat
            );

            $this->Arsip_model->edit('arsip', $data, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                                <b>Data berhasil diubah</b></div>');
            redirect('Arsip_surat', 'refresh');
        }
    }
}
