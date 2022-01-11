<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Appmodule extends CI_Controller{
    function __construct(){
        parent::__construct();
        //cek login
        if($this->session->userdata('status') != 'login'){
            redirect(base_url().'welcome?pesan=belumlogin');
        }
    }

    //fungsi utk tampilan dashboard admin
    function index(){
      // $data['transaksi'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=mobil_id and transaksi_kostumer=kostumer_id order by transaksi_id desc limit 10")->result(); //transaksi terakhir
        //$data['kostumer'] = $this->db->query("select * from kostumer order by kostumer_id desc limit 5")->result(); //menampilkan kostumer baru
        //$data['mobil'] = $this->db->query("select * from mobil order by mobil_id desc limit 4")->result(); //menampilkan mobil baru
        $this->load->view('header_top');
        $this->load->view('header_left');
        //$this->load->view('module/student',$data);
       // $this->load->view('admin/footer');
    }

    //fungsi ganti password
    function ganti_password(){
        $this->load->view('admin/header');
        $this->load->view('admin/ganti_password');
        $this->load->view('admin/footer');
    }

    function ganti_password_act(){
        $pass_baru  = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru','Password baru','required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass','Ulangi password baru','required');

        if($this->form_validation->run() != false){
            $data   = array('admin_password' => md5($pass_baru));
            $w      = array('admin_id' => $this->session->userdata('id'));
            $this->m_rental->update_data($w,$data,'admin');
            redirect(base_url().'admin/ganti_password?pesan=berhasil');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/ganti_password');
            $this->load->view('admin/footer');
        }
    }

    //parent login
    function forgot_password(){
      $data['parent'] = $this->m_record->get_data_join('parent','login_parent','parent_id','parent_id')->result();

      $this->load->view('appmodule/forgot_password',$data);
    }

    function get_parent(){
      $data['parent'] = $this->m_record->get_data_join('parent','login_parent','parent_id','parent_id')->result();
      echo json_encode($data);

    }

    //fungsi logout
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome?pesan=logout');
    }



 //fungsi CRUD Student

    function student(){
        $data['student'] = $this->m_record->get_data('student')->result();

        $this->load->view('register/student',$data);
    }


    function student_add(){
        $data['parent'] = $this->m_record->get_data('parent')->result();
        $this->load->view('register/student_add',$data);

    }

    function student_add_act(){

        $i_IDC              = $this->input->post('i_IDC');
        $i_Name             = $this->input->post('i_Name');
        $i_ParentID         = $this->input->post('i_ParentID');
        $i_Contact_Number   = $this->input->post('i_Contact_Number');
        $i_Email            = $this->input->post('i_Email');
        $i_Status           = $this->input->post('i_Status');

         $this->form_validation->set_rules('i_Name','Name','required');

        if($this->form_validation->run() != false){
            $data = array(
                'IDC'               =>$i_IDC,
                'Name'              =>$i_Name,
                'ParentID'          =>$i_ParentID,
                'Contact_Number'    =>$i_Contact_Number,
                'Email'             =>$i_Email,
                'Status'            =>$i_Status,
            );

            $this->m_record->insert_data($data, 'student');

            redirect(base_url().'appmodule/student');
        } else {

            $this->load->view('register/student_add');

        }
    }

    function student_edit($id){
        $where = array('id' => $id);
        $data['student'] = $this->m_record->edit_data($where,'student')->result();

        $this->load->view('register/student_edit',$data);

    }

    function student_update(){
        $id     = $this->input->post('id');
        $i_IDC              = $this->input->post('i_IDC');
        $i_Name             = $this->input->post('i_Name');
        $i_ParentID         = $this->input->post('i_ParentID');
        $i_Contact_Number   = $this->input->post('i_Contact_Number');
        $i_Email            = $this->input->post('i_Email');
        $i_Status           = $this->input->post('i_Status');

         $this->form_validation->set_rules('i_Name','Name','required');

        if($this->form_validation->run() != false){

            $where = array('id' => $id);
            $data = array(
                'IDC'               =>$i_IDC,
                'Name'              =>$i_Name,
                'ParentID'          =>$i_ParentID,
                'Contact_Number'    =>$i_Contact_Number,
                'Email'             =>$i_Email,
                'Status'            =>$i_Status,
            );


            $this->m_record->update_data($where, $data, 'student');

            redirect(base_url().'appmodule/student');
        } else {

            $this->load->view('register/student_edit');

        }
    }

    function student_hapus($id){
        $where = array('id' => $id);
        $this->m_record->delete_data($where, 'student');
        redirect(base_url().'appmodule/student');
    }



//fungsi CRUD Student_subject

    function student_subject($id){

          $where = array('student_id' => $id);
          $data['student_subject'] = $this->m_record->get_data_filter($where,'student_subject')->result();
          $data['course'] = $this->m_record->get_data('course')->result();

          $where = array('IDC' => $id);
          $data['student']=$this->m_record->get_data_filter($where,'student')->result();


           $this->load->view('register/student_subject',$data);
    }

    function student_subject2($id){

          $where = array('student_id' => $id);
          $data['student_subject'] = $this->m_record->get_data_join_course($id)->result();
          $data['course'] = $this->m_record->get_data_join_exists($id)->result();

          $where = array('IDC' => $id);
          $data['student']=$this->m_record->get_data_filter($where,'student')->result();


           $this->load->view('register/student_subject',$data);

    }




    function student_subject_addbylist($id){

        $i_student_id    = $this->input->post('i_student_id');
        $i_subject_id    = $this->input->post('i_subject_id');
        $i_status        = $this->input->post('i_status');
        $i_type          = $this->input->post('i_course_type');

         $this->form_validation->set_rules('i_student_id','student_id','required');
         if($this->form_validation->run() != false){
            $data = array(
                'student_id'     =>$i_student_id,
                'subject_id'     =>$i_subject_id,
                'status'         =>$i_status,
                'type'           =>$i_type,

            );

        $this->m_record->insert_data($data, 'student_subject');

       $where = array('student_id' => $id);
       $data['student_subject'] = $this->m_record->get_data_join_course($id)->result();
       $data['course'] = $this->m_record->get_data_join_exists($id)->result();

        $where = array('IDC' => $id);
        $data['student']=$this->m_record->get_data_filter($where,'student')->result();
        $this->load->view('register/student_subject',$data);

      }
    }

    function student_subject_add_act(){

        $i_IDC              = $this->input->post('i_IDC');
        $i_Name             = $this->input->post('i_Name');
        $i_ParentID         = $this->input->post('i_ParentID');
        $i_Contact_Number   = $this->input->post('i_Contact_Number');
        $i_Email            = $this->input->post('i_Email');
        $i_Status           = $this->input->post('i_Status');

         $this->form_validation->set_rules('i_Name','Name','required');

        if($this->form_validation->run() != false){
            $data = array(
                'IDC'               =>$i_IDC,
                'Name'              =>$i_Name,
                'ParentID'          =>$i_ParentID,
                'Contact_Number'    =>$i_Contact_Number,
                'Email'             =>$i_Email,
                'Status'            =>$i_Status,
            );

            $this->m_record->insert_data($data, 'student');

            redirect(base_url().'appmodule/student');
        } else {

            $this->load->view('register/student_add');

        }
    }

    function student_subject_edit($id){
        $where = array('id' => $id);
        $data['student'] = $this->m_record->edit_data($where,'student')->result();

        $this->load->view('register/student_edit',$data);

    }

    function student_subject_update(){
        $id     = $this->input->post('id');
        $i_IDC              = $this->input->post('i_IDC');
        $i_Name             = $this->input->post('i_Name');
        $i_ParentID         = $this->input->post('i_ParentID');
        $i_Contact_Number   = $this->input->post('i_Contact_Number');
        $i_Email            = $this->input->post('i_Email');
        $i_Status           = $this->input->post('i_Status');

         $this->form_validation->set_rules('i_Name','Name','required');

        if($this->form_validation->run() != false){

            $where = array('id' => $id);
            $data = array(
                'IDC'               =>$i_IDC,
                'Name'              =>$i_Name,
                'ParentID'          =>$i_ParentID,
                'Contact_Number'    =>$i_Contact_Number,
                'Email'             =>$i_Email,
                'Status'            =>$i_Status,
            );


            $this->m_record->update_data($where, $data, 'student');

            redirect(base_url().'appmodule/student');
        } else {

            $this->load->view('register/student_edit');

        }
    }

    function student_subject_hapus($id, $stud_id){
        $where = array('stu_sub_id' => $id);
        $this->m_record->delete_data($where, 'student_subject');

        $where = array('student_id' => $stud_id);
        $data['student_subject'] = $this->m_record->get_data_join_course($stud_id)->result();
        $data['course'] = $this->m_record->get_data_join_exists($stud_id)->result();

        $where = array('IDC' => $stud_id);
        $data['student']=$this->m_record->get_data_filter($where,'student')->result();
        $this->load->view('register/student_subject',$data);
        //redirect(base_url().'appmodule/student_subject');
    }


 //fungsi CRUD Courses

    function course(){
        $data['course'] = $this->m_record->get_data('course')->result();

        $this->load->view('register/course',$data);
    }

    function student_report(){
        $data['student'] = $this->m_record->get_data('student')->result();
        $data['subject'] = $this->m_record->get_data('course')->result();

        $this->load->view('register/student_report',$data);
    }

    function get_student_report(){
        $stud_id = $this->input->post('id', TRUE);
        $data = $this->m_record->get_data_join3($stud_id)->result();
        echo json_encode($data);
    }

    function course_add(){

        $this->load->view('register/course_add');

    }

    function course_add_act(){

        $i_Course_Code          = $this->input->post('i_Course_Code');
        $i_Course_Name          = $this->input->post('i_Course_Name');
        $i_Course_level         = $this->input->post('i_Course_level');
        $i_Course_Description   = $this->input->post('i_Course_Description');
        $i_Course_Type          = $this->input->post('i_Course_Type');
        $i_Course_Amount        = $this->input->post('i_fee');


         $this->form_validation->set_rules('i_Course_Code','Course_Code','required');

        if($this->form_validation->run() != false){
            $data = array(
                'Course_Code'           =>$i_Course_Code,
                'Course_Name'           =>$i_Course_Name,
                'Course_level'          =>$i_Course_level,
                'Course_Description'    =>$i_Course_Description,
                'Course_Type'           =>$i_Course_Type,
                'Course_Amount'           =>$i_Course_Amount,

            );

            $this->m_record->insert_data($data, 'course');

            redirect(base_url().'appmodule/course');
        } else {

            $this->load->view('register/course_add');

        }
    }

    function course_edit($id){
        $where = array('id' => $id);
        $data['course'] = $this->m_record->edit_data($where,'course')->result();

        $this->load->view('register/course_edit',$data);

    }

    function course_update(){
        $id     = $this->input->post('id');
        $i_Course_Code              = $this->input->post('i_Course_Code');
        $i_Course_Name             = $this->input->post('i_Course_Name');
        $i_Course_level         = $this->input->post('i_Course_level');
        $i_Course_Description   = $this->input->post('i_Course_Description');
        $i_Course_Type            = $this->input->post('i_Course_Type');

         $this->form_validation->set_rules('i_Course_Code','Course_Code','required');

        if($this->form_validation->run() != false){

            $where = array('id' => $id);
            $data = array(
                'Course_Code'           =>$i_Course_Code,
                'Course_Name'           =>$i_Course_Name,
                'Course_level'          =>$i_Course_level,
                'Course_Description'    =>$i_Course_Description,
                'Course_Type'           =>$i_Course_Type,
            );


            $this->m_record->update_data($where, $data, 'course');

            redirect(base_url().'appmodule/course');
        } else {

            $this->load->view('register/course_edit');

        }
    }
    function course_hapus($id){
        $where = array('id' => $id);
        $this->m_record->delete_data($where, 'course');
        redirect(base_url().'appmodule/course');
    }


//fungsi CRUD Parent

    function parent(){
        $data['parent'] = $this->m_record->get_data('parent')->result();

        $this->load->view('register/parent',$data);
    }


    function parent_add(){

        $this->load->view('register/parent_add');

    }

    function parent_add_act(){

        $i_parent_name             = $this->input->post('i_parent_name');
        $i_parent_id               = $this->input->post('i_parent_id');
        $i_parent_contact_number   = $this->input->post('i_parent_contact_number');
        $i_parent_email            = $this->input->post('i_parent_email');
        $i_parent_socmed           = $this->input->post('i_parent_socmed');
        $i_parent_address          = $this->input->post('i_parent_address');
        $i_parent_poscode          = $this->input->post('i_parent_poscode');
        $i_parent_district         = $this->input->post('i_parent_district');
        $i_parent_state            = $this->input->post('parent_state');




         $this->form_validation->set_rules('i_parent_id','parent_id','required');

        if($this->form_validation->run() != false){
            $data = array(
                'parent_name'               =>$i_parent_name,
                'parent_id'                 =>$i_parent_id,
                'parent_contact_number'   =>$i_parent_contact_number,
                'parent_email'            =>$i_parent_email,
                'parent_socmed'           =>$i_parent_socmed,
                'parent_address'          =>$i_parent_address,
                'parent_poscode'          =>$i_parent_poscode,
                'parent_district'         =>$i_parent_district,
                'parent_state'            =>$i_parent_state,


            );

            $this->m_record->insert_data($data, 'parent');

            redirect(base_url().'appmodule/parent');
        } else {

            $this->load->view('register/parent_add');

        }
    }

    function parent_edit($id){
        $where = array('id' => $id);
        $data['parent'] = $this->m_record->edit_data($where,'parent')->result();

        $this->load->view('register/parent_edit',$data);

    }

    function parent_open($id){
        $where = array('parent_id' => $id);
        $data['parent'] = $this->m_record->edit_data($where,'parent')->result();

        $where = array('ParentID' => $id);
        $data['student'] = $this->m_record->edit_data($where,'student')->result();

        $data['invoice'] = $this->m_record->get_data_bil($id)->result();
        $data['payment'] = $this->m_record->get_data_pay($id)->result();

        $this->load->view('register/parent_per_file',$data);

    }

    function parent_update(){
        $id     = $this->input->post('id');
        $i_parent_name             = $this->input->post('i_parent_name');
        $i_parent_id               = $this->input->post('i_parent_id');
        $i_parent_contact_number   = $this->input->post('i_parent_contact_number');
        $i_parent_email            = $this->input->post('i_parent_email');
        $i_parent_socmed           = $this->input->post('i_parent_socmed');
        $i_parent_address          = $this->input->post('i_parent_address');
        $i_parent_poscode          = $this->input->post('i_parent_poscode');
        $i_parent_district         = $this->input->post('i_parent_district');
        $i_parent_state            = $this->input->post('i_parent_state');


         $this->form_validation->set_rules('i_parent_id','parent_id','required');

        if($this->form_validation->run() != false){

            $where = array('id' => $id);
            $data = array(

                'parent_name'               =>$i_parent_name,
                'parent_id'                 =>$i_parent_id,
                'parent_contact_number'   =>$i_parent_contact_number,
                'parent_email'            =>$i_parent_email,
                'parent_socmed'           =>$i_parent_socmed,
                'parent_address'          =>$i_parent_address,
                'parent_poscode'          =>$i_parent_poscode,
                'parent_district'         =>$i_parent_district,
                'parent_state'            =>$i_parent_state,
            );


            $this->m_record->update_data($where, $data, 'parent');

            redirect(base_url().'appmodule/parent');
        } else {

            $this->load->view('register/parent_edit');

        }
    }

    function parent_hapus($id){
        $where = array('id' => $id);
        $this->m_record->delete_data($where, 'parent');
        redirect(base_url().'appmodule/parent');
    }


//fungsi CRUD Tutor

    function tutor(){
        $data['tutor'] = $this->m_record->get_data('tutor')->result();

        $this->load->view('tutor/tutor',$data);
    }


    function tutor_add(){

        $this->load->view('tutor/tutor_add');

    }

    function tutor_add_act(){

        $i_tutor_name             = $this->input->post('i_tutor_name');
        $i_tutor_id              = $this->input->post('i_tutor_id');
        $i_tutor_address   = $this->input->post('i_tutor_address');
        $i_tutor_poscode            = $this->input->post('i_tutor_poscode');
        $i_tutor_district           = $this->input->post('i_tutor_district');
        $i_tutor_state          = $this->input->post('i_tutor_state');
        $i_tutor_phone          = $this->input->post('i_tutor_phone');
        $i_tutor_email         = $this->input->post('i_tutor_email');
        $i_tutor_bank            = $this->input->post('i_tutor_bank');
        $i_tutor_account            = $this->input->post('i_tutor_account');




        $this->form_validation->set_rules('i_tutor_id','i_tutor_name','required');

        if($this->form_validation->run() != false){
            $data = array(
                'tutor_name'            =>$i_tutor_name,
                'tutor_id'              =>$i_tutor_id,
                'tutor_address'         =>$i_tutor_address,
                'tutor_poscode'         =>$i_tutor_poscode,
                'tutor_district'        =>$i_tutor_district,
                'tutor_state'           =>$i_tutor_state,
                'tutor_phone'           =>$i_tutor_phone,
                'tutor_email'           =>$i_tutor_email,
                'tutor_bank'            =>$i_tutor_bank,
                'tutor_account'         =>$i_tutor_account,
                'username'              =>$i_tutor_email,
                'password'              =>'123',



            );

            $this->m_record->insert_data($data, 'tutor');

            redirect(base_url().'appmodule/tutor');
        } else {

            $this->load->view('tutor/tutor_add');

        }
    }

    function tutor_edit($id){
        $where = array('id' => $id);
        $data['tutor'] = $this->m_record->edit_data($where,'tutor')->result();

        $this->load->view('tutor/tutor_edit',$data);

    }

    function tutor_open($id){
        $where = array('id' => $id);

        $data['tutor'] = $this->m_record->edit_data($where,'tutor')->result();
        // $data['student'] = $this->m_record->get_data('student')->result();
          $where = array('tutor_id' => $id);
         $data['tutor'] = $this->m_record->edit_data($where,'tutor')->result();

        $this->load->view('tutor/tutor_per_file',$data);

    }

    function tutor_update(){
        $id     = $this->input->post('id');
        $i_tutor_name             = $this->input->post('i_tutor_name');
        $i_tutor_id               = $this->input->post('i_tutor_id');
        $i_tutor_address   = $this->input->post('i_tutor_address');
        $i_tutor_poscode            = $this->input->post('i_tutor_poscode');
        $i_tutor_district           = $this->input->post('i_tutor_district');
        $i_tutor_state          = $this->input->post('i_tutor_state');
        $i_tutor_phone          = $this->input->post('i_tutor_phone');
        $i_tutor_email         = $this->input->post('i_tutor_email');
        $i_tutor_bank            = $this->input->post('i_tutor_bank');
        $i_tutor_account            = $this->input->post('i_tutor_account');





         $this->form_validation->set_rules('i_tutor_id','tutor_id','required');

        if($this->form_validation->run() != false){

            $where = array('id' => $id);
            $data = array(

                'tutor_name'             =>$i_tutor_name,
                'tutor_id'               =>$i_tutor_id,
                'tutor_address'   =>$i_tutor_address,
                'tutor_poscode'            =>$i_tutor_poscode,
                'tutor_district'           =>$i_tutor_district,
                'tutor_state'          =>$i_tutor_state,
                'tutor_phone'          =>$i_tutor_phone,
                'tutor_email'         =>$i_tutor_email,
                'tutor_bank'            =>$i_tutor_bank,
                'tutor_account'            =>$i_tutor_account,
            );


            $this->m_record->update_data($where, $data, 'tutor');

            redirect(base_url().'appmodule/tutor');
        } else {

            $this->load->view('tutor/tutor_edit');

        }
    }
    function tutor_hapus($id){
        $where = array('id' => $id);
        $this->m_record->delete_data($where, 'tutor');
        redirect(base_url().'appmodule/tutor');
    }


 //fungsi CRUD Bill

    function bill(){
        $data['bill'] = $this->m_record->get_data('bill')->result();
        $this->load->view('fees/bill',$data);
    }

    function get_bill_item(){
      $id = $this->input->post('id', TRUE);
      $data = $this->m_record->get_data_join_bill($id)->result();
      echo json_encode($data);
    }

    function bill_add(){

        $data['student'] = $this->m_record->get_data_group('IDC','student')->result();
        $data['course'] = $this->m_record->get_data_group('Course_Code','course')->result();
        //$data['amount'] = $this->m_record->get_data_join_course('IDC');
        $this->load->view('fees/bill_add', $data);

    }

    function bill_total(){
        $stud_id = $this->input->post('id');
        $data['amount'] = $this->m_record->get_data_join_course('$stud_id');
        $this->load->view('fees/bill_add', $data);
        //echo json_encode($data);
    }

    function bill_add_act(){

        $i_student_id      = $this->input->post('i_Stud_ID');
        $i_year            = $this->input->post('i_year');
        $i_month           = $this->input->post('i_month');
        $i_thedate         = $this->input->post('i_thedate');
        $i_note            = $this->input->post('i_note');
        $i_amount          = $this->input->post('i_amount');
        $i_bil_id          = $this->input->post('i_year'). $this->input->post('i_month')."-".$this->input->post('i_Stud_ID');
        $i_balance         = $this->input->post('i_amount');
        $i_status          = "Unpaid";

        $i_code            = $this->input->post('code');
        $i_code2           = $this->input->post('code2');

        $this->form_validation->set_rules('i_thedate','bil_date','required');
         //$this->form_validation->set_rules('i_month','bil_month','required');

        if($this->form_validation->run() != false){
            $data = array(
                'bil_year'            =>$i_year,
                'bil_month'           =>$i_month,
                'bil_date'            =>$i_thedate,
                'bil_note'            =>$i_note,
                'bil_total'           =>$i_amount,
                'bil_balance'         =>$i_amount,
                'bil_status'          =>$i_status,
                'bil_id'              =>$i_bil_id,
                'bil_student'         =>$i_student_id,

            );
            $this->m_record->insert_data($data, 'bill');

            $code = explode(',', $i_code2);
            foreach($code as $i_id){
              $data2 = array(
                  'bil_id'              =>$i_bil_id,
                  'bil_subject_code'    =>$i_id,
              );
              $this->m_record->insert_data($data2, 'bill_item');
            }

            redirect(base_url().'appmodule/bill');
        } else {

            $this->load->view('fees/bill_add');

        }
    }

    function bill_edit($id, $bil_id){
        $where = array('id' => $id);
        $data['student'] = $this->m_record->get_data_join_filter('id',$id,'bill','student','bil_student','IDC')->result();
        $where = array('id' => $id);
        $data['bill'] = $this->m_record->edit_data($where,'bill')->result();
        $where = array('bil_id' => $bil_id);
        $data['bill_item'] = $this->m_record->get_data_join_bill($bil_id)->result();

        $this->load->view('fees/bill_edit',$data);

    }

    function bill_open($id){
        $where = array('id' => $id);

        $data['bill'] = $this->m_record->edit_data($where,'bill')->result();
        // $data['student'] = $this->m_record->get_data('student')->result();

        $this->load->view('fees/bill_open',$data);

    }

    function bill_report(){
        $data['bill'] = $this->m_record->get_data('bill')->result();
        $data['student'] = $this->m_record->get_data('student')->result();

        $this->load->view('fees/bill_report',$data);
    }

    function get_bill_report_date(){
        $date = $this->input->post('id', TRUE);
        $data = $this->m_record->get_data_join_date($date)->result();
        echo json_encode($data);
    }

    function get_bill_report_month(){
        $month = $this->input->post('id', TRUE);
        $data = $this->m_record->get_data_join_month($month)->result();
        echo json_encode($data);
    }

    function bill_update(){
        $id                = $this->input->post('id');
        $i_student_id      = $this->input->post('stud');
        $i_year            = $this->input->post('i_year');
        $i_month           = $this->input->post('i_month');
        $i_thedate         = $this->input->post('i_thedate');
        $i_note            = $this->input->post('i_note');
        $i_amount          = $this->input->post('i_amount');
        $i_bil_id          = $this->input->post('i_bil_id');
        $i_paid            = $this->input->post('paid');
        $i_balance         = $this->input->post('i_balance');
        $i_status          = $this->input->post('i_status');


        $i_check           = $this->input->post('payment');

        $this->form_validation->set_rules('i_paid','i_status','required');

        if($this->form_validation->run() != false){

            $where = array('id' => $id);
            $data = array(

                'bil_year'            =>$i_year,
                'bil_month'           =>$i_month,
                'bil_date'            =>$i_thedate,
                'bil_note'            =>$i_note,
                'bil_total'           =>$i_amount,
                'bil_id'              =>$i_bil_id,
                'bil_student'         =>$i_student_id,
                'bil_paid'            =>$i_paid,
                'bil_balance'         =>$i_balance,
                'bil_status'          =>$i_status,
            );

            $this->m_record->update_data($where, $data, 'bill');

            foreach($i_check as $i_id){
              $where2 = array('item_id' => $i_id);
              $data2=array(
                   'status_payment'=>"Paid",
              );
              $this->m_record->update_data($where2, $data2 , 'bill_item');
            }


            //$where2 = array('item_id' => json_encode(implode(",", $i_check)));
            // $this->m_record->update_data($where2, $data2, 'bill_item');

            redirect(base_url().'appmodule/bill');
        } else {
            $where = array('id' => $id);
            $data['student'] = $this->m_record->get_data_join_filter('id',$id,'bill','student','bil_student','IDC')->result();
            $where = array('id' => $id);
            $data['bill'] = $this->m_record->edit_data($where,'bill')->result();

            $this->load->view('fees/bill_edit');

        }
    }

    function bill_hapus($id){
        $where = array('id' => $id);
        $this->m_record->delete_data($where, 'bill');
        redirect(base_url().'appmodule/bill');
    }

//fungsi class
function class($id){
    $data['class'] = $this->m_record->get_class_list($id)->result();
    $this->load->view('class/class',$data);
}

function class_student($id){
    $data['student'] = $this->m_record->get_class_student($id)->result();
    $this->load->view('class/student',$data);
}



//fungsi CRUD Attendance

    function attendance($id){
        $data['class'] = $this->m_record->get_class_list($id)->result();
        $data['attendance'] = $this->m_record->get_data('attendance')->result();
        //$data['bill_item']=$this->m_record->get_data('bill_item')->result();

        $this->load->view('class/attendance',$data);
    }

    function attendance_add($id){
        //$data['student'] = $this->m_record->get_data_group('IDC','student')->result();
        $data['student'] = $this->m_record->get_class_student($id)->result();
        $data['course'] = $this->m_record->get_data_group('Course_Code','course')->result();
        $this->load->view('class/attendance_add',$data);

    }

    function get_course_name(){
        $stud_id = $this->input->post('id', TRUE);
        $data = $this->m_record->get_data_join_course($stud_id)->result();
        echo json_encode($data);
    }

    function attendance_report_admin(){
        $data['attendance'] = $this->m_record->get_data('attendance')->result();
        $data['student'] = $this->m_record->get_data('student')->result();
        $data['subject'] = $this->m_record->get_data('course')->result();

        $this->load->view('class/attendance_report_admin',$data);
    }

    function attendance_report(){
        //$data['attendance'] = $this->m_record->get_data('attendance')->result();
        //$data['student'] = $this->m_record->get_data('student')->result();
        $data['subject'] = $this->m_record->get_class_list($this->session->userdata('tutor_id'))->result();

        $this->load->view('class/attendance_report',$data);
    }

    function get_attend_report_stud(){
        $stud_id = $this->input->post('id', TRUE);
        $data = $this->m_record->get_data_join_attend_stud($stud_id)->result();
        echo json_encode($data);
    }

    function get_attend_report_subj(){
        $subj_id = $this->input->post('id', TRUE);
        $data = $this->m_record->get_data_join_attend_subj($subj_id)->result();
        echo json_encode($data);
    }

    function attendance_add_act(){

        //$i_student_id      = $this->input->post('i_Stud_ID');
        //if (isset($_POST['ids'])) {
          //$id = $_POST['ids'];
          //$ids             = explode(',', $_POST['ids']);
          $ids               = $this->input->post('ids');
          $i_thedate         = $this->input->post('i_thedate');
          $i_course          = $this->input->post('i_Course_Code');
          $i_start_time      = $this->input->post('i_Start_Time');
          $i_end_time        = $this->input->post('i_End_Time');
          //$i_status          = $this->input->post('i_Status');
            $this->form_validation->set_rules('i_student_id','i_thedate','i_status','required');
             //$this->form_validation->set_rules('i_month','bil_month','required');

            if($this->form_validation->run() != false){
              foreach ($ids as $value){
                $data = array(
                    'bil_student'         =>$value,
                    'date'                =>$i_thedate,
                    'course_code'         =>$i_course,
                    'start_time'          =>$i_start_time,
                    'end_time'            =>$i_end_time,
                    'status'              =>'Attend',

                );
                $result = $this->m_record->insert_data($data, 'attendance');
              }
                redirect(base_url().'appmodule/attendance/'.$this->session->userdata('tutor_id'));
            } else {
                $data['student'] = $this->m_record->get_class_student($i_course)->result();
                $this->load->view('class/attendance_add',$data);

            }
          }

    function attendance_edit($id){
        $where = array('id' => $id);
        $data['attendance'] = $this->m_record->edit_data($where,'attendance')->result();

        $this->load->view('class/attendance_edit',$data);

    }


    function attendance_update(){
        $id                = $this->input->post('id');
        $i_student_id      = $this->input->post('i_Stud_ID');
        $i_thedate         = $this->input->post('i_thedate');
        $i_course          = $this->input->post('i_Course_Code');
        $i_start_time      = $this->input->post('i_Start_Time');
        $i_end_time        = $this->input->post('i_End_Time');
        $i_status          = $this->input->post('i_Status');


        $this->form_validation->set_rules('i_student_id','i_thedate','i_status','required');

        if($this->form_validation->run() != false){

            $where = array('id' => $id);
            $data = array(

                'bil_student'         =>$i_student_id,
                'date'                =>$i_thedate,
                'course_code'         =>$i_course,
                'start_time'          =>$i_start_time,
                'end_time'            =>$i_end_time,
                'status'              =>$i_status,
            );


            $this->m_record->update_data($where, $data, 'attendance');

            redirect(base_url().'appmodule/attendance/'.$this->session->userdata('tutor_id'));
        } else {
          $where = array('id' => $id);
          $data['attendance'] = $this->m_record->edit_data($where,'attendance')->result();
            $this->load->view('class/attendance_edit', $data);

        }
    }

    function attendance_hapus($id){
        $where = array('id' => $id);
        $this->m_record->delete_data($where, 'attendance');
        redirect(base_url().'appmodule/attendance/'.$this->session->userdata('tutor_id'));
    }

//fungsi CRUD Assessment

    function assessment(){
        $data['assessment'] = $this->m_record->get_data_assess()->result();

        $this->load->view('class/assessment',$data);
    }

    function assessment_type($type){
        $where = array('type' => $type);
        $data['assessment'] = $this->m_record->get_data_assess_type($type)->result();
        //$data['bill_item']=$this->m_record->get_data('bill_item')->result();

        $this->load->view('class/assessment',$data);
    }

    function assessment_add(){
        //$data['student'] = $this->m_record->get_class_student($this->session->userdata('tutor_id'))->result();
        //$data['course'] = $this->m_record->get_data_group('Course_Code','course')->result();
        $data['class'] = $this->m_record->get_class_list($this->session->userdata('tutor_id'))->result();
        $this->load->view('class/assessment_add',$data);

    }

    function get_class_stud(){
        $id = $this->input->post('id', TRUE);
        $data = $this->m_record->get_class_student($id)->result();
        echo json_encode($data);
    }

    function assessment_add_act(){

        $ids               = $this->input->post('ids');
        $i_course          = $this->input->post('i_Course_Code');
        $i_type            = $this->input->post('i_Type');
        $i_assess_name     = $this->input->post('i_Assess_Name');
        $i_mark            = $this->input->post('i_Mark');
        $i_total_mark      = $this->input->post('i_Ttl_Mark');

         $this->form_validation->set_rules('i_student_id','i_course','i_type','required');
         //$this->form_validation->set_rules('i_month','bil_month','required');

        if($this->form_validation->run() != false){
          foreach($ids as $index => $value) {
            $data = array(
                'bil_student'         =>$value,
                'course_code'         =>$i_course,
                'type'                =>$i_type,
                'assess_name'         =>$i_assess_name,
                'mark'                =>$i_mark[$index],
                'total_mark'          =>$i_total_mark,
            );

            $this->m_record->insert_data($data, 'assessment');

        }
        redirect(base_url().'appmodule/assessment');
        } else {
          $data['class'] = $this->m_record->get_class_list($this->session->userdata('tutor_id'))->result();
          $this->load->view('class/assessment_add',$data);

        }
    }

    function assessment_edit($id){
        $where = array('id' => $id);
        $data['assessment'] = $this->m_record->edit_data($where,'assessment')->result();

        $this->load->view('class/assessment_edit',$data);

    }

    function assessment_report_admin(){
        $data['assessment'] = $this->m_record->get_data('assessment')->result();
        $data['student'] = $this->m_record->get_data('student')->result();
        $data['subject'] = $this->m_record->get_data('course')->result();

        $this->load->view('class/assessment_report_admin',$data);
    }

    function assessment_report(){
        //$data['assessment'] = $this->m_record->get_data('assessment')->result();
        //$data['student'] = $this->m_record->get_data('student')->result();
        $data['assessment'] = $this->m_record->get_data_assess()->result();
        $data['subject'] = $this->m_record->get_class_list($this->session->userdata('tutor_id'))->result();

        $this->load->view('class/assessment_report',$data);
    }

    function get_assess_report_stud(){
        $stud_id = $this->input->post('id', TRUE);
        $data = $this->m_record->get_data_join_assess_stud($stud_id)->result();
        echo json_encode($data);
    }

    function get_assess_report_subj(){
        $subj_id = $this->input->post('id', TRUE);
        $data = $this->m_record->get_data_join_assess_subj($subj_id)->result();
        echo json_encode($data);
    }
    /*function attendance_open($id){
        $where = array('id' => $id);

        $data['attendance'] = $this->m_record->edit_data($where,'attendance')->result();
        // $data['student'] = $this->m_record->get_data('student')->result();

        $this->load->view('appmodule/attendance_open',$data);

    }*/

    function assessment_update(){
        $id                = $this->input->post('id');
        $i_student_id      = $this->input->post('i_Stud_ID');
        $i_course          = $this->input->post('i_Course_Code');
        $i_type            = $this->input->post('i_Type');
        $i_assess_name     = $this->input->post('i_Assess_Name');
        $i_mark            = $this->input->post('i_Mark');
        $i_total_mark      = $this->input->post('i_Ttl_Mark');

        $this->form_validation->set_rules('i_student_id','i_course','i_type','required');

        if($this->form_validation->run() != false){

            $where = array('id' => $id);
            $data = array(

                'bil_student'         =>$i_student_id,
                'course_code'         =>$i_course,
                'type'                =>$i_type,
                'assess_name'         =>$i_assess_name,
                'mark'                =>$i_mark,
                'total_mark'          =>$i_total_mark,
            );


            $this->m_record->update_data($where, $data, 'assessment');

            redirect(base_url().'appmodule/assessment');
        } else {
          $where = array('id' => $id);
          $data['assessment'] = $this->m_record->edit_data($where,'assessment')->result();
            $this->load->view('class/assessment_edit');

        }
    }

    function assessment_hapus($id){
        $where = array('id' => $id);
        $this->m_record->delete_data($where, 'assessment');
        redirect(base_url().'appmodule/assessment');
    }

    // CRUD group
    function group(){
        $data['group'] = $this->m_record->get_data('group')->result();
        $data['member'] = $this->m_record->get_data('group_member')->result();

        $this->load->view('register/group',$data);
    }

    function get_group_member(){
        $group = $this->input->post('id', TRUE);
        $data = $this->m_record->get_data_join_member($group)->result();
        echo json_encode($data);
    }

    function group_add(){
        $data['group'] = $this->m_record->get_data('group')->result();
        $data['student'] = $this->m_record->get_data('student')->result();
        $data['member'] = $this->m_record->get_data_join3_group()->result();
        $data['last'] = $this->m_record->get_data_last()->result();

        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('register/group_add',$data);
    }

    function group_add_act(){
      $id                = $this->input->post('id');
      $i_name            = $this->input->post('i_Group_Name');
      $i_desc            = $this->input->post('i_Group_Desc');

       $this->form_validation->set_rules('id','i_name','i_desc','required');
       //$this->form_validation->set_rules('i_month','bil_month','required');

      if($this->form_validation->run() != false){
          $data = array(
              'group_name'          =>$i_name,
              'group_desc'          =>$i_desc,
          );

          $this->m_record->insert_data($data, 'group');

          //$this->session->set_flashdata('success', 'New Group Create Success');
          redirect(base_url().'appmodule/group_add');
      } else {
          $//this->session->set_flashdata('error', 'Data not entered or incorrect');
          $this->load->view('register/group_add');

      }
    }

    function group_member_add_act(){
        $id                = '';
        $i_group            = $this->input->post('i_group');
        $i_student            = $this->input->post('i_student');

         $this->form_validation->set_rules('id','i_group','i_student','required');
         //$this->form_validation->set_rules('i_month','bil_month','required');

        if($this->form_validation->run() != false){
            $data = array(
                'group_id'          =>$i_group,
                'student_id'        =>$i_student,
            );

            $this->m_record->insert_data($data, 'group_member');

            $this->session->set_flashdata('success', 'New Member Added');
            redirect(base_url().'appmodule/group_add');
        } else {
            $this->session->set_flashdata('error', 'Data not entered or incorrect');
            $this->load->view('register/group_add');

        }
    }

    function member_hapus($id){
        $where = array('member_id' => $id);
        $this->m_record->delete_data($where, 'group_member');
        redirect(base_url().'appmodule/group_add');
    }

    function group_hapus($id){
        $where = array('Id' => $id);
        $this->m_record->delete_data($where, 'group');
        redirect(base_url().'appmodule/group_add');
    }

    //CRUD package
    function package(){
        $data['package'] = $this->m_record->get_data('package')->result();
        $data['subject'] = $this->m_record->get_data('package_subject')->result();

        $this->load->view('register/package',$data);
    }

    function get_package_subject(){
        $package = $this->input->post('id', TRUE);
        $data = $this->m_record->get_data_join_package($package)->result();
        echo json_encode($data);
    }

    function package_add(){
        $data['package'] = $this->m_record->get_data('package')->result();
        $data['subject'] = $this->m_record->get_data('package_subject')->result();
        $data['subj'] = $this->m_record->get_data('course')->result();
        $data['course'] = $this->m_record->get_data_join3_pack()->result();

        $data['msg'] = $this->session->flashdata('msg');
        $this->load->view('register/package_add',$data);
    }

    function package_add_act(){
      $id                = $this->input->post('id');
      $i_package         = $this->input->post('i_Package_Name');
      $i_desc            = $this->input->post('i_Package_Desc');
      $i_disc            = $this->input->post('i_disc');

       $this->form_validation->set_rules('id','i_package','i_desc','required');
       //$this->form_validation->set_rules('i_month','bil_month','required');

      if($this->form_validation->run() != false){
          $data = array(
              'package_name'          =>$i_package,
              'package_desc'          =>$i_desc,
              'package_discount'      =>$i_disc,
          );

          $this->m_record->insert_data($data, 'package');

          //$this->session->set_flashdata('success', 'New Group Create Success');
          redirect(base_url().'appmodule/package_add');
      } else {
          //$this->session->set_flashdata('error', 'Data not entered or incorrect');
          $this->load->view('register/package_add');

      }
    }

    function package_subject_add_act(){
        $id                   = '';
        $i_package            = $this->input->post('i_package');
        $i_subject            = $this->input->post('i_subj');
        $i_disc               = $this->input->post('disc');

         $this->form_validation->set_rules('id','i_subject','i_package','required');
         //$this->form_validation->set_rules('i_month','bil_month','required');

        if($this->form_validation->run() != false){
            $data = array(
                'package_id'              =>$i_package,
                'course_id'               =>$i_subject,
                'discount_price'          =>$i_disc,

            );

            $this->m_record->insert_data($data, 'package_subject');

            $this->session->set_flashdata('success', 'New Member Added');
            redirect(base_url().'appmodule/package_add');
        } else {
            $this->session->set_flashdata('error', 'Data not entered or incorrect');
            $this->load->view('register/package_add');

        }
    }

    function package_hapus($id){
        $where = array('package_id' => $id);
        $this->m_record->delete_data($where, 'package');
        redirect(base_url().'appmodule/package_add');
    }

    function package_subject_hapus($id){
        $where = array('pack_sub_id' => $id);
        $this->m_record->delete_data($where, 'package_subject');
        redirect(base_url().'appmodule/package_add');
    }

    //CRUD program
    function program(){
        $data['program'] = $this->m_record->get_data('program')->result();

        $this->load->view('register/program',$data);
    }

    function program_add_act(){
      $id                = $this->input->post('id');
      $i_program         = $this->input->post('i_Prog_Name');
      $i_desc            = $this->input->post('i_Prog_Desc');
      $i_date            = $this->input->post('i_thedate');
      $i_status          = $this->input->post('i_status');

       $this->form_validation->set_rules('id','i_program','i_date','required');
       //$this->form_validation->set_rules('i_month','bil_month','required');

      if($this->form_validation->run() != false){
          $data = array(
              'prog_name'          =>$i_program,
              'prog_desc'          =>$i_desc,
              'prog_date'          =>$i_date,
              'prog_status'        =>$i_status,
          );

          $this->m_record->insert_data($data, 'program');

          //$this->session->set_flashdata('success', 'New Program Created');
          redirect(base_url().'appmodule/program');
      } else {
          //$this->session->set_flashdata('error', 'Data not entered or incorrect');
          $this->load->view('register/program');

      }
    }

    function program_hapus($id){
        $where = array('prog_id' => $id);
        $this->m_record->delete_data($where, 'program');
        redirect(base_url().'appmodule/program');
    }

    function program_done($id){
        $i_status          = "Ended";
        $where = array('prog_id' => $id);
        $data = array(

            'prog_status'=>$i_status,
        );
        $this->m_record->update_data($where, $data ,'program');
        redirect(base_url().'appmodule/program');

    }

    //Analysis
    function analysis(){
      $data['subject'] = $this->m_record->get_data_finance_subject()->result();
      $data['level_finance'] = $this->m_record->get_data_finance_level()->result();
      $data['month'] = $this->m_record->get_data_attend_month()->result();
      $data['level_attend'] = $this->m_record->get_data_attend_level()->result();

      $this->load->view('appmodule/analysis',$data);
    }

    //Ageing
    function ageing(){
      $data['ageing'] = $this->m_record->get_data_ageing()->result();

      $this->load->view('fees/ageing',$data);
    }

}
?>
