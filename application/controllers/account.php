<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('user'); //load MODEL
		//$this->load->model('mstate'); //load MODEL
		//$this->load->model('mlga'); //load MODEL
		$this->load->model('mcentre'); //load MODEL
		$this->load->helper('text'); //for content limiter
		$this->load->library('form_validation'); //load form validate rules
		$this->load->library('image_lib'); //load image library
		
		//mail config settings
		$this->load->library('email'); //load email library
		//$config['protocol'] = 'sendmail';
		//$config['mailpath'] = '/usr/sbin/sendmail';
		//$config['charset'] = 'iso-8859-1';
		//$config['wordwrap'] = TRUE;
		
		//$this->email->initialize($config);
    }
	
	public function index() {
		if($this->session->userdata('logged_in')==FALSE){ 
			redirect(base_url().'login/', 'location');
		} else {
			if($this->session->userdata('itc_user_role') == 'Registrar') {
				redirect(base_url().'dashboard/', 'location');
			}
		}
		
		//check for update
		$get_id = $this->input->get('edit');
		if($get_id != ''){
			$gq = $this->user->query_user_id($get_id);
			foreach($gq as $item){
				$data['e_id'] = $item->user_id;
				$data['e_centre_id'] = $item->centre_id;
				$data['e_firstname'] = $item->firstname;
				$data['e_lastname'] = $item->lastname;	
				$data['e_username'] = $item->username;
				$data['e_password'] = $item->password;
				$data['e_phone'] = $item->phone;
				$data['e_email'] = $item->email;
				$data['e_role'] = $item->role;
			}
		}
		
		//check record delete
		$del_id = $this->input->get('del');
		if($del_id != ''){
			if($this->user->delete_user($del_id) > 0){
				$data['err_msg'] = '<div class="alert alert-info"><h5>Deleted</h5></div>';
			} else {
				$data['err_msg'] = '<div class="alert alert-info"><h5>There is problem this time. Try later</h5></div>';
			}
		}
		
		//check if ready for post
		if($_POST){
			$acc_id = $_POST['acc_id'];
			$centre_id = $_POST['centre_id'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$role = $_POST['role'];
			
			if($this->user->check_by_username($username) > 0 && $acc_id = ''){
				$data['err_msg'] = '<div class="alert alert-info"><h5>User with this username already exist</h5></div>';
			} else {
				//check for update
				if($acc_id != '' || !empty($acc_id)) {
					if($password == ''){
						$upd_data = array(
							'centre_id' => $centre_id,
							'firstname' => $firstname,
							'lastname' => $lastname,
							'username' => $username,
							'phone' => $phone,
							'email' => $email,
							'role' => $role,
						);
					} else {
						$password = md5($password);
						$upd_data = array(
							'centre_id' => $centre_id,
							'firstname' => $firstname,
							'lastname' => $lastname,
							'username' => $username,
							'password' => $password,
							'phone' => $phone,
							'email' => $email,
							'role' => $role,
						);
					}
					
					if($this->user->update_user($acc_id, $upd_data) > 0){
						$data['err_msg'] = '<div class="alert alert-info"><h5>Successfully</h5></div>';
					} else {
						$data['err_msg'] = '<div class="alert alert-info"><h5>No Changes Made</h5></div>';
					}
				} else {
					$password = md5($password);
					$reg_data = array(
						'centre_id' => $centre_id,
						'firstname' => $firstname,
						'lastname' => $lastname,
						'username' => $username,
						'password' => $password,
						'phone' => $phone,
						'email' => $email,
						'role' => $role,
					);
					
					if($this->user->checks('username', $username, 'centre_id', $centre_id, 'bz_user') > 0) {
						$data['err_msg'] = '<div class="alert alert-info"><h5>Already exist</h5></div>';
					} else {
						if($this->user->reg_insert($reg_data) > 0){
							$data['err_msg'] = '<div class="alert alert-info"><h5>Successfully</h5></div>';
						} else {
							$data['err_msg'] = '<div class="alert alert-info"><h5>There is problem this time. Try later</h5></div>';
						}
					}
				}	
			}
		}
		
		//query uploads
		$data['allcentre'] = $this->mcentre->query_centre();
		$data['alluser'] = $this->user->query_user();
		
		$data['log_username'] = $this->session->userdata('log_username');
	  
	  	$data['title'] = 'User Accounts | NPC';
		$data['page_act'] = 'account';

	  	$this->load->view('designs/header', $data);
		$this->load->view('designs/leftmenu', $data);
	  	$this->load->view('account', $data);
	  	$this->load->view('designs/footer', $data);
	}
	
	function do_upload($htmlFieldName, $path)
    {
        $config['file_name'] = time();
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|tif';
        $config['max_size'] = '10000';
        $config['max_width'] = '6000';
        $config['max_height'] = '6000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        unset($config);
        if (!$this->upload->do_upload($htmlFieldName))
        {
            return array('error' => $this->upload->display_errors(), 'status' => 0);
        } else
        {
            $up_data = $this->upload->data();
			return array('status' => 1, 'upload_data' => $this->upload->data(), 'image_width' => $up_data['image_width'], 'image_height' => $up_data['image_height']);
        }
    }
	
	function resize_image($sourcePath, $desPath, $width = '500', $height = '500', $real_width, $real_height)
    {
        $this->image_lib->clear();
		$config['image_library'] = 'gd2';
        $config['source_image'] = $sourcePath;
        $config['new_image'] = $desPath;
        $config['quality'] = '100%';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker'] = '';
		$config['width'] = $width;
        $config['height'] = $height;
		
		$dim = (intval($real_width) / intval($real_height)) - ($config['width'] / $config['height']);
		$config['master_dim'] = ($dim > 0)? "height" : "width";
		
		$this->image_lib->initialize($config);
 
        if ($this->image_lib->resize())
            return true;
        return false;
    }
	
	function crop_image($sourcePath, $desPath, $width = '320', $height = '320')
    {
        $this->image_lib->clear();
        $config['image_library'] = 'gd2';
        $config['source_image'] = $sourcePath;
        $config['new_image'] = $desPath;
        $config['quality'] = '100%';
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $width;
        $config['height'] = $height;
		$config['x_axis'] = '20';
		$config['y_axis'] = '20';
        
		$this->image_lib->initialize($config);
 
        if ($this->image_lib->crop())
            return true;
        return false;
    }
}