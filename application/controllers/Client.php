<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
          if (!isset($_SESSION['user'])) {
            redirect(base_url().'/login');
        }
        $this->load->model('Client_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'client/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'client/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'client/index.html';
            $config['first_url'] = base_url() . 'client/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Client_model->total_rows($q);
        $client = $this->Client_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'client_data' => $client,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
       $page= $this->load->view('client/client_list', $data,true);
       $this->load->view('dashboard/admin',['page'=>$page]);
    }

    public function read($id) 
    {
        $row = $this->Client_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nom' => $row->nom,
		'adresse' => $row->adresse,
		'tel' => $row->tel,
		'email' => $row->email,
	    );
           $page= $this->load->view('client/client_read',$data,true);
           
           
             $this->load->view('dashboard/admin',['page'=>$page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('client/create_action'),
	    'id' => set_value('id'),
	    'nom' => set_value('nom'),
	    'adresse' => set_value('adresse'),
	    'tel' => set_value('tel'),
	    'email' => set_value('email'),
	);
       $page= $this->load->view('client/client_form', $data ,true);
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
		'adresse' => $this->input->post('adresse',TRUE),
		'tel' => $this->input->post('tel',TRUE),
		'email' => $this->input->post('email',TRUE),
	    );

            $this->Client_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('client'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Client_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('client/update_action'),
		'id' => set_value('id', $row->id),
		'nom' => set_value('nom', $row->nom),
		'adresse' => set_value('adresse', $row->adresse),
		'tel' => set_value('tel', $row->tel),
		'email' => set_value('email', $row->email),
	    );
           $page= $this->load->view('client/client_form', $data,true);
             $this->load->view('dashboard/admin',['page'=>$page]);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
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
		'adresse' => $this->input->post('adresse',TRUE),
		'tel' => $this->input->post('tel',TRUE),
		'email' => $this->input->post('email',TRUE),
	    );

            $this->Client_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('client'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Client_model->get_by_id($id);

        if ($row) {
            $this->Client_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('client'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nom', 'nom', 'trim|required');
	$this->form_validation->set_rules('adresse', 'adresse', 'trim|required');
	$this->form_validation->set_rules('tel', 'tel', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "client.xls";
        $judul = "client";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Adresse");
	xlsWriteLabel($tablehead, $kolomhead++, "Tel");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");

	foreach ($this->Client_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nom);
	    xlsWriteLabel($tablebody, $kolombody++, $data->adresse);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tel);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=client.doc");

        $data = array(
            'client_data' => $this->Client_model->get_all(),
            'start' => 0
        );
        
      $this->load->view('client/client_doc',$data);
        
    }

}

