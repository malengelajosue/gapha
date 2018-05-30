<?php

class Login extends CI_Controller{
    private $type;
    private $utilisateur;
    private $user;
    public function __construct() {
            parent::__construct();
              $this->load->model('Utilisateur_model');
        $this->load->model('TypeUtilisateur_model');
        $this->type=new TypeUtilisateur_model();
        $this->utilisateur=new Utilisateur_model();
        
      
    }
    public function index(){
        $this->load->view('login/login');
    }
    public function logout(){
       
        unset($_SESSION['user']);
        unset($_SESSION['currentClient']);
        unset($_SESSION['chart']);
        unset($_SESSION['validate']);
        
        
        redirect(base_url().'/login');
    }
    public function authentication(){
        $matricule=$this->input->post('matricule',TRUE);
        $pwd=$this->input->post('password',TRUE);
        
        $this->user=$this->utilisateur->get_user(trim($matricule));
       // var_dump( $this->user).die();
        if ($this->user!=null) {
            if ($this->user->pwd==$pwd) {
                $this->session->set_userdata('user',$this->user);
                if ($this->user->idType==1) {
                    redirect(site_url('admin'));
                }
                else{
                    redirect(site_url('achat'));
                }
               
            }
            //en cas d'echec d'authentification
            else{
                redirect(site_url('login'));
            }
        }
        else{
              redirect(site_url('login'));
        }
    }
}