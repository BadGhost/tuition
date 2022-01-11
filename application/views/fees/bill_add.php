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

        <?php if($this->session->userdata('usertype')=='head_admin') {
                $this->load->view('appmodule/header_left');
              }else if($this->session->userdata('usertype')=='head_accountant'){
                $this->load->view('appmodule/header_left_account');
              }
        ?>

         </div>


<div id="layoutSidenav_content" >

<div class="container-fluid">

<div class="card-header"><i class="fas fa-table mr-1"></i>Generate & Add Bill</div>



<div class="card shadow">
    <div class="card-body">
        <div class="container-fluid">

        <form action="<?php echo base_url().'appmodule/bill_add_act' ?>" method="post">



          <div class="row">

            <div class="col-xl-4 col-md-63">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Bill Date</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" name="i_thedate" id="i_thedate">

                </div>
              </div>
            </div>

            <div class="col-xl-4 col-md-63">
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Month</label>
            <div class="col-sm-9">
              <select id="i_month" name="i_month" class="form-control">
              <option value="01">Jan</option>
              <option value="02">Feb</option>
              <option value="03">Mac</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Jun</option>
              <option value="07">July</option>
              <option value="08">August</option>
              <option value="09">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
            </div>
            </div>
           </div>

            <div class="col-xl-4 col-md-63">
            <div class="form-group row">
            <label class="col-sm-3 col-form-label">Year</label>
            <div class="col-sm-9">
              <select id="i_year" name="i_year" class="form-control">
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
            </div>
            </div>
            </div>

            <div class="col-xl-4 col-md-63">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Student</label> <!--buat dropdown-->
                <div class="col-sm-9">
                    <select class="form-control" name="i_Stud_ID" id="course" required>
                        <option value="">No Selected</option>
                        <?php
                        $id="";
                        foreach($student as $k): ?>
                        <option value="<?php echo $k->IDC; $id = $k->IDC; ?>"><?php echo $k->Name; ?></option>
                        <?php endforeach; ?>
                        </select>
                <!--<div class="col-sm-8"><input type="text" class="form-control" name="i_Stud_ID"></div>-->
                </div>
              </div>
            </div>

            <div class="form-group row" style="display: none">
                <label class="col-sm-2 col-form-label">Course</label> <!--buat dropdown-->
                <div class="col-sm-8"><select class="form-control" id="i_Course_Code" name="i_Course_Code" required>
                    <option value="">No Selected</option>
                </select></div>

            </div>

        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Subject Fee</th>
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
              <input type="text" class="form-control" name="code" id="code" hidden>
              <input type="text" class="form-control" name="code2" id="code2" hidden>
            </div>

        </div>

        <div class="row">
            <div class="container-fluid">

            <div class="form-group row">

             <label>Note</label>
              <textarea class="form-control" name="i_note" id="i_note" rows="5"></textarea>
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
                            var html2 = '';
                            var html3 = 0;
                            var value = 0;
                            var code = [];
                            var i;
                            for(i=0; i<data.length; i++){
                                html += '<option value='+data[i].Course_Code+'>'+data[i].Course_Description+'</option>';
                                html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].Course_Code+'</td><td>'+data[i].Course_Name+'</td><td>'+data[i].Course_Amount+'</td></tr>';
                                value += parseFloat(""+data[i].Course_Amount+"");
                                code[i] = data[i].Course_Code;

                            }
                            $('#i_Course_Code').html(html);
                            document.getElementById("i_amount").value = value;
                            document.getElementById("code2").value = code;
                            document.getElementById("code").value = code.length;
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
