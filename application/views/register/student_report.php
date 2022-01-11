<!-- Page Heading -->



        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="<?php echo base_url().'assets/'; ?>css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"/>
        <link href="<?php echo base_url().'assets/'; ?>vendor/sweetalert/sweetalert.css" rel="stylesheet">
        <link href="<?php echo base_url().'assets/'; ?>css/bootstrap.css" rel="stylesheet" />

<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

 <?php $this->load->view('appmodule/header_top'); ?>

</nav>


  <div id="layoutSidenav">

        <div id="layoutSidenav_nav">

        <?php $this->load->view('appmodule/header_left'); ?>

         </div>




<div id="layoutSidenav_content" >


  <div class="card-header"><i class="fas fa-table mr-1"></i>Student Report</div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">


</div>
    <div class="card-body">

      <!-- <div class="row">
        <div class="col-xl-4 col-md-63">
              <div class="form-group row">
                <div class="col-sm-9">
                    <select class="form-control" name="choice" id="choice" required>
                        <option value="">Choose Category for Report</option>
                        <option value="student">Report By Student Attendance</option>
                        <option value="subject">Report By Subject</option>
                        </select>
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Stud_ID"></div>
                </div>
              </div>
            </div>

        </div> -->

      <!-- <div class="dropdown" >


          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Report Selection
          </button>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">All</a>
            <a class="dropdown-item" href="#">Student</a>
            <a class="dropdown-item" href="#">Subject</a>
          </div>

      </div>
      <br/>  -->
      <div class="student box">
        <div class="row">
          <div class="col-xl-4 col-md-63">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Student</label> <!--buat dropdown-->
                  <div class="col-sm-9">
                      <select class="form-control" name="i_Stud_ID" id="student" required>
                          <option value="">No Selected</option>
                          <?php
                          $id="";
                          foreach($student as $k): ?>
                          <option value="<?php echo $k->IDC; $id = $k->IDC; ?>"><?php echo $k->Name; ?></option>
                          <?php endforeach; ?>
                          </select>
                  <!--<div class="col-sm-8"><input type="text" class="form-control" name="i_Stud_ID"></div>-->
                  </div>
                </div>
              </div>

          </div>

          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Student ID</th>
                          <th>Contact Number</th>
                          <th>Status</th>
                          <th>Parent ID</th>
                          <th>Parent Name</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>

                      </tr>
                  </tbody>
              </table>
          </div>
      </div>

        <div><br><br></div>

        <div class="subject box">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Course Name</th>
                          <th>Course Level</th>
                          <th>Status</th>

                      </tr>
                  </thead>
                  <tbody>
                      <tr>

                      </tr>
                  </tbody>
              </table>
          </div>
        </div>

        <div><br><br></div>
        <div class="row">
            <div class="container-fluid">

            <div class="form-group row">

            <button onclick="print_current_page()" class="btn btn-primary" id= "btn-bill" name='btn-bill' style="margin-left: 92%"> Print <i class="fas fa-print"></i></button>
            </div>

            </div>
        </div>

      </div>
      </div>

      </div>

        </div>

    </div>

</div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url().'assets/'; ?>js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url().'assets/'; ?>demo/chart-area-demo.js"></script>
<script src="<?php echo base_url().'assets/'; ?>demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url().'assets/'; ?>demo/datatables-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url().'assets/'; ?>vendor/sweetalert/sweetalert.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script>
          function print_current_page(){
            window.print();
          }
        </script>

        <script type="text/javascript">
            $(document).ready(function(){

                $('#student').change(function(){
                    var id=$(this).val();
                    $.ajax({
                        url : "<?php echo site_url('appmodule/get_student_report');?>",
                        method : "POST",
                        data : {id: id},
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var html2 = '';
                            var html3 = 0;
                            var value = 0;
                            var i;
                            for(i=0; i<data.length; i++){
                                html = '<tr><td>'+data[i].IDC+'</td><td>'+data[i].Contact_Number+'</td><td>'+data[i].Status+'</td><td>'+data[i].ParentID+'</td><td>'+data[i].parent_name+'</td></tr>';
                                html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].Course_Name+'</td><td>'+data[i].Course_level+'</td><td>'+data[i].Course_Type+'</td></tr>';


                            }
                            $('#dataTable tbody').html(html);
                            $('#dataTable2 tbody').html(html2);
                        }
                    });
                    return false;
                });

                $('#subject').change(function(){
                    var id=$(this).val();
                    $.ajax({
                        url : "<?php echo site_url('appmodule/get_attend_report_subj');?>",
                        method : "POST",
                        data : {id: id},
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var html2 = '';
                            var html3 = 0;
                            var value = 0;
                            var i;
                            for(i=0; i<data.length; i++){
                                html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].Name+'</td><td>'+data[i].date+'</td><td>'+data[i].status+'</td></tr>';
                            }
                            $('#dataTable2 tbody').html(html2);
                        }
                    });
                    return false;
                });
            });
        </script>

        <!-- <script type="text/javascript">
            $(document).ready(function(){

                $('#subject').change(function(){
                    var id=$(this).val();
                    $.ajax({
                        url : "<?php echo site_url('appmodule/get_assess_report_subj');?>",
                        method : "POST",
                        data : {id: id},
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var html2 = '';
                            var html3 = 0;
                            var value = 0;
                            var i;
                            for(i=0; i<data.length; i++){
                                html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].Name+'</td><td>'+data[i].type+'</td><td>'+data[i].assess_name+'</td><td>'+data[i].mark+' / '+data[i].total_mark+'</td></tr>';
                            }
                            $('#dataTable2 tbody').html(html2);
                        }
                    });
                    return false;
                });
            });
        </script> -->

</body>
