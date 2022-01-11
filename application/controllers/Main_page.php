<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_page extends CI_Controller {


	public function index()
	{
	    $data['student'] = $this->m_record->get_data('student')->result();
			$data['attendance'] = $this->m_record->get_data('attendance')->result();
			$data['ageing'] = $this->m_record->get_data_ageing()->result();
			$data['class'] = $this->m_record->get_class_list($this->session->userdata('tutor_id'))->result();
			if($this->session->userdata('usertype')=='tutor'){
				$this->load->view('appmodule/dashboard_tutor',$data);
			}else if($this->session->userdata('usertype')=='head_admin') {
				$this->load->view('appmodule/dashboard',$data);
			}else{
				$this->load->view('appmodule/dashboard_others',$data);
			}


	}
}
