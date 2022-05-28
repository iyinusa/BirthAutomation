<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stillbirth extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('user'); //load MODEL
		$this->load->model('mstillbirth'); //load MODEL
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
		}
		
		//check for update
		$get_id = $this->input->get('edit');
		if($get_id != ''){
			$gq = $this->mstillbirth->query_stillbirth_id($get_id);
			foreach($gq as $item){
				$data['e_id'] = $item->id;
				$data['e_centre_id'] = $item->centre_id;
				$data['e_rec_date'] = $item->rec_date;
				$data['e_fullname'] = $item->fullname;
				$data['e_day'] = $item->dob_day;
				$data['e_month'] = $item->dob_month;
				$data['e_year'] = $item->dob_year;
				$data['e_sex'] = $item->sex;
				$data['e_occur_id'] = $item->occur_id;
				$data['e_town'] = $item->town;
				$data['e_type'] = $item->type;
				$data['e_birth_order'] = $item->birth_order;
				$data['e_m_fullname'] = $item->m_fullname;
				$data['e_m_age'] = $item->m_age;
				$data['e_m_country'] = $item->m_country;
				$data['e_m_state_id'] = $item->m_state_id;
				$data['e_m_address'] = $item->m_address;
				$data['e_m_education_id'] = $item->m_education_id;
				$data['e_m_occupation_id'] = $item->m_occupation_id;
				$data['e_m_phone'] = $item->m_phone;
				$data['e_m_marital'] = $item->m_marital;
			}
		}
		
		//check record delete
		$del_id = $this->input->get('del');
		if($del_id != ''){
			if($this->mstillbirth->delete_stillbirth($del_id) > 0){
				$data['err_msg'] = '<div class="alert alert-info"><h5>Deleted</h5></div>';
			} else {
				$data['err_msg'] = '<div class="alert alert-info"><h5>There is problem this time. Try later</h5></div>';
			}
		}
		
		//check if ready for post
		if($_POST){
			$stillbirth_id = $_POST['stillbirth_id'];
			$centre_id = $_POST['centre_id'];
			$rec_date = $_POST['rec_date'];
			$fullname = $_POST['fullname'];
			$day = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			$occur_id = $_POST['occur_id'];
			$town = $_POST['town'];
			$type = $_POST['type'];
			$sex = $_POST['sex'];
			$order = $_POST['order'];
			$mfullname = $_POST['mfullname'];
			$maddress = $_POST['maddress'];
			$mage = $_POST['mage'];
			$mphone = $_POST['mphone'];
			$mstate_id = $_POST['mstate_id'];
			$moccupation_id = $_POST['moccupation_id'];
			$meducation_id = $_POST['meducation_id'];
			$mcountry = $_POST['mcountry'];
			$mmarital = $_POST['mmarital'];
			
			$now = date('j M Y H:ma');
			
			//check for update
			if($stillbirth_id != ''){
				$upd_data = array(
					'centre_id' => $centre_id,
					'rec_date' => $rec_date,
					'fullname' => $fullname,
					'dob_day' => $day,
					'dob_month' => $month,
					'dob_year' => $year,
					'sex' => $sex,
					'occur_id' => $occur_id,
					'town' => $town,
					'type' => $type,
					'birth_order' => $order,
					'm_fullname' => $mfullname,
					'm_age' => $mage,
					'm_country' => $mcountry,
					'm_state_id' => $mstate_id,
					'm_address' => $maddress,
					'm_education_id' => $meducation_id,
					'm_occupation_id' => $moccupation_id,
					'm_phone' => $mphone,
					'm_marital' => $mmarital
				);
				
				if($this->mstillbirth->update_stillbirth($stillbirth_id, $upd_data) > 0){
					$data['err_msg'] = '<div class="alert alert-info"><h5>Successfully</h5></div>';
				} else {
					$data['err_msg'] = '<div class="alert alert-info"><h5>No Changes Made</h5></div>';
				}
			} else {
				$reg_data = array(
					'centre_id' => $centre_id,
					'rec_date' => $rec_date,
					'fullname' => $fullname,
					'dob_day' => $day,
					'dob_month' => $month,
					'dob_year' => $year,
					'sex' => $sex,
					'occur_id' => $occur_id,
					'town' => $town,
					'type' => $type,
					'birth_order' => $order,
					'm_fullname' => $mfullname,
					'm_age' => $mage,
					'm_country' => $mcountry,
					'm_state_id' => $mstate_id,
					'm_address' => $maddress,
					'm_education_id' => $meducation_id,
					'm_occupation_id' => $moccupation_id,
					'm_phone' => $mphone,
					'm_marital' => $mmarital,
					'reg_date' => $now
				);
				
				if($this->user->checks('fullname', $fullname, 'centre_id', $centre_id, 'bz_stillbirth') > 0) {
					$data['err_msg'] = '<div class="alert alert-info"><h5>Already exist</h5></div>';
				} else {
					if($this->mstillbirth->reg_insert($reg_data) > 0){
						$data['err_msg'] = '<div class="alert alert-info"><h5>Successfully</h5></div>';
					} else {
						$data['err_msg'] = '<div class="alert alert-info"><h5>There is problem this time. Try later</h5></div>';
					}
				}
			}
		}
		
		//query uploads
		$data['allup'] = $this->mstillbirth->query_stillbirth();
		$data['allcentre'] = $this->mstillbirth->query_centre();
		$data['alloccur'] = $this->mstillbirth->query_occur();
		$data['allstate'] = $this->mstillbirth->query_state();
		$data['allcountry'] = $this->mstillbirth->query_country();
		$data['alloccupation'] = $this->mstillbirth->query_occupation();
		$data['alleducation'] = $this->mstillbirth->query_education();
		$data['allrelation'] = $this->mstillbirth->query_relation();
		
		$data['log_username'] = $this->session->userdata('log_username');
	  
	  	$data['title'] = 'Still Birth | NPC';
		$data['page_act'] = 'registration';

	  	$this->load->view('designs/header', $data);
		$this->load->view('designs/leftmenu', $data);
	  	$this->load->view('stillbirth', $data);
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