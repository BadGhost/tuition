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

<div class="card-header"><i class="fas fa-table mr-1"></i>Add Assessment</div>



<div class="card shadow">
    <div class="card-body">
<!-- name="myForm" onsubmit="return validateForm()" -->
        <form action="<?php echo base_url().'appmodule/assessment_add_act' ?>" method="post">
          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Course</label> <!--buat dropdown-->
              <div class="col-sm-8"><select class="form-control" id="i_Course_Code" name="i_Course_Code" required>
                  <option value="">No Selected</option>
                  <?php foreach($class as $k){ ?>
                    <option value="<?php echo $k->Course_Code;?>"><?php echo $k->Course_Name; ?></option>
                <?php  }?>
              </select></div>

          </div>
          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Type</label> <!--buat dropdown-->
              <div class="col-sm-8"><select class="form-control" name="i_Type" required>
                  <option value="">No Selected</option>
                  <option value="Quiz">Quiz</option>
                  <option value="Test">Test</option>
                  <option value="Exercise">Exercise</option>
              </select></div>

              <!--<input type="text" class="form-control" name="i_Type"></div>-->
          </div>
          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Assessment Name</label> <!--buat dropdown-->
              <div class="col-sm-8"><input type="text" class="form-control" name="i_Assess_Name" required></div>
              <!-- <p id="valid" style="color:red; visibility:hidden">* Enter the assessment name</p> -->
          </div>
          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Total Mark</label> <!--buat dropdown-->
              <div class="col-sm-8"><select class="form-control" name="i_Ttl Mark" required><?php
                       for($i=0; $i<=100; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php }
                  ?></select></div>
          </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Student</label> <!--buat dropdown-->
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
                           <th>#</th>
                           <th>Student ID</th>
                           <th>Student Name</th>
                           <th>Mark</th>
                       </tr>
                     </thead>
                     <tbody>
                           <tr>
                               <!-- <td><input type="checkbox" class="sub_chk" name="ids[]" value="<?php echo $k->IDC; ?>"> -->

                               <td><select class="form-control" name="i_Mark[]" required><?php
                                       for($i=0; $i<=100; $i++) { ?>
                                         <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                       <?php }
                                   ?></select></td>

                           </tr>
                     </tbody>
                 </table>
             </div>
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
<script>
function validateForm() {
  var x = document.forms["myForm"]["i_Assess_Name"].value;
  if (x == "") {
  	document.getElementById("valid").style.visibility = "visible";
    alert("Assessment Name must be filled out");
    return false;
  }else{
  	document.getElementById("valid").style.visibility = "hidden";
  }
}
</script>
</body>

</script>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                $('#i_Course_Code').change(function(){
                    var id=$(this).val();
                    $.ajax({
                        url : "<?php echo site_url('appmodule/get_class_stud');?>",
                        method : "POST",
                        data : {id: id},
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html2 = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].IDC+'</td><td hidden><input class="form-control" type="text" name="ids[]" value="'+data[i].IDC+'" readonly="true"></td><td>'+data[i].Name+'</td><td><select class="form-control" name="i_Mark[]" required><?php for($i=0; $i<=100; $i++) { ?><option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></select></td></tr>';
                            }
                            $('#dataTable2 tbody').html(html2);
                        }
                    });
                    return false;
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
