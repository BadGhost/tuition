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

<div class="card-header"><i class="fas fa-table mr-1"></i>Add Group</div>

<div class="card shadow">
    <div class="card-body">
        <form action="<?php echo base_url().'appmodule/group_add_act' ?>" method="post">
            <div class="form-group row" hidden>
                <label class="col-sm-2 col-form-label">Group ID</label> <!--buat dropdown-->
                <div class="col-sm-8"><input type="text" class="form-control" name="id" value=""></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Group Name</label> <!--buat dropdown-->
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Group_Name" required></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Group Description</label> <!--buat dropdown-->
                <div class="col-sm-8"><input type="text" class="form-control" name="i_Group_Desc" required></div>
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
                <th>Group Name</th>
                <th>Group Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        foreach($group as $k){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $k->group_name ?></td>
                <td><?php echo $k->group_desc ?></td>
                <td>
                  <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'appmodule/group_hapus/'.$k->Id; ?>">
                      <i class="fas fa-trash"></i> Delete
                  </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<div><br></div>
<div class="card-header"><i class="fas fa-table mr-1"></i>Add Group Member</div>
<div class="card shadow">
    <div class="card-body">

        <form action="<?php echo base_url().'appmodule/group_member_add_act' ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Group</label> <!--buat dropdown-->
                <div class="col-sm-8">
                    <select class="form-control" name="i_group" id="i_group" required>
                        <option value="">No Selected</option>
                        <?php
                        foreach($group as $k): ?>
                        <option value="<?php echo $k->Id; ?>"><?php echo $k->group_name; ?></option>
                        <?php endforeach;?>
                        </select>
                <!--<div class="col-sm-8"><input type="text" class="form-control" name="i_Stud_ID"></div>-->
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Student Name</label> <!--buat dropdown-->
                <div class="col-sm-8">
                  <select class="form-control" id="i_student" name="i_student" required>
                    <option value="">No Selected</option>
                    <?php
                    foreach($student as $k): ?>
                    <option value="<?php echo $k->IDC; ?>"><?php echo $k->Name; ?></option>
                    <?php endforeach;?>
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
                <th>Group Name</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        foreach($member as $k){
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $k->group_name ?></td>
                <td><?php echo $k->student_id ?></td>
                <td><?php echo $k->Name ?></td>
                <td>
                  <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'appmodule/member_hapus/'.$k->member_id; ?>">
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
