<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Approvisionnement extends CI_Controller {

    private $article;

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user'])) {
            redirect(base_url() . '/login');
        } else if ($_SESSION['user'] == null) {
            redirect(base_url() . '/login');
        } else if ($_SESSION['user']->idType != 1) {
            redirect(base_url() . '/achat');
        }
        $this->load->model('Approvisionnement_model');
        $this->load->model('Article_model');
        $this->load->library('form_validation');
        $this->article = new Article_model();
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'approvisionnement/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'approvisionnement/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'approvisionnement/index.html';
            $config['first_url'] = base_url() . 'approvisionnement/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Approvisionnement_model->total_rows($q);
        $approvisionnement = $this->Approvisionnement_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'approvisionnement_data' => $approvisionnement,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $page = $this->load->view('approvisionnement/approvisionnement_list', $data, true);
        $this->load->view('dashboard/admin', ['page' => $page]);
    }

    public function read($id) {
        $row = $this->Approvisionnement_model->get_by_id_v($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'idArticle' => $row->idArticle,
                'idUtilisateur' => $row->idUtilisateur,
                'quantite' => $row->quantite,
                'dateAppro' => $row->dateAppro,
            );
            $page = $this->load->view('approvisionnement/approvisionnement_read', $data, true);
            $this->load->view('dashboard/admin', ['page' => $page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('approvisionnement'));
        }
    }

    public function create() {
        $listeArticles = $this->article->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('approvisionnement/create_action'),
            'id' => set_value('id'),
            'idArticle' => set_value('idArticle'),
           
            'quantite' => set_value('quantite'),
            'dateAppro' => set_value('dateAppro'),
            'listeArticles' => $listeArticles
        );
        $page = $this->load->view('approvisionnement/approvisionnement_form', $data, true);
        $this->load->view('dashboard/admin', ['page' => $page]);
    }

    public function create_action() {
        $this->_rules();
        $user=$this->session->user;
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'idArticle' => $this->input->post('idArticle', TRUE),
                'idUtilisateur' => $user->id,
                'quantite' => $this->input->post('quantite', TRUE),
            );
            //mise a jour de l'article 
            $idArtcle = $this->input->post('idArticle', TRUE);
            $quantite = $this->input->post('quantite', TRUE);
            $stockArticle = $this->article->get_by_id($idArtcle)->stock;
            //var_dump($idArtcle.'-'.$stockArticle).die();
            $this->article->update($idArtcle, array(
                'id' => $idArtcle,
                'stock' => $stockArticle + $quantite
            ));
            $this->Approvisionnement_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('approvisionnement'));
        }
    }

    public function update($id) {
        $row = $this->Approvisionnement_model->get_by_id($id);
        $listeArticles = $this->article->get_all();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('approvisionnement/update_action'),
                'id' => set_value('id', $row->id),
                'idArticle' => set_value('idArticle', $row->idArticle),
                'idUtilisateur' => set_value('idUtilisateur', $row->idUtilisateur),
                'quantite' => set_value('quantite', $row->quantite),
                'dateAppro' => set_value('dateAppro', $row->dateAppro),
                'listeArticles' => $listeArticles
            );
            $page = $this->load->view('approvisionnement/approvisionnement_form', $data, true);
            $this->load->view('dashboard/admin', ['page' => $page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('approvisionnement'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'idArticle' => $this->input->post('idArticle', TRUE),
                'idUtilisateur' => $this->input->post('idUtilisateur', TRUE),
                'quantite' => $this->input->post('quantite', TRUE),
            );

            $this->Approvisionnement_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('approvisionnement'));
        }
    }

    public function delete($id) {
        $row = $this->Approvisionnement_model->get_by_id($id);

        if ($row) {
            $this->Approvisionnement_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('approvisionnement'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('approvisionnement'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('idArticle', 'idarticle', 'trim|required');
        $this->form_validation->set_rules('idUtilisateur', 'idutilisateur', 'trim');
        $this->form_validation->set_rules('quantite', 'quantite', 'trim|required');
        $this->form_validation->set_rules('dateAppro', 'dateappro', 'trim');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "approvisionnement.xls";
        $judul = "approvisionnement";
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
        xlsWriteLabel($tablehead, $kolomhead++, "IdArticle");
        xlsWriteLabel($tablehead, $kolomhead++, "IdUtilisateur");
        xlsWriteLabel($tablehead, $kolomhead++, "Quantite");
        xlsWriteLabel($tablehead, $kolomhead++, "DateAppro");

        foreach ($this->Approvisionnement_model->get_all_v() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->idArticle);
            xlsWriteLabel($tablebody, $kolombody++, $data->idUtilisateur);
            xlsWriteNumber($tablebody, $kolombody++, $data->quantite);
            xlsWriteLabel($tablebody, $kolombody++, $data->dateAppro);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=approvisionnement.doc");

        $data = array(
            'approvisionnement_data' => $this->Approvisionnement_model->get_all(),
            'start' => 0
        );

        $page = $this->load->view('approvisionnement/approvisionnement_doc', $data, true);
        $this->load->view('dashboard/admin', ['page' => $page]);
    }

}

/* End of file Approvisionnement.php */
/* Location: ./application/controllers/Approvisionnement.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-19 15:29:33 */
/* http://harviacode.com */