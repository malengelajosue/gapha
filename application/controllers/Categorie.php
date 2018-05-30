<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorie extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
          if (!isset($_SESSION['user'])) {
            redirect(base_url().'login');
        }
        else if ($_SESSION['user'] == null) {
            redirect(base_url() . 'login');
        } else if ($_SESSION['user']->idType != 1) {
            redirect(base_url() . 'achat');
        }
        $this->load->model('Categorie_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'categorie/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'categorie/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'categorie/index.html';
            $config['first_url'] = base_url() . 'categorie/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Categorie_model->total_rows($q);
        $categorie = $this->Categorie_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'categorie_data' => $categorie,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
            $page=$this->load->view('categorie/categorie_list', $data,true);
        $this->load->view('dashboard/admin', ['page'=>$page]);
    }

    public function read($id) 
    {
        $row = $this->Categorie_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nom' => $row->nom,
		'description' => $row->description,
	    );
            $page=$this->load->view('categorie/categorie_read', $data,true);
            $this->load->view('dashboard/admin', ['page'=>$page]);
            
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categorie'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('categorie/create_action'),
	    'id' => set_value('id'),
	    'nom' => set_value('nom'),
	    'description' => set_value('description'),
	);
        $page=$this->load->view('categorie/categorie_form', $data,true);
        $this->load->view('dashboard/admin', ['page'=>$page]);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nom' => $this->input->post('nom',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Categorie_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('categorie'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Categorie_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('categorie/update_action'),
		'id' => set_value('id', $row->id),
		'nom' => set_value('nom', $row->nom),
		'description' => set_value('description', $row->description),
	    );
            $page=$this->load->view('categorie/categorie_form', $data,true);
            $this->load->view('dashboard/admin', ['page'=>$page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categorie'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nom' => $this->input->post('nom',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Categorie_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('categorie'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Categorie_model->get_by_id($id);

        if ($row) {
            $this->Categorie_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('categorie'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categorie'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nom', 'nom', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "categorie.xls";
        $judul = "categorie";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nom");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");

	foreach ($this->Categorie_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nom);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=categorie.doc");

        $data = array(
            'categorie_data' => $this->Categorie_model->get_all(),
            'start' => 0
        );
        
        $page=$this->load->view('categorie/categorie_doc',$data,true);
        $this->load->view('dashboard/admin', ['page'=>$page]);
    }

}

/* End of file Categorie.php */
/* Location: ./application/controllers/Categorie.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-19 15:29:33 */
/* http://harviacode.com */