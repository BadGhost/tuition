<?php
class M_record extends CI_Model{
    function edit_data($where, $table){
        return $this->db->get_where($table,$where);
    }


    function get_data_filter($where, $table){
        return $this->db->get_where($table,$where);
    }

    function get_data($table){
        return $this->db->get($table);
    }


    function get_data_join($table1,$table2,$field1,$field2){


        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field1.'='.$table2.'.'.$field2);
        return  $this->db->get();

    }

    function get_data_bil($value){
        $this->db->select('b.bil_id, b.bil_date, b.bil_total, b.bil_status, s.IDC');
        $this->db->from('bill b');
        $this->db->join('student s', 'b.bil_student = s.IDC');
        $this->db->join('parent p', 's.ParentID = p.parent_id');
        $this->db->where('p.parent_id', $value);
        return  $this->db->get();

    }

    function get_class_list($id){
        $this->db->select('c.Course_Code, c.Course_Name, tc.status, tc.id');
        $this->db->from('tutor_course tc');
        $this->db->join('course c', 'tc.course_id=c.Course_Code');
        $this->db->where('tc.tutor_id', $id);
        return  $this->db->get();

    }

    function get_class_student($id){
        $this->db->select('s.IDC, s.Name, s.Contact_Number, c.Course_Name, ss.subject_id');
        $this->db->from('student_subject ss');
        $this->db->join('student s', 'ss.student_id=s.IDC');
        $this->db->join('course c', 'ss.subject_id=c.Course_Code');
        $this->db->where('ss.status', 'Active');
        $this->db->where('ss.subject_id', $id);
        return  $this->db->get();

    }

    function get_data_pay($value){
        $this->db->select('b.bil_id, b.bil_date, b.bil_total, b.bil_status, s.IDC');
        $this->db->from('bill b');
        $this->db->join('student s', 'b.bil_student = s.IDC');
        $this->db->join('parent p', 's.ParentID = p.parent_id');
        $this->db->where('p.parent_id', $value);
        $this->db->where('b.bil_status', 'Full Paid');
        return  $this->db->get();

    }

    function get_data_join3($value){
        $this->db->select('*');
        $this->db->from('student');
        $this->db->join('student_subject', 'student.IDC = student_subject.student_id');
        $this->db->join('parent', 'student.ParentID = parent.parent_id');
        $this->db->join('course', 'student_subject.subject_id = course.Course_Code');
        $this->db->where('student.IDC', $value);
        return  $this->db->get();

    }

    function get_data_join_exists($value){

        $this->db->select('*');
        $this->db->from('course');
        $this->db->where('not EXISTS (select * from student_subject where course.Course_Code=student_subject.subject_id and student_subject.student_id='.$value.')', null, false);
        return  $this->db->get();

    }

    function get_data_join_date($value){


        $this->db->select('*');
        $this->db->from('bill');
        $this->db->join('student', 'bill.bil_student = student.IDC');
        $this->db->where('bill.bil_date', $value);
        return  $this->db->get();

    }

    function get_data_join_bill($value){


        $this->db->select('*');
        $this->db->from('bill_item');
        $this->db->join('course', 'bill_item.bil_subject_code = course.Course_Code');
        $this->db->where('bill_item.bil_id', $value);
        return  $this->db->get();

    }

    function get_data_join_month($value){


        $this->db->select('*');
        $this->db->from('bill');
        $this->db->join('student', 'bill.bil_student = student.IDC');
        $this->db->where('MONTH(bill.bil_date)', $value);
        return  $this->db->get();

    }

    function get_data_join_course($value){


        $this->db->select('*');
        $this->db->from('student_subject s');
        $this->db->join('course c', 's.subject_id = c.Course_Code');
        $this->db->where('s.student_id', $value);
        return  $this->db->get();

    }

    function get_data_join_assess_stud($value){
        $this->db->select('*');
        $this->db->from('assessment');
        $this->db->join('course', 'assessment.course_code = course.Course_Code');
        $this->db->where('assessment.bil_student', $value);
        return  $this->db->get();
    }

    function get_data_assess(){
        $this->db->select('*, assessment.id as ID');
        $this->db->from('assessment');
        $this->db->join('course', 'assessment.course_code = course.Course_Code');
        $this->db->join('tutor_course', 'assessment.course_code = tutor_course.course_id');
        $this->db->where('tutor_course.tutor_id', $this->session->userdata('tutor_id'));
        return  $this->db->get();
    }

    function get_data_assess_type($type){
        $this->db->select('*, assessment.id as ID');
        $this->db->from('assessment');
        $this->db->join('course', 'assessment.course_code = course.Course_Code');
        $this->db->join('tutor_course', 'assessment.course_code = tutor_course.course_id');
        $this->db->where('tutor_course.tutor_id', $this->session->userdata('tutor_id'));
        $this->db->where('assessment.type', $type);
        return  $this->db->get();
    }

    function get_data_join_assess_subj($value){


        $this->db->select('*');
        $this->db->from('assessment');
        $this->db->join('student', 'assessment.bil_student = student.IDC');
        $this->db->where('assessment.course_code', $value);
        return  $this->db->get();

    }

    function get_data_join_attend_stud($value){


        $this->db->select('*');
        $this->db->from('attendance');
        $this->db->join('course', 'attendance.course_code = course.Course_Code');
        $this->db->where('attendance.bil_student', $value);
        return  $this->db->get();

    }

    function get_data_join_attend_subj($value){


        $this->db->select('*, attendance.id as ID');
        $this->db->from('attendance');
        $this->db->join('student', 'attendance.bil_student = student.IDC');
        $this->db->where('attendance.course_code', $value);
        return  $this->db->get();

    }

    function get_data_group($group, $table){
        $this->db->group_by($group);
        return $this->db->get($table);
    }


    function get_data_join_filter($fieldreference,$para1,$table1,$table2,$field1,$field2){


        $this->db->select('*');
        $this->db->from($table1);
        $thestring=$table1.'.'.$field1.'='.$table2.'.'.$field2;
        $this->db->join($table2, $thestring);
        $wherestring='('.$table1.'.'.$fieldreference.'='.$para1.')';
        $this->db->where($wherestring);
        return  $this->db->get();

    }

    function get_data_join_member($value){

        $this->db->select('*');
        $this->db->from('group_member');
        $this->db->join('student', 'group_member.student_id = student.IDC');
        $this->db->where('group_member.group_id', $value);
        return  $this->db->get();

    }

    function get_data_join_package($value){

        $this->db->select('*');
        $this->db->from('package_subject');
        $this->db->join('course', 'package_subject.course_id = course.Course_Code');
        $this->db->where('package_subject.package_id', $value);
        return  $this->db->get();

    }

    function get_data_join3_group(){


        $this->db->select('*');
        $this->db->from('group');
        $this->db->join('group_member', 'group.Id = group_member.group_id');
        $this->db->join('student', 'student.IDC = group_member.student_id');
        return  $this->db->get();

    }

    function get_data_join3_pack(){


        $this->db->select('*');
        $this->db->from('package_subject');
        $this->db->join('package', 'package_subject.package_id = package.package_id');
        $this->db->join('course', 'course.Course_Code = package_subject.course_id');
        return  $this->db->get();

    }

    function get_data_last(){
        $this->db->select('*');
        $this->db->from('group');
        $this->db->order_by('Id', 'DESC');
        $this->db->limit(1);
        return  $this->db->get();
    }

    function insert_data($data, $table){
        $this->db->insert($table, $data);
    }

    function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Analysis

    function get_data_finance_subject(){
        $this->db->select('course.Course_Code, course.Course_Name, course.Course_Amount, COUNT(bill_item.bil_subject_code),
        ((count(bill_item.bil_subject_code))*(course.Course_Amount)) As Total');
        $this->db->from('bill_item');
        $this->db->join('course', 'bill_item.bil_subject_code = course.Course_Code');
        $this->db->where('status_payment','Paid');
        $this->db->group_by('bill_item.bil_subject_code');
        return  $this->db->get();
    }

    function get_data_finance_level(){
        $this->db->select('course.Course_level, COUNT(course.Course_Code) as Total_Subj, SUM(course.Course_Amount) as Total_Amount');
        $this->db->from('bill_item');
        $this->db->join('course', 'bill_item.bil_subject_code = course.Course_Code');
        $this->db->where('status_payment','Paid');
        $this->db->group_by('course.Course_level');
        return  $this->db->get();
    }

    function get_data_attend_month(){
        $this->db->select('MONTH(attendance.date) as Month, course.Course_Code, course.Course_Name, COUNT(attendance.bil_student) as Total_Student');
        $this->db->from('attendance');
        $this->db->join('course', 'attendance.course_code = course.Course_Code');
        $this->db->where('status','Attend');
        $this->db->group_by('attendance.course_code');
        $this->db->order_by('Month','ASC');
        return  $this->db->get();
    }

    function get_data_attend_level(){
        $this->db->select('course.Course_level, course.Course_Code, course.Course_Name, COUNT(attendance.bil_student) as Total_Student');
        $this->db->from('attendance');
        $this->db->join('course', 'attendance.course_code = course.Course_Code');
        $this->db->where('status','Attend');
        $this->db->group_by('attendance.course_code');
        $this->db->order_by('Total_Student','DESC');
        return  $this->db->get();
    }

    // SELECT MONTH(bil_date), COUNT(MONTH(bil_date)) as Total, COUNT(bil_id), SUM(bil_total-bil_paid)
    // FROM `bill` where bil_status != "Full Paid" group by Month(bil_date)

    function get_data_ageing(){
        $this->db->select('MONTH(bil_date) as Month, COUNT(bil_id) as Total_bil, SUM(bil_total-bil_paid) as Sum_bil');
        $this->db->from('bill');
        $this->db->where('bil_status != ','Full Paid',);
        $this->db->group_by('Month');
        $this->db->order_by('Month','ASC');
        return  $this->db->get();
    }
}
