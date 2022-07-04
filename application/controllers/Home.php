<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $app_version;
	public $app_name;
	/**
     * Constuct
     */
    public function __construct()
    {
		parent::__construct();
		
		$this->load->helper('url');
        $this->load->library("session");
        
        $this->load->model('Transaction', "transaction"); // โหลดโมเดล adminuser
        
        $this->app_version = "version : dev-1.0";
        $this->app_name = "INVESTER - Deposit";
        $this->app_desc = "Invester Description.";

	} //.End function
	


	public function index()
    {
        $this->load->helper('url');
        $this->load->library("session");
        $data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Deposit";
        $data['app_module'] = "Deposit view";
        $this->load->view('home/deposit', $data);

	} // .End dashboard

	public function dashboard()
    {
        $this->load->helper('url');
        $this->load->library("session");
        $data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Dashboard";
        $data['app_module'] = "Dashboard view";
        $this->load->view('dashboard', $data);

	} // .End dashboard
    
    
    /**
     * Return view message
     */
    public function getMessage($m) {
        $view_msg = "";
        if($m != "") {
            $view_msg = '<div class="alert alert-danger alert-dismissible show" role="alert">
            <strong>Info</strong> '.$m.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> <!-- end div -->';
        }
        return $view_msg;
    } // .end div

    /**
     * Return view message
     */
    public function getErrMessage($msg) {
        $view_msg = "";

        if($msg != "") {
            $view_msg = '<div class="alert alert-danger alert-dismissible show" role="alert">
            <strong>Info</strong> '.$msg.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> <!-- end div -->';
        }
        return $view_msg;
    } // .end div

    public function setMessage($m){
        $this->msg = $m;
    }

    public function setErrMessage($m){
        $this->err_msg = $m;
    }

    public function clearMessage(){
        $this->msg = "";
        $this->err_msg = "";
    }

  /**
  * Login form view
  */
	public function salepage() {
        $this->load->helper('url');
        $this->load->library("session");
        $this->load->model('Subject', "subject"); // โหลดโมเดล adminuser
        $this->load->model('SubjectAsset',"subject_asset");
        
        $subject_id = $this->uri->segment(3,"0");
        $data['items'] = $this->subject_asset->getBySubjectId($subject_id);

        $this->load->view('salepage/salepage', $data);
        
  } // .End loginform

  
  /**
  * Login form view
  */
	public function submittsalepage() {
    $this->load->helper('url');
    $this->load->library("session");
    $this->load->model('Subject', "subject"); // โหลดโมเดล adminuser
    $this->load->model('SubjectAsset',"subject_asset");
    
    $subject_id = $this->uri->segment(3,"0");
    $data['subject_id'] = $subject_id;
    

    redirect(site_url("home/salepage/{$subject_id}"));

    //$this->load->view('salepage/salepage', $data);
    
} // .End loginform

  

}
