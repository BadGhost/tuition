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

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#choice").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
        </script>
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


  <div class="card-header"><i class="fas fa-table mr-1"></i>Bill Report</div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">


</div>
    <div class="card-body">

      <div class="row">
        <div class="col-xl-4 col-md-63">
              <div class="form-group row">
                <div class="col-sm-9">
                    <select class="form-control" name="choice" id="choice" required>
                        <option value="">Choose Category for Report</option>
                        <option value="date">Report By Date</option>
                        <option value="month">Report By Month</option>
                        </select>
                <!--<div class="col-sm-8"><input type="text" class="form-control" name="i_Stud_ID"></div>-->
                </div>
              </div>
            </div>

        </div>

      <div class="date box">
        <div class="row">
          <div class="col-xl-4 col-md-63">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Date</label> <!--buat dropdown-->
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="date" id="date">

                  </div>
                </div>
              </div>

          </div>

          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Student Name</th>
                          <th>Total Fees</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>

                      </tr>
                  </tbody>
              </table>
          </div>
      </div>

        <div><br><br></div>

        <div class="month box">
          <div class="row">
          <div class="col-xl-4 col-md-63">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Month</label> <!--buat dropdown-->
                  <div class="col-sm-9">
                      <select class="form-control" name="i_month" id="i_month" required>
                          <option value="">No Selected</option>
                          <option value="01">January</option>
                          <option value="02">February</option>
                          <option value="03">March</option>
                          <option value="04">April</option>
                          <option value="05">May</option>
                          <option value="06">June</option>
                          <option value="07">July</option>
                          <option value="08">August</option>
                          <option value="09">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                      </select>
                  <!--<div class="col-sm-8"><input type="text" class="form-control" name="i_Stud_ID"></div>-->
                  </div>
                </div>
              </div>

          </div>

          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Student Name</th>
                          <th>Total Fees</th>
                          <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>

                      </tr>
                  </tbody>
              </table>
          </div>
        </div>

        <div><br><br></div>
        <div class="row">
            <div class="container-fluid">

            <div class="form-group row">

            <button onclick="print_current_page()" class="btn btn-primary" id= "btn-bill" name='btn-bill' style="margin-left: 92%"> Print <i class="fas fa-print"></i></button>
            </div>

            </div>
        </div>

      </div>
      </div>

      </div>

        </div>

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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script>
          function print_current_page(){
            window.print();
          }
        </script>

        <script type="text/javascript">
            $(document).ready(function(){

                $('#date').change(function(){
                     var id=$(this).val();
                     $.ajax({
                         url : "<?php echo site_url('appmodule/get_bill_report_date');?>",
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
                                 html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].Name+'</td><td>'+data[i].bil_total+'</td><td>'+data[i].bil_status+'</td></tr>';


                             }
                             $('#dataTable tbody').html(html2);
                         }
                     });
                     return false;
                 });

                $('#i_month').change(function(){
                    var id=$(this).val();
                    $.ajax({
                        url : "<?php echo site_url('appmodule/get_bill_report_month');?>",
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
                                html2 += '<tr><td>'+(i+1)+'</td><td>'+data[i].Name+'</td><td>'+data[i].bil_total+'</td><td>'+data[i].bil_status+'</td></tr>';
                            }
                            $('#dataTable2 tbody').html(html2);
                        }
                    });
                    return false;
                });
            });
        </script>

</body>
