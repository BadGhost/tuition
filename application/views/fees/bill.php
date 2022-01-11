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
        <link href="<?php echo base_url().'assets/'; ?>css/bootstrap.css" rel="stylesheet" />



<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

 <?php $this->load->view('appmodule/header_top'); ?>

</nav>


  <div id="layoutSidenav">

        <div id="layoutSidenav_nav">

          <?php if($this->session->userdata('usertype')=='head_admin') {
                  $this->load->view('appmodule/header_left');
                }else if($this->session->userdata('usertype')=='head_accountant'){
                  $this->load->view('appmodule/header_left_account');
                }
          ?>

         </div>




<div id="layoutSidenav_content" >


  <div class="card-header"><i class="fas fa-table mr-1"></i>Bill List</div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">


</div>
    <div class="card-body">
        <a href="<?php echo base_url().'appmodule/bill_add'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Generate Bill</a>
        <div><br></div>
        <div class="table-responsive">

          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Number</th>
                        <th>Date</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Student ID</th>
                        <th>Total Amount</th>
                        <th>Total Paid</th>
                        <th>Balance</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($bill as $k){
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $k->bil_id ?></td>
                        <td><?php echo $k->bil_date ?></td>
                        <td><?php echo '<i class="fas fa-mobile-alt"></i> '.$k->bil_month ?></td>
                        <td><?php echo $k->bil_year ?></td>
                        <td><?php echo $k->bil_student ?></td>
                        <td><?php echo $k->bil_total ?></td>
                        <td><?php echo $k->bil_paid ?></td>
                        <td><?php echo $k->bil_balance ?></td>
                        <td><?php echo $k->bil_status ?></td>
                        <td>
                          <?php if ($k->bil_status != 'Full Paid'){
                            ?> <a class="btn btn-info btn-sm" href="<?php echo base_url().'appmodule/bill_edit/'.$k->id.'/'.$k->bil_id; ?>">
                                <i class="fas fa-money-bill-alt"></i> Pay
                            </a>
                          <?php }?>

                            <!-- <input type="submit" class="btn btn-warning btn-sm btn-lg" id="details" name="details" href="#" value="<?php echo $k->bil_id ?>">
                              Detail Items</button> -->
                            <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'appmodule/bill_hapus/'.$k->id; ?>">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>

                  </tbody>
            </table>



        </div>



    </div>

</div>


  <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function(){

          $('#details').click(function(e){
              e.preventDefault();
              var id=$(this).val();
              document.getElementById("test").value = id;
              $.ajax({
                  url : "<?php echo site_url('appmodule/get_bill_item');?>",
                  method : "POST",
                  data : {id: id},
                  async : true,
                  dataType : 'json',
                  success : function(data){
                      var html = '';
                      var html2 = '';
                      var html3 = 0;
                      var value = 0;
                      var i;
                      for(i=0; i<data.length; i++){
                          html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].Course_Code+'</td><td>'+data[i].Course_Name+'</td><td>'+data[i].Course_Amount+'</td></tr>';
                          value += parseFloat(""+data[i].Course_Amount+"");
                      }
                      document.getElementById("i_jumlah").value = value;
                      $('#dataTable2 tbody').html(html2);
                      //$('#dataTable tbody tr:last').append('<td>'+value+'</td>');



                  }
              });
              return false;
          });
      });
      $(document).ready(function(){

          $('#i_item').change(function(){
              var id=$(this).val();
              document.getElementById("test").value = id;
              $.ajax({
                  url : "<?php echo site_url('appmodule/get_bill_item');?>",
                  method : "POST",
                  data : {id: id},
                  async : true,
                  dataType : 'json',
                  success : function(data){
                      var html = '';
                      var html2 = '';
                      var html3 = 0;
                      var value = 0;
                      var i;
                      for(i=0; i<data.length; i++){
                          html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].Course_Code+'</td><td>'+data[i].Course_Name+'</td><td>'+data[i].Course_Amount+'</td></tr>';
                          value += parseFloat(""+data[i].Course_Amount+"");
                      }
                      document.getElementById("i_jumlah").value = value;
                      $('#dataTable2 tbody').html(html2);
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


<script type="text/javascript">
$('#largeModal').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var BillId = $(e.relatedTarget).data('data-id');

    //populate the textbox
    $(e.currentTarget).find('input[name="BillId"]').val(BillId);
});
</script>



</body>
