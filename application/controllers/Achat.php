<?php

class Achat extends CI_Controller {
            private$chartArray;
            private$art;
    private $vente;
    private $client;
    private $discount;

    public function __construct() {
       
        parent::__construct();
         if (!isset($_SESSION['user'])) {
            redirect(base_url().'/login');
        }
        $this->load->model('Article_model');
        $this->load->model('Categorie_model');
        $this->load->model('DetailVente_model');
        $this->load->model('Fournisseur_model');
        $this->load->model('Client_model');
        $this->load->library('form_validation');
        $this->vente = new DetailVente_model();
        $this->art = new Article_model();
        $this->client = new Client_model();
        $this->chartArray = array();

        if (!isset($_SESSION['chart'])) {
            $this->session->set_userdata('chart', $this->chartArray);
            $this->session->set_userdata('validate', false);
            
        }
        if (!isset($_SESSION['discount'])) {
            $this->session->set_userdata('discount', 0);
        }else{
            $this->discount=$this->session->discount;
        }
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
        $chart = count($this->session->chart);
        $client = "";
        if (isset($_SESSION['currentClient'])) {
            $client = $this->session->currentClient->nom;
        }

        $numeroFacture = $this->session->numeroFacture;
        $discount= $this->session->discount;
       
        $data = array(
            'article_data' => $article,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'chart' => $chart,
            'client' => $client,
            'numFacture' => $numeroFacture,
            'discount' => $discount,
        
        );
        $listeClient = $this->client->get_all();
        if (!isset($_SESSION['currentClient'])) {
            $page = $this->load->view('achat/client_choice', ['listeClient' => $listeClient], true);
            $this->load->view('dashboard/admin', ['page' => $page]);
        } else {
            $page = $this->load->view('achat/article_list', $data, true);
            $this->load->view('dashboard/admin', ['page' => $page]);
        }
    }
    
   

    public function addToChart() {
        $id = $this->input->post('chart_id', TRUE);

        $data = array(
            'id' => $this->input->post('chart_id', TRUE),
            'codeArticle' => $this->input->post('chart_codeArticle', TRUE),
            'designation' => $this->input->post('chart_designation', TRUE),
            'quantite' => $this->input->post('chart_quantite', TRUE),
            'prix' => $this->input->post('chart_prix', TRUE),
            'idCategorie' => $this->input->post('chart_idCategorie', TRUE),
            'idFournisseur' => $this->input->post('chart_idFournisseur', TRUE),
            'discount' => $this->discount,
        );
        $chart = $this->session->chart;
        $chart[$id] = $data;

        $this->session->set_userdata('chart', $chart);


        // $this->Article_model->insert($data);
        //$this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('achat'));
    }

    public function panier() {
         $validate = $this->session->validate;
        if (isset($_SESSION['currentClient'])) {
            $client = $this->session->currentClient->nom;
        }

        $numeroFacture = $this->session->numeroFacture;
        $data = $this->session->chart;
        //calcule du prix total
        $totalPrix = 0;
        foreach ($data as $a) {
            $totalPrix += ($a['prix']) * ($a['quantite']);
        }
           $discount= $this->session->discount;
        $array=array(
            'validate'=>$validate,
            'chart'=>$data,
            'total'=>$totalPrix,
            'client'=>$client,
            'numFacture'=>$numeroFacture,
            'discount'=>$this->discount,
        );

        $page = $this->load->view('achat/panier',$array, true);
        $this->load->view('dashboard/admin', ['page' => $page]);
    }

    public function cancel() {
        $this->session->unset_userdata('chart');
        // $this->session->unset_userdata('currentClient');
        $this->set_usedata('discount',0);
        redirect(site_url('achat'));
    }

    public function deleteItem($id) {
        $data = $this->session->chart;
    }

    //cette methode permet de valider  la commande du client 
    public function validate() {
        $data = $this->session->chart;
        $stockArticle = 0;
        $numFac = $this->session->numeroFacture;
        $idClient = $this->session->currentClient->id;
        $discount=$this->session->discount;

        foreach ($data as $d) {
       
            $array = array(
                'numFacture' => $numFac,
                'idArticle' => $d['id'],
                'idClient' => $idClient,
                'quantite' => $d['quantite'],
                'total' => ($d['quantite']) * ($d['prix']) * 1.16*(1- $discount/100),
                'discount'=>$discount,
                'idUtilisateur' => $this->session->user->id,
            );

            //mise a jour de la quantite en stock
            $stockArticle = $this->art->get_by_id($d['id'])->stock;
            if ($stockArticle >= $d['quantite']) {
                $stock = $stockArticle - $d['quantite'];
                $this->art->update($d['id'], array('stock' => $stock));
            }
            $this->vente->insert($array);
        }
        $_SESSION['validate'] = true;
        
       
     
    }
     public function printFacture(){
          $validate = $this->session->validate;
          $discount = $this->session->discount;
        if (isset($_SESSION['currentClient'])) {
            $client = $this->session->currentClient;
        }
         $numeroFacture = $this->session->numeroFacture;
        $data = $this->session->chart;
        //calcule du prix total
        $totalPrix = 0;
        foreach ($data as $a) {
            $totalPrix += ($a['prix']) * ($a['quantite']);
        }
        $array=array(
            'validate'=>$validate,
            'chart'=>$data,
            'total'=>$totalPrix,
            'client'=>$client,
            'numFacture'=>$numeroFacture,
             'discount'=>$discount,
        );
        $this->load->view('achat/printFacture',$array);
        if (!$validate) {
            $this->validate();
        }
       
    }
    
    public function reduction(){
      $discount=  $this->input->post('discount', TRUE);
      $this->session->set_userdata('discount',$discount);
      redirect('achat/panier');
    }
     public function printProforma(){
          $validate = $this->session->validate;
          $discount=$this->session->discount;
        if (isset($_SESSION['currentClient'])) {
            $client = $this->session->currentClient;
        }
         $numeroFacture = $this->session->numeroFacture;
        $data = $this->session->chart;
        //calcule du prix total
        $totalPrix = 0;
        foreach ($data as $a) {
            $totalPrix += ($a['prix']) * ($a['quantite']);
        }
        $array=array(
            'validate'=>$validate,
            'chart'=>$data,
            'total'=>$totalPrix,
            'client'=>$client,
            'numFacture'=>$numeroFacture,
            'discount'=>$discount
        );
        $this->load->view('achat/printProforma',$array);
      
    }

    public function back() {
        if ($_SESSION['validate'] == false) {
            redirect(site_url('achat'));
        } else if ($_SESSION['validate'] == true) {
            $this->session->unset_userdata('chart');
            $this->session->unset_userdata('currentClient');
            $this->session->unset_userdata('numeroFacture');
            $this->session->set_userdata('discount',0);
            $this->chooseClient();
        }
    }

    public function client() {
        $page = $this->load->view('achat/client_modal', [], true);
        $this->load->view('dashboard/admin', ['page' => $page]);
    }
    public function changeClient(){
          $this->session->unset_userdata('chart');
            $this->session->unset_userdata('currentClient');
            $this->session->unset_userdata('numeroFacture');
            $this->chooseClient();
    }

    public function chooseClient() {
        $numfac=date("ymdHis");
        $numfac=$numfac.''.rand(1,50);
        $idClient = $this->input->post('idClient', TRUE);
        $client = $this->client->get_by_id($idClient);
        $this->session->set_userdata('currentClient', $client);
        $this->session->set_userdata('numeroFacture', $numfac);
        $this->session->set_userdata('discount', 0);
        redirect(site_url('achat/'));
    }
    
      public function proforma() {
       
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=PRO_FORMA.doc");

        $data =$this->session->chart;
         $numeroFacture = $this->session->numeroFacture;
         $client = $this->session->currentClient->nom;
        //calcule du prix total
        $totalPrix = 0;
        
        foreach ($data as $a) {
            $totalPrix += ($a['prix']) * ($a['quantite']);
        }
        $array=array(
             'date'=>date('d/m/Y'),
            'articles'=>$data,
            'total'=>$totalPrix,
            'client'=>$client,
            'numFacture'=>$numeroFacture,
        );
        $this->load->view('achat/panier_doc_pro', $array);
        //$this->load->view('dashboard/admin',['page'=>$page]);
    }
      public function word() {
       
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=FACTURE.doc");

        $data =$this->session->chart;
         $numeroFacture = $this->session->numeroFacture;
         $client = $this->session->currentClient->nom;
        //calcule du prix total
        $totalPrix = 0;
        
        foreach ($data as $a) {
            $totalPrix += ($a['prix']) * ($a['quantite']);
        }
        $array=array(
             'date'=>date('d/m/Y'),
            'articles'=>$data,
            'total'=>$totalPrix,
            'client'=>$client,
            'numFacture'=>$numeroFacture,
        );
        $this->load->view('achat/panier_doc', $array);
        //$this->load->view('dashboard/admin',['page'=>$page]);
    }

}
