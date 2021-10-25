<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip_model extends CI_Model
{

    public function tampil_arsip()
    {
        $this->db->order_by('id_surat');
        return $this->db->from('arsip')
            ->get()
            ->result_array();
    }

    public function getSuratByID($id_surat)
    {
        return $this->db->get_where('arsip', ['id_surat' => $id_surat])->row_array();
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function tambah($data)
    {
        $this->db->insert('arsip', $data);
    }

    public function edit($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function cari_surat()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('judul', $keyword);
        return $this->db->get('arsip')->result_array();
    }
}
