<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Utilisateur extends CI_Controller
{    private  $type;
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
        $this->load->model('Utilisateur_model');
        $this->load->model('TypeUtilisateur_model');
        $this->load->library('form_validation');
        $this->type=new TypeUtilisateur_model();
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'utilisateur/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'utilisateur/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'utilisateur/index.html';
            $config['first_url'] = base_url() . 'utilisateur/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Utilisateur_model->total_rows($q);
        $utilisateur = $this->Utilisateur_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'utilisateur_data' => $utilisateur,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
      $page=  $this->load->view('utilisateur/utilisateur_list', $data,true);
      $this->load->view('dashboard/admin',['page'=>$page]);
    }

    public function read($id) 
    {
        $row = $this->Utilisateur_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nom' => $row->nom,
		'matricule' => $row->matricule,
		'prenom' => $row->prenom,
		'dateNaissance' => $row->dateNaissance,
		'tel' => $row->tel,
		'email' => $row->email,
		'pwd' => $row->pwd,
		'idType' => $row->idType,
	    );
          $page=  $this->load->view('utilisateur/utilisateur_read', $data,true);
          $this->load->view('dashboard/admin',['page'=>$page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('utilisateur'));
        }
    }

    public function create() 
    {
        $listeTypes=$this->type->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('utilisateur/create_action'),
	    'id' => set_value('id'),
	    'nom' => set_value('nom'),
	    'matricule' => set_value('matricule'),
	    'prenom' => set_value('prenom'),
	    
	    'tel' => set_value('tel'),
	    'email' => set_value('email'),
	    'pwd' => set_value('pwd'),
	    'idType' => set_value('idType'),
            'listeTypes'=>$listeTypes
	);
      $page=  $this->load->view('utilisateur/utilisateur_form', $data,true);
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
		'matricule' => $this->input->post('matricule',TRUE),
		'prenom' => $this->input->post('prenom',TRUE),
		
		'tel' => $this->input->post('tel',TRUE),
		'email' => $this->input->post('email',TRUE),
		'pwd' => $this->input->post('pwd',TRUE),
		'idType' => $this->input->post('idType',TRUE),
	    );

            $this->Utilisateur_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('utilisateur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Utilisateur_model->get_by_id($id);
         $listeTypes=$this->type->get_all();
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('utilisateur/update_action'),
		'id' => set_value('id', $row->id),
		'nom' => set_value('nom', $row->nom),
		'matricule' => set_value('matricule', $row->matricule),
		'prenom' => set_value('prenom', $row->prenom),
		
		'tel' => set_value('tel', $row->tel),
		'email' => set_value('email', $row->email),
		'pwd' =>  set_value(""),
		'idType' => $listeTypes,
		'listeTypes' => $listeTypes,
	    );
          $page=  $this->load->view('utilisateur/utilisateur_form', $data,true);
          $this->load->view('dashboard/admin',['page'=>$page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('utilisateur'));
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
		'matricule' => $this->input->post('matricule',TRUE),
		'prenom' => $this->input->post('prenom',TRUE),
		
		'tel' => $this->input->post('tel',TRUE),
		'email' => $this->input->post('email',TRUE),
		'pwd' => $this->input->post('pwd',TRUE),
		'idType' => $this->input->post('idType',TRUE),
	    );

            $this->Utilisateur_model->update($this->input->post('id', TRUE), $data,true);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('utilisateur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Utilisateur_model->get_by_id($id);

        if ($row) {
            $this->Utilisateur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('utilisateur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('utilisateur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nom', 'nom', 'trim|required');
	$this->form_validation->set_rules('matricule', 'Matricule', 'trim|required|is_unique[utilisateur.matricule]|min_length[4]|max_length[8]');
	$this->form_validation->set_rules('prenom', 'prenom', 'trim|required');
	
	$this->form_validation->set_rules('tel', 'tel', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[utilisateur.email]');
	$this->form_validation->set_rules('pwd', 'Password', 'trim|required|min_length[8]');
	$this->form_validation->set_rules('confpwd', 'Password confirmation', 'trim|required|matches[pwd]');
	$this->form_validation->set_rules('idType', 'idtype', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "utilisateur.xls";
        $judul = "utilisateur";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Matricule");
	xlsWriteLabel($tablehead, $kolomhead++, "Nom");
	
	xlsWriteLabel($tablehead, $kolomhead++, "Prenom");
	xlsWriteLabel($tablehead, $kolomhead++, "DateNaissance");
	xlsWriteLabel($tablehead, $kolomhead++, "Tel");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Pwd");
	xlsWriteLabel($tablehead, $kolomhead++, "Type d'utilisateur");

	foreach ($this->Utilisateur_model->get_all_v() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->matricule);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nom);
	    xlsWriteLabel($tablebody, $kolombody++, $data->prenom);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dateNaissance);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pwd);
	    xlsWriteLabel($tablebody, $kolombody++, $data->idType);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=utilisateur.doc");

        $data = array(
            'utilisateur_data' => $this->Utilisateur_model->get_all(),
            'start' => 0
        );
        
      $page=  $this->load->view('utilisateur/utilisateur_doc',$data);
      $this->load->view('dashboard/admin',['page'=>$page]);
    }

}

/* End of file Utilisateur.php */
/* Location: ./application/controllers/Utilisateur.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-19 15:29:34 */
/* http://harviacode.com */