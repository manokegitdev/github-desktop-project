<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
        $this->load->model('Member', "member"); 
        $this->load->model('MemberCredit', "member_credit"); 
        $this->load->model('MemberPackage', "member_package"); 
        $this->load->model('package', "package"); 
        $this->load->model('Role', 'role');

        $this->app_version = "version : dev-1.0";
        $this->app_name = "Service.";
        $this->app_desc = "Service Description.";

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
    
        if($this->session->userdata('id') == "" ) {
            redirect(site_url("service/loginform"));
        }

        $view_module = $this->uri->segment(3, 0);
        $data['view_module'] = $view_module;

		$this->load->view('service/base_template', $data);
    }

    public function memberinfo()
	{
		$data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Dashboard";
		$data['app_module'] = "Dashboard view";
    
        if($this->session->userdata('id') == "" ) {
            redirect(site_url("service/loginform"));
        }

		$this->load->view('service/memberinfo', $data);
    }

    public function deposit()
	{
		$data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Dashboard";
		$data['app_module'] = "Dashboard view";
    
        if($this->session->userdata('id') == "" ) {
            redirect(site_url("service/loginform"));
        }

		$this->load->view('service/deposit', $data);
    }

    public function withdraw()
	{
		$data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Dashboard";
		$data['app_module'] = "Dashboard view";
    
        if($this->session->userdata('id') == "" ) {
            redirect(site_url("service/loginform"));
        }

		$this->load->view('service/withdraw', $data);
    }

    public function transaction()
	{
		$data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Dashboard";
		$data['app_module'] = "Dashboard view";
    
        if($this->session->userdata('id') == "" ) {
            redirect(site_url("service/loginform"));
        }

		$this->load->view('service/transaction', $data);
    }

    public function changepassword()
	{
		$data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Dashboard";
		$data['app_module'] = "Dashboard view";
    
        if($this->session->userdata('id') == "" ) {
            redirect(site_url("service/loginform"));
        }

		$this->load->view('service/changepassword', $data);
    }

    public function package()
	{
		$data['app_name'] = $this->app_name;
        $data['app_version'] = $this->app_version;
        $this->app_module="Dashboard";
		$data['app_module'] = "Dashboard view";
    
        if($this->session->userdata('id') == "" ) {
            redirect(site_url("service/loginform"));
        }

		$this->load->view('service/package', $data);
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
        $result = $this->member->memberByUnameAndPword($user, $pass);

        if (count($result) > 0) {
            $this->session->set_userdata("id", $result[0]->id);
            $this->session->set_userdata("fullname", $result[0]->fullname);
            $this->session->set_userdata("mobile", $result[0]->mobile);
            $this->session->set_userdata("username", $result[0]->username);
            $this->session->set_userdata("status", $result[0]->status);
            $this->session->set_userdata("err", "");
            redirect(site_url("service/index"));
        } else {
            $this->session->set_userdata("err", "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
            redirect(site_url("service/loginform"));
        }

    } // .End member_by_user_pass
    
    /**
     * Signout
     */
    public function signout() {
	    $this->load->helper('url');
        $this->load->library("session");
		$this->session->sess_destroy(); // clear all session.

        redirect(site_url("service/loginform"));
	} // .end signout

        /**
     * Signout
     */
    public function logout() {
	    $this->signout();
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
        
        $this->load->view('service/loginform', $data);
  } // .End loginform


  /**
       * register new member
       */
      public function doregister() {
        $this->load->helper("url");
        $this->load->library("session");
        header("content-Type:application/json; charset=utf8");

        if($this->input->get_post("id")){
          $dat['id']  = $this->input->post("id");
        }

        $json['data'] = array();
         $dat['fullname'] = $this->input->post("fullname");
         $dat['username'] = $this->input->post("username");
        $dat['password'] = $this->input->post("password");
        $dat['mobile'] = $this->input->post("mobile");
        $dat['status'] = 'y';

        if($this->member->update($dat)) {
          $json['success'] = true;
          $json['data'] = $dat;
        } else {
          $json['success'] = false;
          $json['data'] = "{}";
        }// .End if

        echo json_encode($json);

    } // .end doregister
  
}
