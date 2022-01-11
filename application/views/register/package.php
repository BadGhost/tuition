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


  <div class="card-header"><i class="fas fa-table mr-1"></i>Package</div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">

    <a href="<?php echo base_url().'appmodule/package_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Add Group / Group Member</a>
</div>
    <div class="card-body">

      <div class="col-xl-4 col-md-63">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Package</label> <!--buat dropdown-->
          <div class="col-sm-9">
              <select class="form-control" name="i_package" id="i_package" required>
                  <option value="">No Selected</option>
                  <?php
                  $id="";
                  foreach($package as $k): ?>
                  <option value="<?php echo $k->package_id; $id = $k->package_id; ?>"><?php echo $k->package_name; ?></option>
                  <?php endforeach; ?>
                  </select>
          <!--<div class="col-sm-8"><input type="text" class="form-control" name="i_Stud_ID"></div>-->
          </div>
        </div>
      </div>

      <br/>


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject Code</th>
                        <th>Package Subject</th>
                        <th>Subject Fees (RM)</th>
                        <th>Fees After Discount (RM)</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>

                  </tr>
                </tbody>
            </table>
        </div>

        <div class="form-group row" >
          <label class="col-sm-10 col-form-label" style="text-indent: 80%">Total Amount: RM</label> <!--buat dropdown-->
            <div class="col-sm-2">
              <!-- <select class="form-control" id="i_amount" name="i_Course_Code" required> -->
              <input type="text" class="form-control" name="i_amount" id="i_amount">
            </div>

        </div>


    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){

          $('#i_package').change(function(){
              var id=$(this).val();
              $.ajax({
                  url : "<?php echo site_url('appmodule/get_package_subject');?>",
                  method : "POST",
                  data : {id: id},
                  async : true,
                  dataType : 'json',
                  success : function(data){
                      var html = '';
                      var html2 = '';
                      var html3 = 0;
                      var value = 0;
                      var fee = 0;
                      var i;
                      for(i=0; i<data.length; i++){
                          fee = parseFloat(""+data[i].Course_Amount+"") - parseFloat(""+data[i].discount_price+"");
                          html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].Course_Code+'</td><td>'+data[i].Course_Name+'</td><td>'+data[i].Course_Amount+'</td><td>'+fee+'</td></tr>';
                          value += fee;

                      }
                      document.getElementById("i_amount").value = value;
                      $('#dataTable tbody').html(html2);
                      //$('#dataTable tbody tr:last').append('<td>'+value+'</td>');



                  }
              });
              return false;
          });
      });
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
