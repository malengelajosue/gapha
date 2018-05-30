<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fournisseur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
          if (!isset($_SESSION['user'])) {
            redirect(base_url().'/login');
        }
        else if ($_SESSION['user'] == null) {
            redirect(base_url() . 'login');
        } else if ($_SESSION['user']->idType != 1) {
            redirect(base_url() . 'achat');
        }
        $this->load->model('Fournisseur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'fournisseur/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'fournisseur/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'fournisseur/index.html';
            $config['first_url'] = base_url() . 'fournisseur/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Fournisseur_model->total_rows($q);
        $fournisseur = $this->Fournisseur_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'fournisseur_data' => $fournisseur,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $page=$this->load->view('fournisseur/fournisseur_list',$data,true);
        $this->load->view('dashboard/admin',['page'=>$page]);
    }

    public function read($id) 
    {
        $row = $this->Fournisseur_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nom' => $row->nom,
		'tel' => $row->tel,
		'email' => $row->email,
		'adresse' => $row->adresse,
		'nomResponsable' => $row->nomResponsable,
	    );
            $page=$this->load->view('fournisseur/fournisseur_read',$data,true);
            $this->load->view('dashboard/admin',['page'=>$page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fournisseur'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('fournisseur/create_action'),
	    'id' => set_value('id'),
	    'nom' => set_value('nom'),
	    'tel' => set_value('tel'),
	    'email' => set_value('email'),
	    'adresse' => set_value('adresse'),
	    'nomResponsable' => set_value('nomResponsable'),
	);
        $page=$this->load->view('fournisseur/fournisseur_form',$data,true);
        $this->load->view('dashboard/admin',['page'=>$page]);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nom' => $this->input->post('nom',TRUE),
		'tel' => $this->input->post('tel',TRUE),
		'email' => $this->input->post('email',TRUE),
		'adresse' => $this->input->post('adresse',TRUE),
		'nomResponsable' => $this->input->post('nomResponsable',TRUE),
	    );

            $this->Fournisseur_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('fournisseur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Fournisseur_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fournisseur/update_action'),
		'id' => set_value('id', $row->id),
		'nom' => set_value('nom', $row->nom),
		'tel' => set_value('tel', $row->tel),
		'email' => set_value('email', $row->email),
		'adresse' => set_value('adresse', $row->adresse),
		'nomResponsable' => set_value('nomResponsable', $row->nomResponsable),
	    );
            $page=$this->load->view('fournisseur/fournisseur_form',$data,true);
            $this->load->view('dashboard/admin',['page'=>$page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fournisseur'));
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
		'tel' => $this->input->post('tel',TRUE),
		'email' => $this->input->post('email',TRUE),
		'adresse' => $this->input->post('adresse',TRUE),
		'nomResponsable' => $this->input->post('nomResponsable',TRUE),
	    );

            $this->Fournisseur_model->update($this->input->post('id', TRUE),$data,true);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('fournisseur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Fournisseur_model->get_by_id($id);

        if ($row) {
            $this->Fournisseur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('fournisseur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fournisseur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nom', 'nom', 'trim|required');
	$this->form_validation->set_rules('tel', 'tel', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('adresse', 'adresse', 'trim|required');
	$this->form_validation->set_rules('nomResponsable', 'nomresponsable', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "fournisseur.xls";
        $judul = "fournisseur";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tel");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Adresse");
	xlsWriteLabel($tablehead, $kolomhead++, "NomResponsable");

	foreach ($this->Fournisseur_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nom);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->adresse);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomResponsable);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=fournisseur.doc");

        $data = array(
            'fournisseur_data' => $this->Fournisseur_model->get_all(),
            'start' => 0
        );
        
        $page=$this->load->view('fournisseur/fournisseur_doc',$data);
        $this->load->view('dashboard/admin',['page'=>$page]);
    }

}

/* End of file Fournisseur.php */
/* Location: ./application/controllers/Fournisseur.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-19 15:29:33 */
/* http://harviacode.com */