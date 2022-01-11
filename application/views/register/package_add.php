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

<div class="card-header"><i class="fas fa-table mr-1"></i>Add Package</div>

<div class="card shadow">
    <div class="card-body">
        <form action="<?php echo base_url().'appmodule/package_add_act' ?>" method="post">
            <div class="form-group row" hidden>
                <label class="col-sm-2 col-form-label">Package ID</label> <!--buat dropdown-->
                <div class="col-sm-8"><input type="text" class="form-control" name="id" value=""></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Package Name</label> <!--buat dropdown-->
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Package_Name" required></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Package Description</label> <!--buat dropdown-->
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Package_Desc" required></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Package Discount</label> <!--buat dropdown-->
              <div class="col-sm-8">
                  <select class="form-control" name="i_disc" id="i_disc" required>
                      <option value="">No Selected</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                  </select>
              </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
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
                <th>Package Name</th>
                <th>Package Description</th>
                <th>Discount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        foreach($package as $k){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $k->package_name ?></td>
                <td><?php echo $k->package_desc ?></td>
                <td><?php echo $k->package_discount ?></td>
                <td>
                  <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'appmodule/package_hapus/'.$k->package_id; ?>">
                      <i class="fas fa-trash"></i> Delete
                  </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<div><br></div>
<div class="card-header"><i class="fas fa-table mr-1"></i>Add Package Subject</div>
<div class="card shadow">
    <div class="card-body">

        <form action="<?php echo base_url().'appmodule/package_subject_add_act' ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Package</label> <!--buat dropdown-->
                <div class="col-sm-8">
                    <select class="form-control" name="i_package" id="i_package" required>
                        <option value="">No Selected</option>
                        <?php
                        foreach($package as $k): ?>
                        <option value="<?php echo $k->package_id; ?>"><?php echo $k->package_name; ?></option>
                        <?php endforeach;?>
                        </select>
                <!--<div class="col-sm-8"><input type="text" class="form-control" name="i_Stud_ID"></div>-->
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Subject</label> <!--buat dropdown-->
                <div class="col-sm-8">
                  <select class="form-control" id="i_subj" name="i_subj" required>
                    <option value="">No Selected</option>
                    <?php
                    foreach($subj as $k): ?>
                    <option value="<?php echo $k->Course_Code; ?>"><?php echo $k->Course_Name; ?></option>
                    <?php endforeach;?>
                  </select>
                </div>

            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Discount Fee</label> <!--buat dropdown-->
                <div class="col-sm-8"><input type="text" class="form-control" name="disc" id="disc" pattern="[0-9]" title="Example: 10"required></div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
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
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Discount Fee (RM)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        foreach($course as $k){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $k->course_id ?></td>
                <td><?php echo $k->Course_Name ?></td>
                <td><?php echo $k->discount_price ?></td>
                <td>
                  <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'appmodule/package_subject_hapus/'.$k->pack_sub_id; ?>">
                      <i class="fas fa-trash"></i> Delete
                  </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
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
