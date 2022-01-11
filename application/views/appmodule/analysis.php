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

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#choice").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
        </script>
<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

 <?php $this->load->view('appmodule/header_top'); ?>

</nav>


  <div id="layoutSidenav">

        <div id="layoutSidenav_nav">

        <?php $this->load->view('appmodule/header_left'); ?>

         </div>




<div id="layoutSidenav_content" >

  <div class="card-header"><i class="fas fa-table mr-1"></i>Analysis Table</div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4"></div>

  <div class="container-fluid">

    <div><br></div>
    <div class="card-header"><i class="fas fa-table mr-1"></i>Subject Finance Analysis (PAID)</div>
    <div class="card shadow">
        <div class="card-body">

          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Course Code</th>
                          <th>Course Name</th>
                          <th>Course Amount</th>
                          <th>Total Amount Paid</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach($subject as $k){

                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $k->Course_Code ?></td>
                            <td><?php echo $k->Course_Name?></td>
                            <td>RM <?php echo $k->Course_Amount ?></td>
                            <td>RM <?php echo $k->Total?></td>

                        </tr>
                    <?php } ?>
                  </tbody>
              </table>
          </div>
        </div>
    </div>

    <div><br><br></div>
    <div class="card-header"><i class="fas fa-table mr-1"></i>Level Subject Finance Analysis (PAID)</div>
    <div class="card shadow">
        <div class="card-body">

          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Course Level</th>
                          <th>Total Amount Paid</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach($level_finance as $k){

                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $k->Course_level ?></td>
                            <td>RM <?php echo $k->Total_Amount ?></td>

                        </tr>
                    <?php } ?>
                  </tbody>
              </table>
          </div>
        </div>
    </div>

    <div><br></div>
    <div class="card-header"><i class="fas fa-table mr-1"></i>Monthly Attendance Analysis</div>
    <div class="card shadow">
        <div class="card-body">

          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Month</th>
                          <th>Course Code</th>
                          <th>Course Name</th>
                          <th>Total Student</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach($month as $k){

                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $k->Month?></td>
                            <td><?php echo $k->Course_Code ?></td>
                            <td><?php echo $k->Course_Name?></td>
                            <td><?php echo $k->Total_Student ?></td>

                        </tr>
                    <?php } ?>
                  </tbody>
              </table>
          </div>
        </div>
    </div>

    <div><br><br></div>

    <div class="card-header"><i class="fas fa-table mr-1"></i>Subject Level Attendance Analysis</div>
    <div class="card shadow">
        <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Course Level</th>
                          <th>Course Code</th>
                          <th>Course Name</th>
                          <th>Total Student</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach($level_attend as $k){

                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $k->Course_level?></td>
                            <td><?php echo $k->Course_Code ?></td>
                            <td><?php echo $k->Course_Name?></td>
                            <td><?php echo $k->Total_Student ?></td>

                        </tr>
                    <?php } ?>
                  </tbody>
              </table>
        </div>
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
                        url : "<?php echo site_url('appmodule/get_assess_report_stud');?>",
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
                                html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].Course_Name+'</td><td>'+data[i].type+'</td><td>'+data[i].assess_name+'</td><td>'+data[i].mark+' / '+data[i].total_mark+'</td></tr>';


                            }
                            $('#dataTable tbody').html(html2);
                        }
                    });
                    return false;
                });

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
        </script>

</body>
