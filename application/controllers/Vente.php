<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vente extends CI_Controller {

    function __construct() {
        parent::__construct();
          if (!isset($_SESSION['user'])) {
            redirect(base_url().'/login');
        }
        $this->load->model('DetailVente_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'vente/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'vente/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'vente/index.html';
            $config['first_url'] = base_url() . 'vente/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->DetailVente_model->total_rows($q);
        $detailvente = $this->DetailVente_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detailvente_data' => $detailvente,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $page = $this->load->view('detailvente/detailVente_list', $data, true);
        $this->load->view('dashboard/admin', ['page' => $page]);
    }

    public function read($id) {
        $row = $this->DetailVente_model->get_by_id_v($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'numFacture' => $row->numFacture,
                'idArticle' => $row->idArticle,
                'idClient' => $row->idClient,
                'quantite' => $row->quantite,
                'total' => $row->total,
                'idUtilisateur' => $row->idUtilisateur,
                'dateVente' => $row->dateVente,
            );
            $page = $this->load->view('detailvente/detailVente_read', $data, true);
            $this->load->view('dashboard/admin', ['page' => $page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailvente'));
        }
    }

    public function create() {
        $data = array(
            'button' => 'Create',
            'action' => site_url('vente/create_action'),
            'id' => set_value('id'),
            'numFacture' => set_value('numFacture'),
            'idArticle' => set_value('idArticle'),
            'idClient' => set_value('idClient'),
            'quantite' => set_value('quantite'),
            'total' => set_value('total'),
            'dateVente' => set_value('dateVente'),
        );
        $page = $this->load->view('detailvente/detailVente_form', $data, true);
        $this->load->view('dashboard/admin', ['page' => $page]);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'numFacture' => $this->input->post('numFacture', TRUE),
                'idArticle' => $this->input->post('idArticle', TRUE),
                'idClient' => $this->input->post('idClient', TRUE),
                'quantite' => $this->input->post('quantite', TRUE),
                'total' => $this->input->post('total', TRUE),
                'idUtilisateur' => $this->session->user->id,
                'dateVente' => $this->input->post('dateVente', TRUE),
            );

            $this->DetailVente_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            //redirect(site_url('vente'));
        }
    }

    public function update($id) {
        $row = $this->DetailVente_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('vente/update_action'),
                'id' => set_value('id', $row->id),
                'numFacture' => set_value('numFacture', $row->numFacture),
                'idArticle' => set_value('idArticle', $row->idArticle),
                'idClient' => set_value('idClient', $row->idClient),
                'quantite' => set_value('quantite', $row->quantite),
                'total' => set_value('total', $row->total),
                'dateVente' => set_value('dateVente', $row->dateVente),
            );
            $page = $this->load->view('vente/detailVente_form', $data, true);
            $this->load->view('dashboard/admin', ['page' => $page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detailvente'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'numFacture' => $this->input->post('numFacture', TRUE),
                'idArticle' => $this->input->post('idArticle', TRUE),
                'idClient' => $this->input->post('idClient', TRUE),
                'quantite' => $this->input->post('quantite', TRUE),
                'total' => $this->input->post('total', TRUE),
                'dateVente' => $this->input->post('dateVente', TRUE),
            );

            $this->DetailVente_model->update($this->input->post('id', TRUE), $data, true);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('vente'));
        }
    }

    public function delete($id) {
        $row = $this->DetailVente_model->get_by_id($id);

        if ($row) {
            $this->DetailVente_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('vente'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vente'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('numFacture', 'numfacture', 'trim|required');
        $this->form_validation->set_rules('idArticle', 'idarticle', 'trim|required');
        $this->form_validation->set_rules('idClient', 'idclient', 'trim|required');
        $this->form_validation->set_rules('quantite', 'quantite', 'trim|required');
        $this->form_validation->set_rules('total', 'total', 'trim|required|numeric');
        $this->form_validation->set_rules('dateVente', 'datevente', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "detailVente.xls";
        $judul = "detailVente";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "NumFacture");
        xlsWriteLabel($tablehead, $kolomhead++, "IdArticle");
        xlsWriteLabel($tablehead, $kolomhead++, "IdClient");
        xlsWriteLabel($tablehead, $kolomhead++, "Quantite");
        xlsWriteLabel($tablehead, $kolomhead++, "Total");
        xlsWriteLabel($tablehead, $kolomhead++, "DateVente");

        foreach ($this->DetailVente_model->get_all_v() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->numFacture);
            xlsWriteLabel($tablebody, $kolombody++, $data->idArticle);
            xlsWriteLabel($tablebody, $kolombody++, $data->idClient);
            xlsWriteNumber($tablebody, $kolombody++, $data->quantite);
            xlsWriteNumber($tablebody, $kolombody++, $data->total);
            xlsWriteLabel($tablebody, $kolombody++, $data->idUtilisateur);
            xlsWriteLabel($tablebody, $kolombody++, $data->dateVente);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=detailVente.doc");

        $data = array(
            'detailVente_data' => $this->DetailVente_model->get_all(),
            'start' => 0
        );

        $page = $this->load->view('detailvente/detailVente_doc', $data);
        $this->load->view('dashboard/admin', ['page' => $page]);
    }

}

/* End of file DetailVente.php */
/* Location: ./application/controllers/DetailVente.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-19 15:29:33 */
/* http://harviacode.com */