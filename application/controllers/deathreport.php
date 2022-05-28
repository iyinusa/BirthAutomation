<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deathreport extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();
		$this->load->model('user'); //load MODEL
		$this->load->model('mdeath'); //load MODEL
		$this->load->model('mcentre'); //load MODEL
		$this->load->model('moccurance'); //load MODEL
		$this->load->model('mstate'); //load MODEL
		$this->load->model('mlga'); //load MODEL
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
		$get_id = $this->input->get('cert');
		if($get_id != ''){
			$gq = $this->mdeath->query_death_id($get_id);
			foreach($gq as $item){
				$data['e_id'] = $item->id;
				$data['e_centre_id'] = $item->centre_id;
				$data['e_rec_date'] = $item->rec_date;
				$data['e_fullname'] = $item->fullname;
				$data['e_sex'] = $item->sex;
				$data['e_cause_id'] = $item->cause_id;
				$data['e_m_age'] = $item->age;
				$data['e_m_country'] = $item->country;
				$data['e_m_state_id'] = $item->state_id;
				$data['e_m_address'] = $item->address;
				$data['e_m_education_id'] = $item->education_id;
				$data['e_m_occupation_id'] = $item->occupation_id;
				$data['e_m_marital'] = $item->marital;
				$data['e_i_fullname'] = $item->i_fullname;
				$data['e_i_address'] = $item->i_address;
				$data['e_i_phone'] = $item->i_phone;
				$data['e_i_relationship_id'] = $item->i_relationship_id;
				
				//get occurance name
				$occur_name = '';
				//$getoccur = $this->moccurance->query_occurance_id($item->occur_id);
//				if(!empty($getoccur)){
//					foreach($getoccur as $occur){
//						$occur_name = $occur->name;
//					}
//				}
				$data['e_occur'] = $occur_name;
				
				//get centre name
				$center_name = '';
				$getcentre = $this->mcentre->query_centre_id($item->centre_id);
				if(!empty($getcentre)){
					foreach($getcentre as $centre){
						$center_name = $centre->name;
					}
				}
				$data['e_centre_name'] = $center_name;
				
				//get state name
				$state_name = '';
				$getstate = $this->mstate->query_state_id($item->state_id);
				if(!empty($getstate)){
					foreach($getstate as $state){
						$state_name = $state->name;
					}
				}
				$data['e_state_name'] = $state_name;
		
				
				$data['title'] = 'Death Certificate | NPC';
				$this->load->view('deathcert', $data);
			}
		} else {
			
			
			//query uploads
			$data['allup'] = $this->mdeath->query_death();
			$data['allcentre'] = $this->mdeath->query_centre();
			$data['alloccur'] = $this->mdeath->query_occur();
			$data['allstate'] = $this->mdeath->query_state();
			$data['alloccupation'] = $this->mdeath->query_occupation();
			$data['alleducation'] = $this->mdeath->query_education();
			$data['allrelation'] = $this->mdeath->query_relation();
			
			$data['log_username'] = $this->session->userdata('log_username');
		  
			$data['title'] = 'Death Report | NPC';
			$data['page_act'] = 'report';
	
			$this->load->view('designs/header', $data);
			$this->load->view('designs/leftmenu', $data);
			$this->load->view('deathreport', $data);
			$this->load->view('designs/footer', $data);
		}
	}
}