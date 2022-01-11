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
              }else if($this->session->userdata('usertype')=='head_tutor'){
                $this->load->view('appmodule/header_left_tutor');
              }

        ?>

         </div>




<div id="layoutSidenav_content" >


  <div class="container-fluid">

<div class="card-header"><i class="fas fa-table mr-1"></i>Add Program</div>

<div class="card shadow">
    <div class="card-body">

        <!-- <?php if ($this->session->flashdata('error')) { ?>
          <h5>
            <?php echo $this->session->flashdata('error'); ?>
          </h5>
        <?php } ?> -->
        <form action="<?php echo base_url().'appmodule/program_add_act' ?>" method="post">
            <div class="form-group row" hidden>
                <label class="col-sm-2 col-form-label">Program ID</label> <!--buat dropdown-->
                <div class="col-sm-8"><input type="text" class="form-control" name="id" value=""></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-8"><input type="date" class="form-control" name="i_thedate" id="i_thedate" required></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Program Name</label> <!--buat dropdown-->
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Prog_Name" required></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Program Description</label> <!--buat dropdown-->
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Prog_Desc" required></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Program Status</label> <!--buat dropdown-->
                <div class="col-sm-8">
                  <select class="form-control" id="i_status" name="i_status" required>
                    <option value="">No Selected</option>
                    <option value="Specified">Specified</option>
                    <option value="Open">Open</option>
                    <option value="Selected">Selected</option>
                  </select>
                </div>

            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
                <!-- <script>
                <?php if($this->session->flashdata('success')) { ?>
                  alert('New Data Created');
                <?php } ?>
                <?php if($this->session->flashdata('error')) { ?>
                  alert('Error when create the data');
                <?php } ?>
                </script> -->
            </div>
        </form>
    </div>
</div>

<div><br><div>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Program Date</th>
                <th>Program Name</th>
                <th>Program Description</th>
                <th>Program Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        foreach($program as $k){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $k->prog_date ?></td>
                <td><?php echo $k->prog_name ?></td>
                <td><?php echo $k->prog_desc ?></td>
                <td><?php echo $k->prog_status ?></td>
                <td>
                  <?php if ($k->prog_status != 'Ended'){
                    ?> <a class="btn btn-info btn-sm btn-done" href="<?php echo base_url().'appmodule/program_done/'.$k->prog_id; ?>">
                        <i class="fas fa-edit"></i> Done
                    </a>
                  <?php }?>
                  <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'appmodule/program_hapus/'.$k->prog_id; ?>">
                      <i class="fas fa-trash"></i> Delete
                  </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<div><br></div>

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

$('.btn-done').on("click", function(e) {

e.preventDefault();
var url = $(this).attr('href');

swal({
    title: "Program End?",
    text: "Click Yes if Program ended",
    type: "success",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Yes, Program Ended!',
    cancelButtonText: "No, Not yet!",
    confirmButtonClass: "btn-success",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm) {
    if (isConfirm) {
      swal("Confirm", "Data Updated", "success");
      setTimeout(function(){ window.location.replace = url; }, 2000);
      window.location.replace(url);
    } else {
      swal("Cancel", "Data Not Updated :)", "error");
    }
  });
});
</script>



</body>
