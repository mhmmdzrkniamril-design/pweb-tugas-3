<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user')) {
            redirect('auth', 'refresh');
        }

        $this->load->model('ProdiModel');
        $this->load->model('FakultasModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['prodi'] = $this->ProdiModel->getAll();

        $header['title'] = 'Program Studi';

        $this->load->view('layout/header', $header);
        $this->load->view('prodi/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        $data['button']   = 'Simpan';
        $data['action']   = site_url('prodi/tambah');
        $data['fakultas'] = $this->FakultasModel->getAll();
        $data['prodi']    = [];

        $header['title'] = 'Tambah Program Studi';

        $this->form_validation->set_rules('prodi_id',     'ID Prodi',  'required|numeric');
        $this->form_validation->set_rules('fakultas_id',  'Fakultas',  'required|numeric');
        $this->form_validation->set_rules('prodi_name',   'Nama Prodi','required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('prodi_strata', 'Strata',    'required|in_list[D3,S1,S2]');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/header', $header);
            $this->load->view('prodi/form', $data);
            $this->load->view('layout/footer');

        } else {

            $insert = [
                'prodi_id'     => $this->input->post('prodi_id'),
                'fakultas_id'  => $this->input->post('fakultas_id'),
                'prodi_name'   => $this->input->post('prodi_name'),
                'prodi_strata' => $this->input->post('prodi_strata')
            ];

            $this->ProdiModel->insert($insert);
            redirect('prodi');
        }
    }

    public function ubah($id)
    {
        $prodi = $this->ProdiModel->getById($id);

        if (!$prodi) {
            redirect('prodi');
        }

        $data['button']   = 'Update';
        $data['action']   = site_url('prodi/ubah/' . $id);
        $data['prodi']    = $prodi;
        $data['fakultas'] = $this->FakultasModel->getAll();

        $header['title'] = 'Ubah Program Studi';

        $this->form_validation->set_rules('fakultas_id',  'Fakultas',  'required|numeric');
        $this->form_validation->set_rules('prodi_name',   'Nama Prodi','required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('prodi_strata', 'Strata',    'required|in_list[D3,S1,S2]');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/header', $header);
            $this->load->view('prodi/form', $data);
            $this->load->view('layout/footer');

        } else {

            $update = [
                'fakultas_id'  => $this->input->post('fakultas_id'),
                'prodi_name'   => $this->input->post('prodi_name'),
                'prodi_strata' => $this->input->post('prodi_strata')
            ];

            $this->ProdiModel->update($id, $update);
            redirect('prodi');
        }
    }

    public function hapus($id)
    {
        $this->ProdiModel->delete($id);
        redirect('prodi');
    }
}