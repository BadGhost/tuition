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

<div class="card-header"><i class="fas fa-table mr-1"></i>Add Attendance</div>

<?php $subj = '';
foreach($student as $k){$subj = $k->subject_id;}?>

<div class="card shadow">
    <div class="card-body">

        <form action="<?php echo base_url().'appmodule/attendance_add_act' ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Course</label> <!--buat dropdown-->
                  <div class="col-sm-4"><input type="text" class="form-control" name="i_Course_Code" value="<?php echo $subj; ?>" required></div>
                  <label class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-4"><input type="date" class="form-control" name="i_thedate" id="i_thedate" required></div>
          </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Start Time</label> <!--buat dropdown-->
                <div class="col-sm-4"><input type="text" class="form-control" name="i_Start_Time" pattern="[0-9]{2}.[0-9]{2}[A-Z]{2}" placeholder="08.00PM" title="Example: 08.00PM" required></div>
                <label class="col-sm-2 col-form-label">End Time</label> <!--buat dropdown-->
                <div class="col-sm-4"><input type="text" class="form-control" name="i_End_Time" pattern="[0-9]{2}.[0-9]{2}[A-Z]{2}" placeholder="10.00PM" title="Example: 10.00PM" required></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Student List</label>
              <div class="card-body">
              <div class="table-responsive">
                <div>
                 <!-- <button class="btn btn-primary btn-sm delete_all">Check All</button> -->
                 <!-- <h6 style="color:blue; display: inline-block;">* Data yang telah dibuang tidak akan dapat diambil kembali</h6> -->
               </div>
               <br>
               <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                         <th width="50px"><input type="checkbox" id="master"></th>
                         <th>#</th>
                         <th>Student ID</th>
                         <th>Student Name</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php
                     $no=1;
                     foreach($student as $k){
                     ?>
                         <tr>
                             <td><input type="checkbox" class="sub_chk" name="ids[]" value="<?php echo $k->IDC; ?>">
                             <td><?php echo $no++; ?></td>
                             <td><?php echo $k->IDC ?></td>
                             <td><?php echo $k->Name ?></td>

                         </tr>
                     <?php } ?>
                   </tbody>
               </table>
           </div>
         </div>
            </div>
            <!-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-8">
                    <select class="form-control" name="i_Status" required>
                        <option value="">No Selected</option>
                        <option value="Attend">Attend</option>
                        <option vaue="Absent">Absent</option>
                    </select>
                </div>
            </div> -->
            <div class="form-group row">

            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>
</body>

</script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                $('#course').change(function(){
                    var id=$(this).val();
                    $.ajax({
                        url : "<?php echo site_url('appmodule/get_course_name');?>",
                        method : "POST",
                        data : {id: id},
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value='+data[i].Course_Code+'>'+data[i].Course_Description+'</option>';
                            }
                            $('#i_Course_Code').html(html);
                        }
                    });
                    return false;
                });

                $('#master').on('click', function(e) {
                  if($(this).is(':checked',true)){
                    $(".sub_chk").prop('checked', true);
                  } else {
                    $(".sub_chk").prop('checked',false);
                  }

                });

                $('.submit_all').on('click', function(e) {
                  var allVals = [];
                  $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                  });

                  if(allVals.length <=0){
                    alert("Please select row.");
                  }else {
                    var check = confirm("Confirm Attendance?");
                    if(check == true){
                      var join_selected_values = allVals.join(",");
                      $.ajax({
                        type: "POST",
                				url: "<?php echo site_url('appmodule/attendance_add_act');?>",
                        dataType :"json",
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                          console.log(data);
                          alert("Attendance Successfully Added.");
                        },
                        error: function (data) {
                          alert(data.responseText);
                        }
                      });
                    }
                  }
                });
            });

        </script>
        <script src="<?php echo base_url().'assets/'; ?>js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url().'assets/'; ?>demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url().'assets/'; ?>demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url().'assets/'; ?>demo/datatables-demo.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
