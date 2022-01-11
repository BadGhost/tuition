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
                }else if($this->session->userdata('usertype')=='head_accountant'){
                  $this->load->view('appmodule/header_left_account');
                }
          ?>

         </div>


<div id="layoutSidenav_content" >

<div class="container-fluid">

<?php
  $studentname;
  	foreach($student as $b){
  		$studentid=$b->IDC;
      $studentname=$b->Name;
  	}
  $bil;
  	foreach($bill_item as $bi){
  		$bil=$bi->bil_id;
  	}
?>

<div class="card-header"><i class="fas fa-table mr-1"></i>Update Bill Information (<?php echo $studentname; ?>)</div>


<div class="card shadow">
    <div class="card-body">
      <a class="btn btn-info btn-sm btn-lg" href="#" data-toggle="modal" data-target="#largeModal"><i class="lni-search"></i>Detail Subject for Bill</a>

        <?php foreach($bill as $k){ ?>
        	<script>
        		var x = "<?php $k->bil_balance; ?>";
        		document.getElementById(x).selected = "true";
        	</script>
        <form action="<?php echo base_url().'appmodule/bill_update' ?>" method="post" name="myForm" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?php echo $k->id; ?>">
            <input type="hidden" name="stud" value="<?php echo $k->bil_student; ?>">
            <input type="hidden" name="bil" value="<?php echo $bil; ?>">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bil id</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="i_bil_id" value="<?php echo $k->bil_id;?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bil Date</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="i_thedate" value="<?php echo $k->bil_date; ?>" required></div>
                <?php echo form_error('name'); ?>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Month</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="i_month" value="<?php echo $k->bil_month; ?>" required>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Year</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="i_year" value="<?php echo $k->bil_year; ?>" required>

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Amount (RM)</label>
                <div class="col-sm-10">

                <input type="text" class="form-control" name="i_amount" id="i_amount" value="<?php echo $k->bil_total; ?>" required>
                </div>
            </div>

            <div class="row">
            	<div class="col-xl-4 col-md-64">
            		<div class="form-group row">
		                <label class="col-sm-6 col-form-label">Balance (RM)</label>
		                <div class="col-sm-6">
                    <input type="text" class="form-control" name="oldbalance" id="oldbalance" value="<?php echo $k->bil_balance; ?>" hidden>
		                <input type="text" class="form-control" name="i_balance" id="i_balance" value="<?php echo $k->bil_balance; ?>">
		                </div>
		            </div>
            	</div>

            	<div class="col-xl-4 col-md-64">
            		<div class="form-group row">
		                <label class="col-sm-5 col-form-label">Paid Amount (RM)</label>
		                <div class="col-sm-6">
                    <input type="text" class="form-control" name="oldpaid" id="oldpaid" value="<?php echo $k->bil_paid; ?>" hidden>
                    <input type="text" class="form-control" name="i_paid" id="i_paid" pattern="\d+" title="Example: 140" required>
                    <input type="text" class="form-control" name="paid" id="paid" value="" hidden>
		                </div>

	            	</div>
            	</div>

              <div class="col-xl-4 col-md-64">
                <div class="form-group row">
                  <input class="btn btn-primary" type="button" onclick="myFunc()" value="Reset payment">
                </div>
              </div>
              <script>
                function myFunc() {
                  var old = document.getElementById("oldbalance").value;
                  var oldd = document.getElementById("oldpaid").value;
                  document.getElementById("i_paid").value = 0;
                  document.getElementById("i_balance").value = old;
                  document.getElementById("paid").value = " ";
                }
              </script>

            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Subject to Pay</label>
              <div class="col-sm-6">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <?php
                        $no=1;
                        foreach($bill_item as $m){
                          if($m->status_payment != "Paid"){?>
                            <tr>
                                <td><label><input id="payment" type="checkbox" name="payment[]" value="<?php echo $m->item_id ?>"
                                  > <?php echo $m->Course_Name ?> = RM <?php echo $m->Course_Amount ?></label>
                            </tr>
                        <?php }} ?>
                    </table>
                </div>
                <div style="visibility:hidden; color:red" id="agree_chk_error"> Can't proceed as you didn't choose the subject to pay!</div>
                <p id="demo"></p>
              </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bil Status</label>
                <div class="col-sm-10">
				<select id="i_status" name="i_status" class="form-control"?>" required>
	              <option value="">No Selection</option>
	              <option value="Partial">Partial</option>
	              <option value="Full Paid">Full</option>
	              <option value="Unpaid">Unpaid</option>
	            </select>
                </div>
            </div>

            <div class="row">
            <div class="container-fluid">

            <div class="form-group row">

             <label>Note</label>
              <textarea class="form-control" name="i_note" id="i_note" rows="5" value="<?php echo $k->bil_note; ?>"></textarea>
            </div>

        </div>
        </div>
           <div class="row">
            <div class="container-fluid">

	            <div class="form-group row">
	                    <button type="submit" class="btn btn-primary">Update Bill</button>
	            </div>
        	</div>
    	   </div>
       </form>
       <script>
       function validateForm() {
         if ($('input:checkbox').filter(':checked').length < 1){
           document.getElementById("agree_chk_error").style.visibility = "visible";
           alert("Please Check at least one Check Box");
           return false;
         }else{
         	document.getElementById("agree_chk_error").style.visibility = "hidden";
         }
       }
       </script>
       <!-- <script>
       function validateForm(form)
        {
           console.log("checkbox checked is ", form.payment.checked);
           if(!form.payment.checked)
           {
               document.getElementById('agree_chk_error').style.visibility='visible';
               return false;
           }
           else
           {
               document.getElementById('agree_chk_error').style.visibility='hidden';
               return true;
           }
        }
       </script> -->


        <?php } ?>
    </div>
</div>
</div>
</div>

<!--mula modal -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">


            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Subjects Fee for Bil : (<?php echo $bil; ?>) </h4>
            </div>
                <div class="modal-body" style="overflow:scroll;height:500px;">

                  <div class="card shadow-lg mb-4">
                 <table class="table table-bordered table-condensed" style="font-size:14px;" id="mydata">
                    <thead>
                        <tr class="bg-info text-white">
                            <th>#</th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Amount</th>

                        </tr>
                    </thead>
                    <tbody>

                      <?php
                      $no=1;
                      $total_value=0;
                      foreach($bill_item as $m){

                      ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $m->Course_Code ?></td>
                        <td><?php echo $m->Course_Name ?></td>
                        <td><?php echo $m->Course_Amount ?></td>
                    </tr>

                <?php
                $total_value = $total_value+$m->Course_Amount;
              } ?>

                    </tbody>




                </table>
                </div>

                </div>



                <div class="modal-footer">
                  <div class="col-xl-8 col-md-64">
                		<div class="form-group row">
    		                <label class="col-sm-5 col-form-label">Total Amount (RM)</label>
    		                <div class="col-sm-6">

    		                <input type="text" class="form-control" name="i_amount" id="i_amount" value="<?php echo $total_value; ?>">
    		                </div>
    	            	</div>
                	</div>
                  <button class="btn btn-primary text-white" data-dismiss="modal" aria-hidden="true">Close</button>

                </div>

      </div>
      </div>

      </div>


<!-- tamat modal -->

</body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){

                $('#i_paid').change(function(){
                	var amount = document.getElementById("i_amount").value;
                	var paid = document.getElementById("i_paid").value;
                  var oldbal = document.getElementById("i_balance").value;
                  var bal = document.getElementById("i_balance").value;
                  var newPaid = parseFloat(amount) - parseFloat(bal) + parseFloat(paid);

                  if (paid == " "){
                    document.getElementById("i_balance").value = oldbal;
                  }else{
                    if (bal != 0){
                      var balance = parseFloat(bal) - parseFloat(paid);
                    	document.getElementById("i_balance").value = balance;
                      document.getElementById("paid").value = newPaid;
                    }

                    if(balance == 0){
                      document.getElementById('i_status').value="Full Paid";
                    }else if(balance == amount){
                      document.getElementById('i_status').value="Unpaid";
                    }else{
                      document.getElementById('i_status').value="Partial";
                    }
                  }


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
