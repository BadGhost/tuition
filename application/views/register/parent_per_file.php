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

        <?php $this->load->view('appmodule/header_left'); ?>

         </div>


<div id="layoutSidenav_content" >

<div class="container-fluid">

<div class="card-header"><i class="fas fa-table mr-1"></i>Parent Personal File</div>


<div class="card shadow">

    <div class="card-body">

    <div class="row">

         <div class="col-xl-5">
         <div class="card mb-4">
         <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Parent Detail</div>
         <div class="card-body">
        <?php foreach($parent as $k){ ?>
        <form action="<?php echo base_url().'appmodule/parent_update' ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $k->id; ?>">





            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="i_parent_name" value="<?php echo $k->parent_name;?>" disabled>

               </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="i_parent_id" value="<?php echo $k->parent_id;?>" disabled> </div>
                <?php echo form_error('parent_id'); ?>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact Number</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="i_parent_contact_number" value="<?php echo $k->parent_contact_number;?>" disabled>

                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">E-Mail</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="i_parent_email" value="<?php echo $k->parent_email;?>" disabled>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Social Media</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_parent_socmed" value="<?php echo $k->parent_socmed;?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_parent_address" value="<?php echo $k->parent_address;?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Poscode</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_parent_poscode" value="<?php echo $k->parent_poscode;?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">District</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_parent_district" value="<?php echo $k->parent_district;?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_parent_state" value="<?php echo $k->parent_state;?>" disabled>
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
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#child">Children Record</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#bill">Bill/Invoice</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pay">Payment History</a></li>
              </ul>

              <div class="tab-content">
                <br>
                <div id="child" class="tab-pane active">
                  <h5 class="card-title">Children List</h5>
                  <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>ID</th>
                                   <th>Name</th>
                                   <th>Contact Number</th>
                                   <th>Email</th>
                                   <th>Status</th>


                               </tr>
                           </thead>
                           <tbody>
                           <?php
                           $no=1;
                           foreach($student as $k){
                           ?>
                               <tr>
                                   <td><?php echo $no++; ?></td>
                                   <td><?php echo $k->IDC ?></td>
                                   <td><?php echo $k->Name ?></td>
                                   <td><?php echo '<i class="fas fa-mobile-alt"></i> '.$k->Contact_Number ?></td>
                                   <td><?php echo $k->Email ?></td>
                                   <td><?php echo $k->Status ?></td>

                               </tr>
                           <?php } ?>
                           </tbody>
                       </table>
                   </div>
                </div>
                <div id="bill" class="tab-pane fade">
                  <h5 class="card-title">Bill/Invoice List</h5>
                  <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Bill ID</th>
                                   <th>Children ID</th>
                                   <th>Bill Date</th>
                                   <th>Bill Total</th>
                                   <th>Bill Status</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                           <?php
                           $no=1;
                           foreach($invoice as $k){
                           ?>
                               <tr>
                                   <td><?php echo $no++; ?></td>
                                   <td><?php echo $k->bil_id ?></td>
                                   <td><?php echo $k->IDC?></td>
                                   <td><?php echo $k->bil_date ?></td>
                                   <td><?php echo $k->bil_total ?></td>
                                   <td><?php echo $k->bil_status ?></td>
                                   <td>
                                     <?php if ($k->bil_status != 'Full Paid'){
                                       ?> <a class="btn btn-info btn-sm" href="<?php echo base_url().'appmodule/bill'; ?>">
                                           <i class="fas fa-money-bill-alt"></i> Pay
                                       </a>
                                     <?php }?>
                                   </td>
                               </tr>
                           <?php } ?>
                           </tbody>
                       </table>
                   </div>
                </div>
                <div id="pay" class="tab-pane fade">
                  <h5 class="card-title">Payment History (Paid)</h5>
                  <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>#</th>
                                   <th>Bill ID</th>
                                   <th>Children ID</th>
                                   <th>Bill Date</th>
                                   <th>Bill Total</th>

                               </tr>
                           </thead>
                           <tbody>
                           <?php
                           $no=1;
                           foreach($payment as $k){
                           ?>
                               <tr>
                                   <td><?php echo $no++; ?></td>
                                   <td><?php echo $k->bil_id ?></td>
                                   <td><?php echo $k->IDC?></td>
                                   <td><?php echo $k->bil_date ?></td>
                                   <td><?php echo $k->bil_total ?></td>

                               </tr>
                           <?php } ?>
                           </tbody>
                       </table>
                   </div>
                </div>
              </div>
            </div>
           </div>

             <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
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
