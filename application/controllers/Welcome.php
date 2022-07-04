<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        $this->load->model('AdminUser', "adminUser"); 
        $this->load->model('Role', 'role');

        $this->app_version = "version : dev-1.0";
        $this->app_name = "Invester Backend Management.";
        $this->app_desc = "Invester Description.";

	} //.End function
	
	public function dashboard()
    {
        $this->load->helper('url');
        $this->load->library("session");
        $data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Dashboard";
        $data['app_module'] = "Dashboard";
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
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Dashboard";
		$data['app_module'] = "Dashboard view";
    
        if($this->session->userdata('fname') == "" ) {
            redirect(site_url("welcome/loginform"));
        }

		$this->load->view('dashboard', $data);
    }

	/**
     * find member by user/pass
     * @return json string
     */
    public function authen()
    {
        $this->load->library("session");
        $this->load->helper('url');
        
        $user = $this->input->post("uname");
        $pass = $this->input->post("pword");
        $result = $this->adminUser->adminUserByUnameAndPword($user, $pass);

        if (count($result) > 0) {
            $this->session->set_userdata("id", $result[0]->id);
            $this->session->set_userdata("fname", $result[0]->fname);
            $this->session->set_userdata("lname", $result[0]->lname);
            $this->session->set_userdata("email", $result[0]->email);
            $this->session->set_userdata("phone", $result[0]->phone);
            $this->session->set_userdata("uname", $result[0]->uname);
            $this->session->set_userdata("err", "");
            redirect(site_url("admin/dashboard"));
        } else {
            $this->session->set_userdata("err", "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
            redirect(site_url("welcome/loginform/"));
        }

    } // .End member_by_user_pass
    
    /**
     * Signout
     */
    public function signout() {
	    $this->load->helper('url');
        $this->load->library("session");
		$this->session->sess_destroy(); // clear all session.

        redirect(site_url("welcome/loginform"));
	} // .end signout

   /**
     * Login form view
     */
	public function loginform() {
        $this->load->helper('url');
        $this->load->library("session");
        
        $data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Login Form";
        $data['app_module'] = "Login Form";
        
        $this->load->view('loginform', $data);
  } // .End loginform
}
