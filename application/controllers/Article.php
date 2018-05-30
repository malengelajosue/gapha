<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Article extends CI_Controller {

    private $categorie;
    private $fournisseur;

    function __construct() {
        parent::__construct();
          if (!isset($_SESSION['user'])) {
            redirect(base_url().'/login');
        }
        $this->load->model('Article_model');
        $this->load->model('Categorie_model');
        $this->load->model('Fournisseur_model');
        $this->load->library('form_validation');
        $this->categorie = new Categorie_model();
        $this->fournisseur = new Fournisseur_model();
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'article/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'article/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'article/index.html';
            $config['first_url'] = base_url() . 'article/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Article_model->total_rows($q);
        $article = $this->Article_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'article_data' => $article,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $page = $this->load->view('article/article_list', $data, true);
        $this->load->view('dashboard/admin', ['page' => $page]);
    }

    public function read($id) {
        $row = $this->Article_model->get_by_id_v($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'codeArticle' => $row->codeArticle,
                'designation' => $row->designation,
                'stock' => $row->stock,
                'idCategorie' => $row->idCategorie,
                'idFournisseur' => $row->idFournisseur,
            );
            $page = $this->load->view('article/article_read', $data, true);
            $this->load->view('dashboard/admin', ['page' => $page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('article'));
        }
    }

    public function create() {
        $categories = $this->categorie->get_all();
        $fournisseurs = $this->fournisseur->get_all();

        $data = array(
            'button' => 'Create',
            'action' => site_url('article/create_action'),
            'id' => set_value('id'),
            'codeArticle' => set_value('codeArticle'),
            'designation' => set_value('designation'),
            'stock' => set_value('stock'),
            'idCategorie' => set_value('idCategorie'),
            'idFournisseur' => set_value('idFournisseur'),
            'listeFournisseurs' => $fournisseurs,
            'listeCategories' => $categories
        );
        $page = $this->load->view('article/article_form', $data, true);
        $this->load->view('dashboard/admin', ['page' => $page]);
    }

    public function create_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'codeArticle' => $this->input->post('codeArticle', TRUE),
                'designation' => $this->input->post('designation', TRUE),
                'stock' => $this->input->post('stock', TRUE),
                'idCategorie' => $this->input->post('idCategorie', TRUE),
                'idFournisseur' => $this->input->post('idFournisseur', TRUE),
            );

            $this->Article_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('article'));
        }
    }
   


    public function update($id) {
        $row = $this->Article_model->get_by_id($id);
        $categories = $this->categorie->get_all();
        $fournisseurs = $this->fournisseur->get_all();

        if ($row) {
            $data = array(
                'button' => 'Modifier',
                'action' => site_url('article/update_action'),
                'id' => set_value('id', $row->id),
                'codeArticle' => set_value('codeArticle', $row->codeArticle),
                'designation' => set_value('designation', $row->designation),
                'stock' => set_value('stock', $row->stock),
                'listeFournisseurs' => $fournisseurs,
                'listeCategories' => $categories
            );
            $page = $this->load->view('article/article_form', $data, true);
            $this->load->view('dashboard/admin', ['page' => $page]);
        } else {
            $this->session->set_flashdata('message', 'Aucun enregistrement trouvé');
            redirect(site_url('article'));
        }
    }

    public function update_action() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'codeArticle' => $this->input->post('codeArticle', TRUE),
                'designation' => $this->input->post('designation', TRUE),
                'stock' => $this->input->post('stock', TRUE),
                'idCategorie' => $this->input->post('idCategorie', TRUE),
                'idFournisseur' => $this->input->post('idFournisseur', TRUE),
            );

            $this->Article_model->update($this->input->post('id', TRUE), $data, true);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('article'));
        }
    }

    public function delete($id) {
        $row = $this->Article_model->get_by_id($id);

        if ($row) {
            $this->Article_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('article'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('article'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('codeArticle', 'codearticle', 'trim|required');
        $this->form_validation->set_rules('designation', 'designation', 'trim|required');
        $this->form_validation->set_rules('stock', 'stock', 'trim');
        $this->form_validation->set_rules('idCategorie', 'idcategorie', 'trim|required');
        $this->form_validation->set_rules('idFournisseur', 'idfournisseur', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "article.xls";
        $judul = "article";
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
        xlsWriteLabel($tablehead, $kolomhead++, "CodeArticle");
        xlsWriteLabel($tablehead, $kolomhead++, "Designation");
        xlsWriteLabel($tablehead, $kolomhead++, "Stock");
        xlsWriteLabel($tablehead, $kolomhead++, "Categorie");
        xlsWriteLabel($tablehead, $kolomhead++, "Fournisseur");
        
        
        $datas=$this->Article_model->get_all_v();
        foreach ($datas as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->codeArticle);
            xlsWriteLabel($tablebody, $kolombody++, $data->designation);
            xlsWriteNumber($tablebody, $kolombody++, $data->stock);
            xlsWriteLabel($tablebody, $kolombody++, $data->idCategorie);
            xlsWriteLabel($tablebody, $kolombody++, $data->idFournisseur);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=article.doc");

        $data = array(
            'article_data' => $this->Article_model->get_all_v(),
            'start' => 0
        );

        $this->load->view('article/article_doc', $data);
        //$this->load->view('dashboard/admin',['page'=>$page]);
    }

}
