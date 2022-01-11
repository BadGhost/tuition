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

<div class="card-header"><i class="fas fa-table mr-1"></i>Edit Parent Record</div>


<div class="card shadow">
    <div class="card-body">


        <?php foreach($parent as $k){ ?>
        <form action="<?php echo base_url().'appmodule/parent_update' ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $k->id; ?>">





            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="i_parent_name" value="<?php echo $k->parent_name;?>" pattern="[A-Z\s]+" title="Accept Name in UPPERCASE" required>

               </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="i_parent_id" value="<?php echo $k->parent_id;?>" pattern="\d+" title="Accept ID in numbers only" required> </div>
                <?php echo form_error('parent_id'); ?>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact Number</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="i_parent_contact_number" value="<?php echo $k->parent_contact_number;?>" pattern="\d+" max="11" placeholder="0123456789" title="Enter phone numbers in numerical only" required>

                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">E-Mail</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="i_parent_email" value="<?php echo $k->parent_email;?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="xxx@gmail.com" title="Enter email in a correct pattern" required>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Social Media</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_parent_socmed" value="<?php echo $k->parent_socmed;?>" pattern="[A-Za-z]-[\\A-Za-z0-9\s]+*" placeholder="FB-Syamimi Halim" title="Enter social media account and username" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_parent_address" value="<?php echo $k->parent_address;?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Poscode</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_parent_poscode" value="<?php echo $k->parent_poscode;?>" pattern="\d+" max="5" placeholder="43200" title="Enter poscode in numerical only" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">District</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_parent_district" value="<?php echo $k->parent_district;?>" pattern="[A-Z\s]+" title="Accept District in UPPERCASE" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_parent_state" value="<?php echo $k->parent_state;?>" pattern="[A-Z\s]+" title="Accept State in UPPERCASE" required>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
        <?php } ?>


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
