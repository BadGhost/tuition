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




<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

 <?php $this->load->view('appmodule/header_top'); ?>

</nav>


  <div id="layoutSidenav">

        <div id="layoutSidenav_nav">

          <?php if($this->session->userdata('usertype')=='head_admin') {
                  $this->load->view('appmodule/header_left');
                }else if($this->session->userdata('usertype')=='tutor'){
                  $this->load->view('appmodule/header_left_user');
                }
           ?>

         </div>




<div id="layoutSidenav_content" >


  <div class="card-header"><i class="fas fa-table mr-1"></i>Student Attendance</div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <!-- <a href="<?php echo base_url().'appmodule/attendance_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Submit Attendance</a> -->
</div>
    <div class="card-body">
      <br/>

      <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    foreach($class as $k){
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $k->Course_Code ?></td>
                            <td><?php echo $k->Course_Name ?></td>
                            <td><?php echo $k->status ?></td>
                            <td>
                                <a class="btn btn-info btn-sm" href="<?php echo base_url().'appmodule/attendance_add/'.$k->Course_Code; ?>">
                                    <i class="fas fa-plus fa-sm text-white-50"></i> Submit Attendance
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
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
