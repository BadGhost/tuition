<!-- Page Heading -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/GrayGrids/LineIcons/LineIcons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/GrayGrids/LineIcons/LineIcons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


        <link href="<?php echo base_url().'assets/'; ?>css/styles.css" rel="stylesheet" />


        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">
        <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
         <link href="<?php echo base_url().'assets/dist/css/pandadatetimepicker'?>" rel="stylesheet">
         <link href="<?php echo base_url().'assets/'; ?>vendor/sweetalert/sweetalert.css" rel="stylesheet">










<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

 <?php $this->load->view('appmodule/header_top'); ?>

</nav>


  <div id="layoutSidenav">

        <div id="layoutSidenav_nav">

        <?php $this->load->view('appmodule/header_left'); ?>

         </div>


<div class="center" id="layoutSidenav_content" >

<div class="container-fluid">

<div><br><br></div>

<div class="card-header"><i class="fas fa-table mr-1"></i>Forgot Password</div>

<div class="center card shadow">
    <div class="card-body">
        <div class="container-fluid">

        <form action="<?php echo base_url().'appmodule/bill_add_act' ?>" method="post">

          <div class="row">


            <div class="col-xl-5 col-md-63">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Parent</label> <!--buat dropdown-->
                <div class="col-sm-9">
                    <select class="form-control" name="parent" id="parent" required>
                        <option value="">No Selected</option>
                        <?php
                        $id="";
                        foreach($parent as $k): ?>
                        <option value="<?php echo $k->parent_id; $id = $k->parent_id; ?>"><?php echo $k->parent_name; ?></option>
                        <?php endforeach; ?>
                        </select>
                </div>
              </div>
            </div>

            <div class="col-xl-5 col-md-63">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Parent</label>
                <div class="col-sm-9">
                  <input type="text" name="username" id="username" class="form-control">

                  <input type="password" name="password" id="password" class="form-control" placeholder="New Password" required autofocus>
                </div>
              </div>
            </div>

        </div>



        <div class="row">
            <div class="container-fluid">

            <div class="form-group row">

            <button type="submit" class="btn btn-primary" id= "btn-bill" name='btn-bill' > Process Bill <i class="fas fa-file-alt"></i></button>
            <!--<button type="submit" class="btn btn-primary btn-bill" id= "btn-bill" name="btn-bill"  href="">Process Bill 2 <i class="fas fa-file-alt"></i></button>

               <a class="btn btn-primary btn-sm btn-bill" href="<?php echo base_url().'appmodule/bill_add_act'; ?>">
                                <i class="fas fa-file-alt"></i> Process Bill 3
               </a>

            -->




            </div>

        </div>
        </div>





        </form>

       </div>

    </div>
</div>
</body>

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                $('#parent').change(function(){
                    var id=$(this).val();
                    $.ajax({
                        url : "<?php echo site_url('appmodule/get_parent');?>",
                        method : "POST",
                        data : {id: id},
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var html2 = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html = data[i].username;


                            }
                            document.getElementById("username").value = html;
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
        <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/'; ?>vendor/sweetalert/sweetalert.min.js"></script>



        <script type="text/javascript">

          $('.btn-bill').on("click", function(e) {

          e.preventDefault();
          var url = $(this).attr('href');
       //  var url = <?php echo base_url().'appmodule/bill_add_act'; ?>

          swal({
              title: "Process Bill?",
              text: "This will generate Bill for the student",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: '#DD6B55',
              confirmButtonText: 'Yes, Process!',
              cancelButtonText: "No, Cancel!",
              confirmButtonClass: "btn-danger",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm) {
              if (isConfirm) {
                swal("Processed", "Bil Generated", "success");
                setTimeout(function(){ window.location.replace = url; }, 2000);
                window.location.replace(url);
              } else {
                swal("Cancel", "Bill Not Generated :)", "error");
              }
            });
        });
        </script>



        <script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker({
                    format: 'DD MMMM YYYY HH:mm',
                });

                $('#datepicker').datetimepicker({
                    format: 'YYYY-MM-DD',
                });
                $('#datepicker2').datetimepicker({
                    format: 'YYYY-MM-DD',
                });

                $('#timepicker').datetimepicker({
                    format: 'HH:mm'
                });
            });
    </script>

        <script type="text/javascript">
        $(function(){
            $('.harpok').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            $("#kode_brg").keyup(function(){
                var kobar = {kode_brg:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'admin/pembelian/get_barang';?>",
               data: kobar,
               success: function(msg){
               $('#detail_barang').html(msg);
               }
            });
            });

            $("#kode_brg").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });
    </script>
