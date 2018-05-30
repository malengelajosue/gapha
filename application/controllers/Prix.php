<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prix extends CI_Controller
{   private $article;
    function __construct()
    {
        parent::__construct();
          if (!isset($_SESSION['user'])) {
            redirect(base_url().'/login');
        }else if ($_SESSION['user'] == null) {
            redirect(base_url() . 'login');
        } else if ($_SESSION['user']->idType != 1) {
            redirect(base_url() . 'achat');
        }
        $this->load->model('PrixArticle_model');
        $this->load->model('Article_model');
        $this->load->library('form_validation');
        $this->article=new Article_model();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'prixarticle/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'prixarticle/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'prixarticle/index.html';
            $config['first_url'] = base_url() . 'prixarticle/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->PrixArticle_model->total_rows($q);
        $prixarticle = $this->PrixArticle_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'prixarticle_data' => $prixarticle,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $page=$this->load->view('prixarticle/prixArticle_list', $data,true);
        $this->load->view('dashboard/admin',['page'=>$page]);
    }

    public function read($id) 
    {
        $row = $this->PrixArticle_model->get_by_id_v($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idArticle' => $row->idArticle,
		'prix' => $row->prix,
		'dateFixation' => $row->dateFixation,
	    );
            $page=$this->load->view('prixarticle/prixArticle_read', $data,true);
               $this->load->view('dashboard/admin',['page'=>$page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prixarticle'));
        }
    }

    public function create() 
    {
        $listeArticle=$this->article->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('prix/create_action'),
	    'id' => set_value('id'),
	    'idArticle' => set_value('idArticle'),
	    'prix' => set_value('prix'),
	    'dateFixation' => set_value('dateFixation'),
            'listeArticles'=>$listeArticle
	);
   
        $page=$this->load->view('prixarticle/prixArticle_form', $data,true);
           $this->load->view('dashboard/admin',['page'=>$page]);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $prix =$this->input->post('prix',TRUE);
            $id=$this->input->post('idArticle',TRUE);

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idArticle' => $id,
		'prix' => $prix,
		
	    );

            $this->PrixArticle_model->insert($data);
            //mise a jour de l'article
        
            $this->article->update($id, array(
                'prix'=>$prix
            ));
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('prix'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->PrixArticle_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('prix/update_action'),
		'id' => set_value('id', $row->id),
		'idArticle' => set_value('idArticle', $row->idArticle),
		'prix' => set_value('prix', $row->prix),
		'dateFixation' => set_value('dateFixation', $row->dateFixation),
	    );
            $page=$this->load->view('prixarticle/prixArticle_form', $data,true);
               $this->load->view('dashboard/admin',['page'=>$page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prix'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idArticle' => $this->input->post('idArticle',TRUE),
		'prix' => $this->input->post('prix',TRUE),
		
	    );

            $this->PrixArticle_model->update($this->input->post('id', TRUE), $data,true);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('prix'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->PrixArticle_model->get_by_id($id);

        if ($row) {
            $this->PrixArticle_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('prix'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prix'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idArticle', 'idarticle', 'trim|required');
	$this->form_validation->set_rules('prix', 'prix', 'trim|required|numeric');
	$this->form_validation->set_rules('dateFixation', 'datefixation', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "prixArticle.xls";
        $judul = "prixArticle";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Prix");
	xlsWriteLabel($tablehead, $kolomhead++, "DateFixation");

	foreach ($this->PrixArticle_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idArticle);
	    xlsWriteNumber($tablebody, $kolombody++, $data->prix);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dateFixation);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=prixArticle.doc");

        $data = array(
            'prixArticle_data' => $this->PrixArticle_model->get_all(),
            'start' => 0
        );
        
        $page=$this->load->view('prix/prixArticle_doc',$data);
           $this->load->view('dashboard/admin',['page'=>$page]);
    }

}

/* End of file PrixArticle.php */
/* Location: ./application/controllers/PrixArticle.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-19 15:29:33 */
/* http://harviacode.com */