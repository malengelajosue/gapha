<?php

class Admin extends CI_Controller {

    private $categorie;
    private $article;
    private $fournisseur;

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user'])) {
            redirect(base_url() . '/login');
        } else if ($_SESSION['user'] == null) {
            redirect(base_url() . '/login');
        } else if ($_SESSION['user']->idType != 1) {
            redirect(base_url() . '/achat');
        }
        $this->load->model('Article_model');
        $this->load->model('Categorie_model');
        $this->load->model('Fournisseur_model');
        $this->categorie = new Categorie_model();
        $this->fournisseur = new Fournisseur_model();
        $this->article = new Article_model();
    }
 function totalVente($limit, $start = 0, $q = NULL){
    
      //  $total = 0;
      ///  $articles = $this->Article_model->get_limit_best_data($limit, $start = 0, $q = NULL);
        
       // foreach ($articles as $art){
       //     $total+=$art->totalVente;
       // }
    
        
        return $this->Article_model->total_rows_best();
    }
    public function index() {
        $user = $this->session->user;






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
        $TotalFinishedArticle = $this->Article_model->get_total_finished();
        $TotalWeakArticle = $this->Article_model->get_total_weak();
         $TotalVentes=$this->totalVente($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'article_data' => $article,
            'finished_art' => $TotalFinishedArticle,
            'weak_art' => $TotalWeakArticle,
            'total_vent' => $TotalVentes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $page = $this->load->view('dashboard/dashboard', $data, true);
        $this->load->view('dashboard/admin.php', ['page' => $page, 'user' => $user]);
    }
    public function bestseller(){
           $user = $this->session->user;
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
        $article = $this->Article_model->get_limit_best_data($config['per_page'], $start, $q);
        $TotalFinishedArticle = $this->Article_model->get_total_finished();
        $TotalWeakArticle = $this->Article_model->get_total_weak();
      
         $TotalVentes=$this->totalVente($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'article_data' => $article,
            'finished_art' => $TotalFinishedArticle,
            'weak_art' => $TotalWeakArticle,
            'total_vent' => $TotalVentes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $page = $this->load->view('dashboard/bestseller', $data, true);
        $this->load->view('dashboard/admin.php', ['page' => $page, 'user' => $user]);
    
    }
    public function finished() {
        $user = $this->session->user;
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
        $article = $this->Article_model->get_limit_finished_data($config['per_page'], $start, $q);
        $TotalFinishedArticle = $this->Article_model->get_total_finished();
        $TotalWeakArticle = $this->Article_model->get_total_weak();
        $TotalVentes=$this->totalVente($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'article_data' => $article,
            'finished_art' => $TotalFinishedArticle,
            'weak_art' => $TotalWeakArticle,
            'total_vent' => $TotalVentes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $page = $this->load->view('dashboard/pEpuises', $data, true);
        $this->load->view('dashboard/admin.php', ['page' => $page, 'user' => $user]);
    

    }
   
    public function weak() {
        $user = $this->session->user;
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
        $article = $this->Article_model->get_limit_weak_data($config['per_page'], $start, $q);
        $TotalFinishedArticle = $this->Article_model->get_total_finished();
        $TotalWeakArticle = $this->Article_model->get_total_weak();
         $TotalVentes=$this->totalVente($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'article_data' => $article,
            'finished_art' => $TotalFinishedArticle,
            'weak_art' => $TotalWeakArticle,
            'total_vent' => $TotalVentes,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $page = $this->load->view('dashboard/pFaible', $data, true);
        $this->load->view('dashboard/admin.php', ['page' => $page, 'user' => $user]);
    }

}
