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

<div class="card-header"><i class="fas fa-table mr-1"></i>Tutor Personal File</div>


<div class="card shadow">

    <div class="card-body">

    <div class="row">

         <div class="col-xl-5">
         <div class="card mb-4">
         <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Tutor Detail</div>
         <div class="card-body">
        <?php foreach($tutor as $k){ ?>
        <form action="<?php echo base_url().'appmodule/tutor_update' ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $k->id; ?>">





               <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="i_tutor_name" value="<?php echo $k->tutor_name;?>" disabled></div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="i_tutor_id" value="<?php echo $k->tutor_id;?>" disabled></div>
                <?php echo form_error('name'); ?>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="i_tutor_address" value="<?php echo $k->tutor_address;?>" disabled>

                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Poscode</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="i_tutor_poscode" value="<?php echo $k->tutor_poscode;?>" disabled>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">District</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_tutor_district" value="<?php echo $k->tutor_district;?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_tutor_state" value="<?php echo $k->tutor_state;?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact Number</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_tutor_phone" value="<?php echo $k->tutor_phone;?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">E-Mail</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_tutor_email"  value="<?php echo $k->tutor_email;?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bank</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_tutor_bank"  value="<?php echo $k->tutor_bank;?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Account Number</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_tutor_account" value="<?php echo $k->tutor_account;?>" disabled>
                </div>
            </div>

        </form>
        <?php } ?>

    </div>
    </div>

    </div>

    <div class="col-xl-7">
      <div class="card mb-4">

      <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Detail
        <ul class="nav nav-tabs card-header-tabs">
           <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#class">Class Session Records</a></li>
           <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pay">Payment History</a></li>
           <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#doc">Tutor Documents</a></li>
         </ul>

         <div class="tab-content">
           <br>
           <div id="class" class="tab-pane active">
             <h5 class="card-title">Class Session Records</h5>
             <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  </table>
              </div>
           </div>
           <div id="pay" class="tab-pane fade">
             <h5 class="card-title">Payment History</h5>
             <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  </table>
              </div>
           </div>
           <div id="doc" class="tab-pane fade">
             <h5 class="card-title">Tutor Documents</h5>
             <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                  </table>
              </div>
           </div>
         </div>
       </div>
      </div>

    </div>

    </div>


    </div>

    </div>

</div>
</div>
</div>
</body>

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
