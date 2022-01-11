<!-- Page Heading -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="<?php echo base_url().'assets/'; ?>css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"/>

<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

 <?php $this->load->view('appmodule/header_top'); ?>

</nav>


  <div id="layoutSidenav">

        <div id="layoutSidenav_nav">

        <?php if($this->session->userdata('usertype')=='head_admin') {
                $this->load->view('appmodule/header_left_account');
              }else if($this->session->userdata('usertype')=='head_tutor'){
                $this->load->view('appmodule/header_left_tutor');
              }
        ?>

         </div>


<div id="layoutSidenav_content" >

<div class="container-fluid">

<div class="card-header"><i class="fas fa-table mr-1"></i>Add Course Record</div>



<div class="card shadow">
    <div class="card-body">

        <form action="<?php echo base_url().'appmodule/course_add_act' ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Course Name</label>
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Course_Name" pattern="[A-Z0-9\s]+" title="Accept Name in UPPERCASE" required></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Code</label>
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Course_Code" pattern="[A-Z0-9\s]+" placeholder="AGM1" title="Accept Name in UPPERCASE" required></div>
                <?php echo form_error('name'); ?>
            </div>



            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="i_Course_level" pattern="[A-Z0-9\s]+" placeholder="TAHUN 1" title="Accept Level in UPPERCASE" required>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-8">

                <input type="text" class="form-control" name="i_Course_Description" pattern="[A-Z0-9\s]+" placeholder="AGAMA TAHUN 1" title="Accept Description in UPPERCASE" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Type</label>
                <div class="col-sm-8">
                  <select class="form-control" name="i_Course_Type" required>
                      <option value="">No Selected</option>
                      <option value="REGULAR">Regular</option>
                      <option value="FULL TIME">Full Time</option>
                  </select>

                <!-- <input type="text" class="form-control" name="i_Course_Type" pattern="[A-Z\s]+" title="Accept Type in UPPERCASE" required> -->
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Fee Amount</label>
                <div class="col-sm-8">

                <input type="text" class="form-control" name="i_fee" pattern="\d+" placeholder="120" title="Accept Fee Amount in numbers only" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save Course</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</script>

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
