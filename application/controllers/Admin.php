<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . "controllers/thsms.php");


class Admin extends CI_Controller
{

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

    $this->load->model('adminUser', "admin_users");
    $this->load->model('Transaction', 'transaction');
    $this->load->model('Withdraw', 'withdraw');
    $this->load->model('Role', 'role');

    $this->app_version = "version : dev-1.0";
    $this->app_name = "Invester Backend Management.";
    $this->app_desc = "Invester Description.";

    $this->validLogin();
  } //.End function

  public function sendEmail()
  {
    //phpinfo();

    $config['protocol']  = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
    $config['smtp_user'] = 'projectth2010@gmail.com';
    $config['smtp_pass'] = 'projectth2010';
    $config['smtp_port'] = 465;
    $config['charset']   = 'utf-8';
    $config['mailtype']  = 'html';
    $config['newline']   = "\r\n";

    // load email library
    $this->load->library('email', $config);
    $json['data'] = array();
    // prepare email
    $this->email
      ->from('projectth2010@gmail.com', 'Auto E-Mail Vpro')
      ->to('ravatna@gmail.com')->cc('vprothai@gmail.com')
      ->subject('มีจ่ายงาน โจทก์')
      ->message('มีจ่ายงาน หมายเลข xxxxxx ในระบบ')
      ->set_mailtype('html');

    // send email
    if ($this->email->send(FALSE)) {
      $json['message'] = "success";
    } else {

      $json['message'] = "Could not send email, please try again later";
    }

    echo json_encode($json);
  } // sendEmail()


  public function getCopyRight()
  {
    return "";
  }


  public function getPrefixFromUname($str)
  {
    $str = strtoupper(substr($str, 0, strlen($str) - 1));
    return $str;
  }

  public function dashboard()
  {
    $this->load->helper('url');
    $this->load->library("session");
    $data['app_name'] = $this->app_name;
    $data['app_version'] = $this->app_version;
    $this->app_module = "Dashboard";
    $data['app_module'] = $this->app_module;
    $this->load->view('admin/dashboard', $data);
  } // .End dashboard

  function isMobileDevice()
  {
    $isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
    return $isMob ? true : false;
  }

  public function index()
  {
    $this->validLogin();
    redirect(site_url("admin/dashboard"));
  } // .End index

  /**
   * Test login
   */
  public function validLogin()
  {
    if ($this->session->userdata('fname') == "") {
      redirect(site_url("welcome/signout"));
    }
  } // .End validLogin

  /**
   * @return array
   */
  function newNumber($assign_office_id)
  {
    # get prefix
    $r = $this->assign_office->getById($assign_office_id);
    $n = $this->assign_task->getMax_ByAssignOfficeId($assign_office_id);
    $prefix[0] = $r[0]->prefix;
    $prefix[1] = ($n[0]->no_running == NULL) ? 1 : $n[0]->no_running;

    $dat['id'] = $assign_office_id;
    $dat['no_running'] = $n[0]->no_running;
    $this->assign_office->update($dat);
    return $prefix;
  }

  /**
   * List assign_office table data
   * 
   */
  public function assign_offices()
  {
    $this->load->helper('url');
    $this->load->library("session");
    $data['app_name'] = $this->app_name;
    $data['app_version'] = $this->app_version;
    $this->app_module = "สำนักงาน";
    $data['app_module'] = $this->app_module;
    //$data['navmenus'] = $this->getNavMenus();
    $this->load->view('assignoffice', $data);
  } // .End assign_offices

  /**
   * Update assign_office table data
   * 
   */
  public function update_assign_office()
  {
    $this->load->helper("url");
    $this->load->library("session");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }
    $dat['office_name'] = $this->input->get_post("office_name");
    $dat['prefix'] = $this->input->get_post("prefix");
    $dat['no_running'] = $this->input->get_post("no_running");


    if ($this->assign_office->update($dat)) {
      $this->session->set_userdata("msg", "Update Success.");
    } else {
      $this->session->set_userdata("err_msg", "Update Fail.");
    } // .End if

    redirect(site_url("welcome/assign_office"));
  } // .end update_assign_office

  /**
   * Delete assign_office table data
   * 
   */
  public function delete_assign_office_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    $id  = $this->input->post("id");

    if ($this->assign_office->delById($id)) {
      $json['success'] = true;
      $json['data'] = $id;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end delete_assign_office


  /**
   * Update data assign_office return json format
   */
  public function update_assign_office_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }

    $json['data'] = array();
    $dat['office_name'] = $this->input->post("office_name");
    $dat['prefix'] = $this->input->post("prefix");
    $dat['no_running'] = $this->input->post("no_running");

    if ($this->assign_office->update($dat)) {
      $json['success'] = true;
      $json['data'] = $dat;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end update_assign_office_json


  /**
   * Get data assign_office return json format
   */
  public function gets_assign_office_json()
  {
    header("content-Type:application/json; charset=utf8");

    $results = $this->assign_office->gets();
    $json['data'] = array();
    $data = array();

    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['office_name']  = $results[$i]->office_name;
      $dat['prefix']  = $results[$i]->prefix;
      $dat['no_running']  = $results[$i]->no_running;
      $data[] = $dat;
    }

    $json['success'] = true;
    $json['data'] = $data;
    echo json_encode($json);
  } // .end update_assign_office_json

  /**
   * Get data assign_office return json format
   */
  public function gets_assign_office_dt_json()
  {
    header("content-Type:application/json; charset=utf8");
    $results = $this->assign_office->gets();
    $json['data'] = array();
    $data = array();

    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['office_name']  = $results[$i]->office_name;
      $dat['prefix']  = $results[$i]->prefix;
      $dat['no_running']  = $results[$i]->no_running;

      // Update Button
      $updateButton = "
           <div class=\"btn-group\">
      <button type=\"button\" class=\"btn btn-danger\">คำสั่ง</button>
      
      <button type=\"button\" class=\"btn btn-danger dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle Dropdown</span>
      </button>

      <div class=\"dropdown-menu\">
        
        <a class=\"dropdown-item\"  data-id='" . $results[$i]->id . "' data-toggle='modal' data-target='#assign_office' onclick='edit(this);'  href=\"#\">แก้ไข</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" href=\"#\" data-id='" . $results[$i]->id . "' onclick=\"confirmDel(this)\">ลบ</a>
      </div>
      
    </div>";


      $dat['action'] = $updateButton;

      $data[] = $dat;
    }


    ## Response
    $response = array(
      "iTotalRecords" => count($data),
      "recordsFiltered" => count($data),
      "data" => $data
    );

    echo json_encode($response);
  } // .end update_assign_office_dt_json





  /**
   * List app_user table data
   * 
   */
  public function app_users()
  {
    $this->load->helper('url');
    $this->load->library("session");
    $data['app_name'] = $this->app_name;
    $data['app_version'] = $this->app_version;
    $this->app_module = "app_user View";
    $data['app_module'] = $this->app_module;
    //$data['navmenus'] = $this->getNavMenus();
    $this->load->view('admin/app_user', $data);
  } // .End app_users

  /**
   * Update app_user table data
   * 
   */
  public function update_app_user()
  {
    $this->load->helper("url");
    $this->load->library("session");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }
    $dat['name'] = $this->input->get_post("name");
    $dat['uname'] = $this->input->get_post("uname");
    $dat['pword'] = $this->input->get_post("pword");
    $dat['is_lock'] = $this->input->get_post("is_lock");


    if ($this->app_users->update($dat)) {
      $this->session->set_userdata("msg", "Update Success.");
    } else {
      $this->session->set_userdata("err_msg", "Update Fail.");
    } // .End if

    redirect(site_url("welcome/app_user"));
  } // .end update_app_user

  /**
   * Delete app_user table data
   * 
   */
  public function delete_app_user_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    $id  = $this->input->post("id");

    if ($this->app_users->delById($id)) {
      $json['success'] = true;
      $json['data'] = $id;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end delete_app_user


  /**
   * Update data app_user return json format
   */
  public function update_app_user_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }

    $json['data'] = array();
    $dat['name'] = $this->input->post("name");
    $dat['uname'] = $this->input->post("uname");
    $dat['pword'] = $this->input->post("pword");
    $dat['is_lock'] = $this->input->post("is_lock");

    if ($this->app_users->update($dat)) {
      $json['success'] = true;
      $json['data'] = $dat;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end update_app_user_json


  /**
   * Get data app_user return json format
   */
  public function gets_app_user_json()
  {
    header("content-Type:application/json; charset=utf8");

    $results = $this->app_users->gets();

    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['name']  = $results[$i]->name;
      $dat['uname']  = $results[$i]->uname;
      $dat['pword']  = $results[$i]->pword;
      $dat['is_lock']  = $results[$i]->is_lock;

      $data[] = $dat;
    }

    $json['success'] = true;
    $json['data'] = $data;

    echo json_encode($json);
  } // .end update_app_user_json

  /**
   * Get data app_user return json format
   */
  public function gets_app_user_dt_json()
  {
    header("content-Type:application/json; charset=utf8");
    $results = $this->app_users->gets();
    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['name']  = $results[$i]->name;
      $dat['uname']  = $results[$i]->uname;
      $dat['pword']  = $results[$i]->pword;
      $dat['is_lock']  = $results[$i]->is_lock;

      // Update Button
      $updateButton = "
           <div class=\"btn-group\">
      <button type=\"button\" class=\"btn btn-danger\">คำสั่ง</button>
      
      <button type=\"button\" class=\"btn btn-danger dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle Dropdown</span>
      </button>

      <div class=\"dropdown-menu\">
        
        <a class=\"dropdown-item\"  data-id='" . $results[$i]->id . "' data-toggle='modal' data-target='#app_user' onclick='edit(this);'  href=\"#\">แก้ไข</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" href=\"#\" data-id='" . $results[$i]->id . "' onclick=\"confirmDel(this)\">ลบ</a>
      </div>
      
    </div>";


      $dat['action'] = $updateButton;

      $data[] = $dat;
    }


    ## Response
    $response = array(
      "iTotalRecords" => count($data),
      "recordsFiltered" => count($data),
      "data" => $data
    );

    echo json_encode($response);
  } // .end update_app_user_dt_json





  /**
   * List roles table data
   * 
   */
  public function roles()
  {
    $this->load->helper('url');
    $this->load->library("session");
    $data['app_name'] = $this->app_name;
    $data['app_version'] = $this->app_version;
    $this->app_module = "roles View";
    $data['app_module'] = $this->app_module;
    //$data['navmenus'] = $this->getNavMenus();
    $this->load->view('admin/role', $data);
  } // .End roles

  /**
   * Update roles table data
   * 
   */
  public function update_roles()
  {
    $this->load->helper("url");
    $this->load->library("session");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }
    $dat['name'] = $this->input->get_post("name");


    if ($this->role->update($dat)) {
      $this->session->set_userdata("msg", "Update Success.");
    } else {
      $this->session->set_userdata("err_msg", "Update Fail.");
    } // .End if

    redirect(site_url("welcome/roles"));
  } // .end update_roles

  /**
   * Delete roles table data
   * 
   */
  public function delete_role_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    $id  = $this->input->post("id");

    if ($this->role->delById($id)) {
      $json['success'] = true;
      $json['data'] = $id;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end delete_roles


  /**
   * Update data roles return json format
   */
  public function update_role_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }

    $json['data'] = array();
    $dat['name'] = $this->input->post("name");
    if ($this->role->update($dat)) {
      $json['success'] = true;
      $json['data'] = $dat;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end update_role_json


  /**
   * Get data roles return json format
   */
  public function gets_role_json()
  {
    header("content-Type:application/json; charset=utf8");

    $results = $this->role->gets();

    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['name']  = $results[$i]->name;
      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;

      $data[] = $dat;
    }

    $json['success'] = true;
    $json['data'] = $data;

    echo json_encode($json);
  } // .end update_role_json

  /**
   * Get data roles return json format
   */
  public function gets_role_dt_json()
  {
    header("content-Type:application/json; charset=utf8");
    $results = $this->role->gets();
    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;

      $dat['name']  = $results[$i]->name;

      $dat['created_at']  = $results[$i]->created_at;

      $dat['created_by']  = $results[$i]->created_by;

      // Update Button
      $updateButton = "
           <div class=\"btn-group\">
      <button type=\"button\" class=\"btn btn-danger\">คำสั่ง</button>
      
      <button type=\"button\" class=\"btn btn-danger dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle Dropdown</span>
      </button>

      <div class=\"dropdown-menu\">
        
        <a class=\"dropdown-item\"  data-id='" . $results[$i]->id . "' data-toggle='modal' data-target='#roles' onclick='edit(this);'  href=\"#\">แก้ไข</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" href=\"#\" data-id='" . $results[$i]->id . "' onclick=\"confirmDel(this)\">ลบ</a>
      </div>
      
    </div>";


      $dat['action'] = $updateButton;

      $data[] = $dat;
    }


    ## Response
    $response = array(
      "iTotalRecords" => count($data),
      "recordsFiltered" => count($data),
      "data" => $data
    );

    echo json_encode($response);
  } // .end update_role_dt_json




  /**
   * Upload file from setting view
   */
  public function upload_role_json()
  {
    header("content-Type:application/json; charset=utf8");
    $this->load->helper('url');
    $this->load->library("session");

    $config = array(
      'upload_path' => "./uploads/roles/",
      'allowed_types' => "gif|png|jpg|jpeg",
      'overwrite' => TRUE,
      'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
    );

    $this->load->library('upload', $config);
    if ($this->upload->do_upload('picture_file')) {
      $ud = array('upload_data' => $this->upload->data());
      $fl = $ud['upload_data']['file_name'];

      $id = $this->input->get("id");
      $data['id'] = $id;
      $data['created_by'] = $fl;

      $this->role->update($data);

      $json['success'] = true;
      $res = (array) $this->role->getById($id);

      $json['data'] = $res;
      $json['filename'] = $fl;
    } else {
      $error = array('error' => $this->role->display_errors());
      $json['success'] = false;
      $json['data'] = $error;
    }

    echo json_encode($json);
  } // .end upload_role_json

  //////////////// user ////////////////

  /**
   * List admin_users table data
   * 
   */
  public function adminusers()
  {
    $this->load->helper('url');
    $this->load->library("session");
    $data['app_name'] = $this->app_name;
    $data['app_version'] = $this->app_version;
    $this->app_module = "admin_users View";
    $data['app_module'] = $this->app_module;

    $this->load->view('admin/adminusers', $data);
  } // .End admin_userss

  /**
   * Update admin_users table data
   * 
   */
  public function update_admin_users()
  {
    $this->load->helper("url");
    $this->load->library("session");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }
    $dat['fname'] = $this->input->get_post("fname");
    $dat['lname'] = $this->input->get_post("lname");
    $dat['email'] = $this->input->get_post("email");
    $dat['phone'] = $this->input->get_post("phone");
    $dat['uname'] = $this->input->get_post("uname");
    $dat['pword'] = $this->input->get_post("pword");
    $dat['is_lock'] = $this->input->get_post("is_lock");
    $dat['roles_id'] = $this->input->get_post("role_id");


    if ($this->admin_users->update($dat)) {
      $this->session->set_userdata("msg", "Update Success.");
    } else {
      $this->session->set_userdata("err_msg", "Update Fail.");
    } // .End if

    redirect(site_url("welcome/admin_users"));
  } // .end update_admin_users

  /**
   * Delete admin_users table data
   * 
   */
  public function delete_admin_users_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    $id  = $this->input->post("id");

    if ($this->admin_users->delById($id)) {
      $json['success'] = true;
      $json['data'] = $id;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end delete_admin_users

  /**
   * Update data admin_users return json format
   */
  public function update_admin_users_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }

    $json['data'] = array();
    $dat['fname'] = $this->input->post("fname");
    $dat['lname'] = $this->input->post("lname");
    $dat['email'] = $this->input->post("email");
    $dat['phone'] = $this->input->post("phone");
    $dat['uname'] = $this->input->post("uname");
    $dat['pword'] = $this->input->post("pword");
    $dat['is_lock'] = $this->input->post("is_lock");
    $dat['roles_id'] = $this->input->post("role_id");

    if ($this->admin_users->update($dat)) {
      $json['success'] = true;
      $json['data'] = $dat;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end update_admin_users_json

  /**
   * Get data admin_users return json format
   */
  public function gets_admin_user_json()
  {
    header("content-Type:application/json; charset=utf8");

    $results = $this->admin_users->gets();

    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['fname']  = $results[$i]->fname;
      $dat['lname']  = $results[$i]->lname;
      $dat['email']  = $results[$i]->email;
      $dat['phone']  = $results[$i]->phone;
      $dat['uname']  = $results[$i]->uname . "-" . $results[$i]->fname;
      $dat['pword']  = $results[$i]->pword;
      $dat['is_lock']  = $results[$i]->is_lock;
      $dat['role_id']  = $results[$i]->role_id;

      $r = $this->role->getById($results[$i]->role_id);
      $dat['role']  = (count($r) > 0) ? $r[0]->name : "";

      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;
      $dat['updated_at']  = $results[$i]->updated_at;
      $dat['updated_by']  = $results[$i]->updated_by;

      $data[] = $dat;
    }

    $json['success'] = true;
    $json['data'] = $data;
    echo json_encode($json);
  } // .end update_admin_users_json

  /**
   * Get data admin_users return json format
   */
  public function gets_admin_user_dt_json()
  {
    header("content-Type:application/json; charset=utf8");
    $results = $this->admin_users->gets();
    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;

      $dat['fname']  = $results[$i]->fname;
      $dat['lname']  = $results[$i]->lname;
      $dat['email']  = $results[$i]->email;
      $dat['phone']  = $results[$i]->phone;
      $dat['uname']  = $results[$i]->uname;
      $dat['pword']  = $results[$i]->pword;
      $dat['is_lock']  = $results[$i]->is_lock;
      $dat['role_id']  = $results[$i]->role_id;
      $r = $this->role->getById($results[$i]->role_id);
      $dat['role']  = (count($r) > 0) ? $r[0]->name : "";

      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;
      $dat['updated_at']  = $results[$i]->updated_at;
      $dat['updated_by']  = $results[$i]->updated_by;

      // Update Button
      $updateButton = "
           <div class=\"btn-group\">
      <button type=\"button\" class=\"btn btn-danger\">คำสั่ง</button>
      
      <button type=\"button\" class=\"btn btn-danger dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle Dropdown</span>
      </button>

      <div class=\"dropdown-menu\">
        
        <a class=\"dropdown-item\"  data-id='" . $results[$i]->id . "' data-toggle='modal' data-target='#admin_users' onclick='edit(this);'  href=\"#\">แก้ไข</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" href=\"#\" data-id='" . $results[$i]->id . "' onclick=\"confirmDel(this)\">ลบ</a>
      </div>
      
    </div>";


      $dat['action'] = $updateButton;

      $data[] = $dat;
    }


    ## Response
    $response = array(
      "iTotalRecords" => count($data),
      "recordsFiltered" => count($data),
      "data" => $data
    );

    echo json_encode($response);
  } // .end update_admin_users_dt_json

  /**
   * Make send OTP to target mobile number.
   */
  private function doSendOTP($mobile)
  {
    $sms = new thsms();

    $sms->username   = 'ravatna';
    $sms->password   = 'Rb00ns17';

    // $a = $sms->getCredit();
    // print_r($a);
    // if($a[0] != 1){        
    //     return $a; // .Return function here.
    // } // .End if credit is false

    $b = $sms->send('SMS', "VPRO Line ID : https://lin.ee/dloHrIA");
    print_r($b);
    if ($b[0] != true) {
      return $b;
    }
    return true;
  } // .End send OTP to number mobile phone


  /////////////////////////////////////////

  /**
   * List transaction table data
   *
   */
  public function transactions()
  {
    $this->load->helper('url');
    $this->load->library("session");
    $data['app_name'] = $this->app_name;
    $data['app_version'] = $this->app_version;
    $this->app_module = "transaction View";
    $data['app_module'] = $this->app_module;
    // $data['navmenus'] = $this->getNavMenus(); //
    $this->load->view('admin/transaction', $data);
  } // .End transactions

  /**
   * Update transaction table data
   *
   */
  public function update_transaction()
  {
    $this->load->helper("url");
    $this->load->library("session");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }
    $dat['transaction_at'] = $this->input->get_post("transaction_at");
    $dat['ref_no'] = $this->input->get_post("ref_no");
    $dat['transfer_in'] = $this->input->get_post("transfer_in");
    $dat['fee'] = $this->input->get_post("fee");
    $dat['net_balance'] = $this->input->get_post("net_balance");
    $dat['status'] = $this->input->get_post("status");


    if ($this->transaction->update($dat)) {
      $this->session->set_userdata("msg", "Update Success.");
    } else {
      $this->session->set_userdata("err_msg", "Update Fail.");
    } // .End if

    redirect(site_url("welcome/transaction"));
  } // .end update_transaction

  /**
   * Delete transaction table data
   *
   */
  public function delete_transaction_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    $id  = $this->input->post("id");

    if ($this->transaction->delById($id)) {
      $json['success'] = true;
      $json['data'] = $id;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end delete_transaction


  /**
   * Update data transaction return json format
   */
  public function update_transaction_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }

    $json['data'] = array();
    $dat['transaction_at'] = $this->input->post("transaction_at");
    $dat['ref_no'] = $this->input->post("ref_no");
    $dat['transfer_in'] = $this->input->post("transfer_in");
    $dat['fee'] = $this->input->post("fee");
    $dat['net_balance'] = $this->input->post("net_balance");
    $dat['status'] = $this->input->post("status");

    if ($this->transaction->update($dat)) {
      $json['success'] = true;
      $json['data'] = $dat;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end update_transaction_json


  /**
   * Get data transaction return json format
   */
  public function gets_transaction_json()
  {
    header("content-Type:application/json; charset=utf8");
    $results = $this->transaction->gets();

    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['transaction_at']  = $results[$i]->transaction_at;
      $dat['ref_no']  = $results[$i]->ref_no;
      $dat['transfer_in']  = $results[$i]->transfer_in;
      $dat['fee']  = $results[$i]->fee;
      $dat['net_balance']  = $results[$i]->net_balance;
      $dat['status']  = $results[$i]->status;
      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;
      $dat['updated_at']  = $results[$i]->updated_at;
      $dat['updated_by']  = $results[$i]->updated_by;

      $data[] = $dat;
    }

    $json['success'] = true;
    $json['data'] = $data;

    echo json_encode($json);
  } // .end gets_transaction_json

  /**
   * Get data transaction return json format
   */
  public function search_transaction_json()
  {
    header("content-Type:application/json; charset=utf8");

    $a_column['title'] = $this->input->get("title");


    $results = $this->transaction->gets_WithLikeCondition($a_column);


    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['transaction_at']  = $results[$i]->transaction_at;
      $dat['ref_no']  = $results[$i]->ref_no;
      $dat['transfer_in']  = $results[$i]->transfer_in;
      $dat['fee']  = $results[$i]->fee;
      $dat['net_balance']  = $results[$i]->net_balance;
      $dat['status']  = $results[$i]->status;
      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;
      $dat['updated_at']  = $results[$i]->updated_at;
      $dat['updated_by']  = $results[$i]->updated_by;

      $data[] = $dat;
    }

    $json['success'] = true;
    $json['data'] = $data;

    echo json_encode($json);
  } // .end gets_transaction_json

  /**
   * Get data transaction return json format
   */
  public function gets_transaction_dt_json()
  {
    header("content-Type:application/json; charset=utf8");
    $results = $this->transaction->gets();
    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {

      $dat['id']  = $results[$i]->id;
      $dat['transaction_at']  = $results[$i]->transaction_at;
      $dat['ref_no']  = $results[$i]->ref_no;
      $dat['transfer_in']  = $results[$i]->transfer_in;
      $dat['fee']  = $results[$i]->fee;
      $dat['net_balance']  = $results[$i]->net_balance;
      $dat['status']  = $results[$i]->status;
      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;
      $dat['updated_at']  = $results[$i]->updated_at;
      $dat['updated_by']  = $results[$i]->updated_by;

      // Update Button
      $updateButton = "
           <div class=\"btn-group\">
      <button type=\"button\" class=\"btn btn-danger\">คำสั่ง</button>

      <button type=\"button\" class=\"btn btn-danger dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle Dropdown</span>
      </button>

      <div class=\"dropdown-menu\">
        <a class=\"dropdown-item\"  data-index='" . $i . "' data-id='" . $results[$i]->id . "' onclick=\"view(this)\"  href=\"#\">เรียกดู</a>
        <a class=\"dropdown-item\"  data-index='" . $i . "' data-id='" . $results[$i]->id . "' onclick=\"print(this)\"  href=\"#\">พิมพ์</a>
        <a class=\"dropdown-item\"  data-index='" . $i . "' data-id='" . $results[$i]->id . "' data-toggle='modal' data-target='#transaction' onclick='edit(this);'  href=\"#\">แก้ไข</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" href=\"#\" data-id='" . $results[$i]->id . "' onclick=\"confirmDel(this)\">ลบ</a>
      </div>

    </div>";


      $dat['action'] = $updateButton;

      $data[] = $dat;
    }


    ## Response
    $response = array(
      "iTotalRecords" => count($data),
      "recordsFiltered" => count($data),
      "data" => $data
    );

    echo json_encode($response);
  } // .end update_transaction_dt_json


  /**
   * Get data transaction return json format
   */
  public function search_transaction_dt_json()
  {
    header("content-Type:application/json; charset=utf8");
    $a_column['title'] = $this->input->get("title");
    $results = $this->transaction->gets_WithCondition($a_column);


    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['transaction_at']  = $results[$i]->transaction_at;
      $dat['ref_no']  = $results[$i]->ref_no;
      $dat['transfer_in']  = $results[$i]->transfer_in;
      $dat['fee']  = $results[$i]->fee;
      $dat['net_balance']  = $results[$i]->net_balance;
      $dat['status']  = $results[$i]->status;
      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;
      $dat['updated_at']  = $results[$i]->updated_at;
      $dat['updated_by']  = $results[$i]->updated_by;

      // Update Button
      $updateButton = "
            <div class=\"btn-group\">
       <button type=\"button\" class=\"btn btn-danger\">คำสั่ง</button>

       <button type=\"button\" class=\"btn btn-danger dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
         <span class=\"sr-only\">Toggle Dropdown</span>
       </button>

       <div class=\"dropdown-menu\">
         <a class=\"dropdown-item\" data-index='" . $i . "' data-id='" . $results[$i]->id . "' onclick=\"view(this)\"  href=\"#\">เรียกดู</a>
         <a class=\"dropdown-item\" data-index='" . $i . "' data-id='" . $results[$i]->id . "' onclick=\"print(this)\"  href=\"#\">พิมพ์</a>
         <a class=\"dropdown-item\" data-index='" . $i . "' data-id='" . $results[$i]->id . "' data-toggle='modal' data-target='#transaction' onclick='edit(this);'  href=\"#\">แก้ไข</a>
         <div class=\"dropdown-divider\"></div>
         <a class=\"dropdown-item\" href=\"#\" data-id='" . $results[$i]->id . "' onclick=\"confirmDel(this)\">ลบ</a>
       </div>

     </div>";


      $dat['action'] = $updateButton;

      $data[] = $dat;
    }


    ## Response
    $response = array(
      "iTotalRecords" => count($data),
      "recordsFiltered" => count($data),
      "data" => $data
    );

    echo json_encode($response);
  } // .end update_transaction_dt_json

  ///////////////////////////////////////

  /**
   * List withdraw table data
   *
   */
  public function withdraws()
  {
    $this->load->helper('url');
    $this->load->library("session");
    $data['app_name'] = $this->app_name;
    $data['app_version'] = $this->app_version;
    $this->app_module = "withdraw View";
    $data['app_module'] = $this->app_module;
    // $data['navmenus'] = $this->getNavMenus(); //
    $this->load->view('admin/withdraw', $data);
  } // .End withdraws

  /**
   * Update withdraw table data
   *
   */
  public function update_withdraw()
  {
    $this->load->helper("url");
    $this->load->library("session");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }
    $dat['bank_id'] = $this->input->get_post("bank_id");
    $dat['account_number'] = $this->input->get_post("account_number");
    $dat['account_name'] = $this->input->get_post("account_name");
    $dat['amount_to_withdraw'] = $this->input->get_post("amount_to_withdraw");


    if ($this->withdraw->update($dat)) {
      $this->session->set_userdata("msg", "Update Success.");
    } else {
      $this->session->set_userdata("err_msg", "Update Fail.");
    } // .End if

    redirect(site_url("welcome/withdraw"));
  } // .end update_withdraw

  /**
   * Delete withdraw table data
   *
   */
  public function delete_withdraw_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    $id  = $this->input->post("id");

    if ($this->withdraw->delById($id)) {
      $json['success'] = true;
      $json['data'] = $id;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end delete_withdraw


  /**
   * Update data withdraw return json format
   */
  public function update_withdraw_json()
  {
    $this->load->helper("url");
    $this->load->library("session");
    header("content-Type:application/json; charset=utf8");

    if ($this->input->get_post("id")) {
      $dat['id']  = $this->input->post("id");
    }

    $json['data'] = array();
    $dat['bank_id'] = $this->input->post("bank_id");
    $dat['account_number'] = $this->input->post("account_number");
    $dat['account_name'] = $this->input->post("account_name");
    $dat['amount_to_withdraw'] = $this->input->post("amount_to_withdraw");

    if ($this->withdraw->update($dat)) {
      $json['success'] = true;
      $json['data'] = $dat;
    } else {
      $json['success'] = false;
      $json['data'] = "{}";
    } // .End if

    echo json_encode($json);
  } // .end update_withdraw_json


  /**
   * Get data withdraw return json format
   */
  public function gets_withdraw_json()
  {
    header("content-Type:application/json; charset=utf8");
    $results = $this->withdraw->gets();

    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['bank_id']  = $results[$i]->bank_id;
      $r = $this->bank->getById($results[$i]->bank_id);
      $dat['bank']  = (count($r) > 0) ? $r[0]->name : "";
      $dat['account_number']  = $results[$i]->account_number;
      $dat['account_name']  = $results[$i]->account_name;
      $dat['amount_to_withdraw']  = $results[$i]->amount_to_withdraw;
      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;
      $dat['updated_at']  = $results[$i]->updated_at;
      $dat['updated_by']  = $results[$i]->updated_by;

      $data[] = $dat;
    }

    $json['success'] = true;
    $json['data'] = $data;

    echo json_encode($json);
  } // .end gets_withdraw_json

  /**
   * Get data withdraw return json format
   */
  public function search_withdraw_json()
  {
    header("content-Type:application/json; charset=utf8");

    $a_column['title'] = $this->input->get("title");


    $results = $this->withdraw->gets_WithLikeCondition($a_column);


    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['bank_id']  = $results[$i]->bank_id;
      $r = $this->bank->getById($results[$i]->bank_id);
      $dat['bank']  = (count($r) > 0) ? $r[0]->name : "";
      $dat['account_number']  = $results[$i]->account_number;
      $dat['account_name']  = $results[$i]->account_name;
      $dat['amount_to_withdraw']  = $results[$i]->amount_to_withdraw;
      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;
      $dat['updated_at']  = $results[$i]->updated_at;
      $dat['updated_by']  = $results[$i]->updated_by;

      $data[] = $dat;
    }

    $json['success'] = true;
    $json['data'] = $data;

    echo json_encode($json);
  } // .end gets_withdraw_json

  /**
   * Get data withdraw return json format
   */
  public function gets_withdraw_dt_json()
  {
    header("content-Type:application/json; charset=utf8");
    $results = $this->withdraw->gets();
    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {

      $dat['id']  = $results[$i]->id;
      $dat['bank_id']  = $results[$i]->bank_id;
      $r = $this->bank->getById($results[$i]->bank_id);
      $dat['bank']  = (count($r) > 0) ? $r[0]->name : "";
      $dat['account_number']  = $results[$i]->account_number;
      $dat['account_name']  = $results[$i]->account_name;
      $dat['amount_to_withdraw']  = $results[$i]->amount_to_withdraw;
      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;
      $dat['updated_at']  = $results[$i]->updated_at;
      $dat['updated_by']  = $results[$i]->updated_by;

      // Update Button
      $updateButton = "
           <div class=\"btn-group\">
      <button type=\"button\" class=\"btn btn-danger\">คำสั่ง</button>

      <button type=\"button\" class=\"btn btn-danger dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
        <span class=\"sr-only\">Toggle Dropdown</span>
      </button>

      <div class=\"dropdown-menu\">
        <a class=\"dropdown-item\"  data-index='" . $i . "' data-id='" . $results[$i]->id . "' onclick=\"view(this)\"  href=\"#\">เรียกดู</a>
        <a class=\"dropdown-item\"  data-index='" . $i . "' data-id='" . $results[$i]->id . "' onclick=\"print(this)\"  href=\"#\">พิมพ์</a>
        <a class=\"dropdown-item\"  data-index='" . $i . "' data-id='" . $results[$i]->id . "' data-toggle='modal' data-target='#withdraw' onclick='edit(this);'  href=\"#\">แก้ไข</a>
        <div class=\"dropdown-divider\"></div>
        <a class=\"dropdown-item\" href=\"#\" data-id='" . $results[$i]->id . "' onclick=\"confirmDel(this)\">ลบ</a>
      </div>

    </div>";


      $dat['action'] = $updateButton;

      $data[] = $dat;
    }


    ## Response
    $response = array(
      "iTotalRecords" => count($data),
      "recordsFiltered" => count($data),
      "data" => $data
    );

    echo json_encode($response);
  } // .end update_withdraw_dt_json


  /**
   * Get data withdraw return json format
   */
  public function search_withdraw_dt_json()
  {
    header("content-Type:application/json; charset=utf8");
    $a_column['title'] = $this->input->get("title");
    $results = $this->withdraw->gets_WithCondition($a_column);


    $json['data'] = array();
    $data = array();
    for ($i = 0; $i < count($results); $i++) {
      $dat['id']  = $results[$i]->id;
      $dat['bank_id']  = $results[$i]->bank_id;
      $dat['account_number']  = $results[$i]->account_number;
      $dat['account_name']  = $results[$i]->account_name;
      $dat['amount_to_withdraw']  = $results[$i]->amount_to_withdraw;
      $dat['created_at']  = $results[$i]->created_at;
      $dat['created_by']  = $results[$i]->created_by;
      $dat['updated_at']  = $results[$i]->updated_at;
      $dat['updated_by']  = $results[$i]->updated_by;

      // Update Button
      $updateButton = "
            <div class=\"btn-group\">
       <button type=\"button\" class=\"btn btn-danger\">คำสั่ง</button>

       <button type=\"button\" class=\"btn btn-danger dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
         <span class=\"sr-only\">Toggle Dropdown</span>
       </button>

       <div class=\"dropdown-menu\">
         <a class=\"dropdown-item\" data-index='" . $i . "' data-id='" . $results[$i]->id . "' onclick=\"view(this)\"  href=\"#\">เรียกดู</a>
         <a class=\"dropdown-item\" data-index='" . $i . "' data-id='" . $results[$i]->id . "' onclick=\"print(this)\"  href=\"#\">พิมพ์</a>
         <a class=\"dropdown-item\" data-index='" . $i . "' data-id='" . $results[$i]->id . "' data-toggle='modal' data-target='#withdraw' onclick='edit(this);'  href=\"#\">แก้ไข</a>
         <div class=\"dropdown-divider\"></div>
         <a class=\"dropdown-item\" href=\"#\" data-id='" . $results[$i]->id . "' onclick=\"confirmDel(this)\">ลบ</a>
       </div>

     </div>";


      $dat['action'] = $updateButton;

      $data[] = $dat;
    }


    ## Response
    $response = array(
      "iTotalRecords" => count($data),
      "recordsFiltered" => count($data),
      "data" => $data
    );

    echo json_encode($response);
  } // .end update_withdraw_dt_json

  ///////////////////////////////////////

}
