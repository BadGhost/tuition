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
                $this->load->view('appmodule/header_left');
              }else if($this->session->userdata('usertype')=='head_tutor'){
                $this->load->view('appmodule/header_left_tutor');
              }

        ?>

         </div>


<div id="layoutSidenav_content" >

<div class="container-fluid">

<div class="card-header"><i class="fas fa-table mr-1"></i>Add Tutor Record</div>



<div class="card shadow">
    <div class="card-body">

        <form action="<?php echo base_url().'appmodule/tutor_add_act' ?>" method="post">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-8"><input type="text" class="form-control" name="i_tutor_name" pattern="[A-Z\s]+" title="Accept Name in UPPERCASE" required></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-8"><input type="text" class="form-control" name="i_tutor_id" pattern="\d+" title="Accept ID in numbers only" required></div>
                <?php echo form_error('name'); ?>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="i_tutor_address" pattern="[A-Z0-9\s]+" title="Accept Address in UPPERCASE" required>

                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Poscode</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="i_tutor_poscode" pattern="\d+" max="5" placeholder="43200" title="Enter poscode in numerical only" required>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">District</label>
                <div class="col-sm-8">

                <input type="text" class="form-control" name="i_tutor_district" pattern="[A-Z\s]+" title="Accept District in UPPERCASE" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-8">

                <input type="text" class="form-control" name="i_tutor_state" pattern="[A-Z\s]+" title="Accept State in UPPERCASE" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact Number</label>
                <div class="col-sm-8">

                <input type="text" class="form-control" name="i_tutor_phone" pattern="\d+" max="11" placeholder="0123456789" title="Enter phone numbers in numerical only" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">E-Mail</label>
                <div class="col-sm-8">

                <input type="text" class="form-control" name="i_tutor_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="xxx@gmail.com" title="Enter email in a correct pattern" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bank</label>
                <div class="col-sm-8">
                  <select class="form-control" name="i_tutor_bank" required>
                      <option value="">No Selected</option>
                      <option value="Maybank">Maybank</option>
                      <option value="CIMB">CIMB</option>
                      <option value="Public Bank">Public Bank</option>
                      <option value="Bank Islam">Bank Islam</option>
                      <option value="RHB">RHB</option>
                      <option value="Hong Leong Bank">Hong Leong Bank</option>
                      <option value="AmBank">AmBank</option>
                      <option value="UOB Bank">UOB Bank</option>
                      <option value="Bank Rakyat">Bank Rakyat</option>
                      <option value="OCBC">OCBC</option>
                      <option value="HSBC">HSBC</option>
                      <option value="Affin Bank">Affin Bank</option>
                      <option value="Standard Chartered">Standard Chartered</option>
                      <option value="Alliance Bank">Alliance Bank</option>
                      <option value="BSN">Bank Simpanan Nasional</option>
                      <option value="Bank Muamalat">Bank Muamalat</option>
                  </select>
              <!--<div class="col-sm-8"><input type="text" class="form-control" name="i_Stud_ID"></div>-->
                  <!-- <input type="text" class="form-control" name="i_tutor_bank" required> -->
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Account Number</label>
                <div class="col-sm-8">

                <input type="text" class="form-control" name="i_tutor_account" pattern="\d+" placeholder="55101278363" title="Enter account number in numerical only" required>
                </div>
            </div>



            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save Data</button>
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
