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

  <?php foreach($student as $b){

    $studentid=$b->IDC;
    $studentname=$b->Name;

  }
  ?>


  <div class="card-header"><i class="fas fa-table mr-1"></i>Subject List (<?php echo $studentname; ?>)</div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">


</div>
    <div class="card-body">
      <br/>


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Student ID</th>
                        <th>Subject ID</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($student_subject as $k){
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $k->student_id ?></td>
                        <td><?php echo $k->subject_id ?></td>
                        <td><?php echo $k->Course_Name ?></td>
                        <td><?php echo $k->status ?></td>
                        <td><?php echo $k->type ?></td>
                        <td>

                            <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'appmodule/student_subject_hapus/'.$k->stu_sub_id.'/'.$k->student_id; ?>">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <a class="btn btn-info btn-sm btn-lg" href="#" data-toggle="modal" data-target="#largeModal"><i class="lni-search"></i>+ Subject List</a>
        </div>

<!--mula modal -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">


            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title bg-dark text-white" id="myModalLabel">Add Subject For Student : (<?php echo $studentname; ?>) </h4>
            </div>
                <div class="modal-body" style="overflow:scroll;height:500px;">

                  <div class="card shadow-lg mb-4">
                 <table class="table table-bordered table-condensed" style="font-size:14px;" id="mydata">
                    <thead>
                        <tr class="bg-info text-white">
                            <th style="text-align:center;width:40px;">No</th>
                            <th>Subject</th>
                            <th>Code</th>
                            <th>Level</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                      <?php
                      $no=1;
                      $total_value=0;
                      foreach($course as $m){
                        $course = $m->Course_Code;

                      ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $m->Course_Name ?></td>
                        <td><?php echo $m->Course_Code ?></td>
                        <td><?php echo $m->Course_level ?></td>
                        <td><?php echo $m->Course_Description ?></td>
                        <td><?php echo $m->Course_Type ?></td>
                        <form action="<?php echo base_url().'appmodule/student_subject_addbylist/'.$studentid?>" method="post">
                          <input type="hidden" name="i_student_id" value="<?php echo $studentid;?>">
                          <input type="hidden" name="i_subject_id" value="<?php echo $m->Course_Code;?>">
                          <input type="hidden" name="i_status" value="Active">
                          <input type="hidden" name="i_course_type" value="Regular">


                        <td>


                       <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Add</button>
                       </form>


                        </td>
                    </tr>
                <?php
              } ?>





                    </tbody>




                </table>
                </div>

                </div>



                <div class="modal-footer">


                    <button class="btn btn-primary text-white" data-dismiss="modal" aria-hidden="true">Close</button>

                </div>

      </div>
      </div>

      </div>


<!-- tamat modal -->






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




<script type="text/javascript">

  $('.btn-hapus').on("click", function(e) {

  e.preventDefault();
  var url = $(this).attr('href');

  swal({
      title: "Delete This Data?",
      text: "Data Deleted Can't Be Recover",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Yes, Delete!',
      cancelButtonText: "No, Cancel!",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        swal("Deleted", "Data Deleted", "success");
        setTimeout(function(){ window.location.replace = url; }, 2000);
        window.location.replace(url);
      } else {
        swal("Cancel", "Data Not Deleted :)", "error");
      }
    });
});
</script>



</body>
