<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_record');
    }


    public function index(){
        $this->load->view('login');
    }

    function login(){
        $user = $this->input->post('user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        if($user == 'admin'){
          if($this->form_validation->run() != false){
              $where = array(
                  'admin_username' => $username,
                  'admin_password' => md5($password)
              );
              $data = $this->m_record->edit_data($where,'admin');
              $d = $this->m_record->edit_data($where,'admin')->row();
              $cek = $data->num_rows();
              if($cek > 0){
                  $session = array(
                      'id' => $d->admin_id,
                      'nama' => $d->admin_nama,
                      'usertype' => $d->admin_type,
                      'status' => 'login'
                  );
                  $this->session->set_userdata($session);
                  redirect(base_url().'main_page');
              } else {
                  redirect(base_url().'welcome?pesan=gagal');
              }
          } else {
              $this->load->view('login');
          }
        }else if($user == 'tutor'){
          if($this->form_validation->run() != false){
              $where = array(
                  'username' => $username,
                  'password' => $password
              );
              $data = $this->m_record->edit_data($where,'tutor');
              $d = $this->m_record->edit_data($where,'tutor')->row();
              $cek = $data->num_rows();
              if($cek > 0){
                  $session2 = array(
                      'tutor_id' => $d->tutor_id,
                      'tutor_name' => $d->tutor_name,
                      'tutor_email' => $d->tutor_email,
                      'usertype' => 'tutor',
                      'status' => 'login'
                  );
                  $this->session->set_userdata($session2);
                  redirect(base_url().'main_page');
              } else {
                  redirect(base_url().'welcome?pesan=gagal');
              }
          } else {
              $this->load->view('login');
          }
        }
    }
}
