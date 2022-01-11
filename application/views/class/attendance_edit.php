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
              }else if($this->session->userdata('usertype')=='tutor'){
                $this->load->view('appmodule/header_left_user');
              }
              ?>

         </div>


<div id="layoutSidenav_content" >

<div class="container-fluid">

<div class="card-header"><i class="fas fa-table mr-1"></i>Edit Attendance</div>


<div class="card shadow">
    <div class="card-body">

        <?php foreach($attendance as $k){ ?>
        <form action="<?php echo base_url().'appmodule/attendance_update' ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $k->id; ?>">


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Student ID</label>
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Stud_ID" value="<?php echo $k->bil_student;?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Course Code</label>
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Course_Code" value="<?php echo $k->course_code; ?>" required></div>
                <!--<?php echo form_error('name'); ?>-->
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Start Time</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="i_Start_Time" value="<?php echo $k->start_time; ?>" required>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">End Time</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" name="i_End_Time" value="<?php echo $k->end_time; ?>" required>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-8"><input type="date" class="form-control" name="i_thedate" id="i_thedate" value="<?php echo $k->date; ?>" required>
                <!--<input type="text" class="form-control" name="i_Email" value="<?php echo $k->Email; ?>">-->
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-8">
                    <!--<select class="form-control" name="i_Status" selected="<?php echo $k->status; ?>">
                        <option value="Attend">Attend</option>
                        <option vaue="Absent">Absent</option>
                    </select>-->
                <input type="text" class="form-control" name="i_Status" value="<?php echo $k->status; ?>" required>
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
