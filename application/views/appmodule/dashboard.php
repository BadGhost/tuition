<!-- Begin Page Content -->


        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta http-equiv="refresh" content="300;welcome?pesan=logout" />
        <title>Dashboard - PI+ Tution Centre Management Suite</title>
        <link href="<?php echo base_url().'assets/'; ?>css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"/>


<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

 <?php $this->load->view('appmodule/header_top'); ?>

</nav>


         <div id="layoutSidenav">

            <div id="layoutSidenav_nav">

 <?php
          $this->load->view('appmodule/header_left');
          ?>

            </div>


<div id="layoutSidenav_content" >
                <main>
                    <div class="container-fluid">
                        <h2 class="mt-4">Tuition Centre Operation Summary</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-63">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Student Record</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url().'appmodule/student'; ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Student Fee</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url().'appmodule/bill'; ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Attendance</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url().'appmodule/attendance_report_admin'; ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Assessments</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="<?php echo base_url().'appmodule/assessment_report_admin'; ?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Fee List</div>
                                    <div class="card-body">
                                      <div class="table-responsive">
                                          <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                              <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th>Month</th>
                                                    <th>Total Dues Bill</th>
                                                    <th>Total Dues Payment</th>
                                                    <th>Details</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                $no=1;
                                                $total=0;
                                                foreach($ageing as $k){

                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $k->Month ?></td>
                                                        <td><?php echo $k->Total_bil?></td>
                                                        <td>RM <?php echo $k->Sum_bil ?></td>
                                                        <td><?php echo $k->Total_bil?> outstanding bills worth RM <?php echo $k->Sum_bil?></td>

                                                    </tr>
                                                <?php
                                                $total += $k->Sum_bil; } ?>
                                                <tr>
                                                    <td></td>
                                                    <td>1 Year</td>
                                                    <td>Total Outstanding Payment</td>
                                                    <td>RM <?php echo $total?></td>
                                                    <td></td>
                                                </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Attendance Report</div>
                                    <div class="card-body"><!--<canvas id="myBarChart" width="100%" height="40"></canvas>-->
                                      <div class="table-responsive">
                                          <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                              <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Student Id</th>
                                                      <th>Date</th>
                                                      <th>Course Code</th>
                                                      <th>Status</th>


                                                  </tr>
                                              </thead>
                                              <tbody>
                                              <?php
                                              $no=1;
                                              foreach($attendance as $k){
                                              ?>
                                                  <tr>
                                                      <td><?php echo $no++; ?></td>
                                                      <td><?php echo $k->bil_student ?></td>
                                                      <td><?php echo $k->date ?></td>
                                                      <td><?php echo $k->course_code?></td>
                                                      <td><?php echo $k->status ?></td>

                                                  </tr>
                                              <?php } ?>
                                              </tbody>
                                          </table>
                                      </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Student List</div>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Parent ID</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Status</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no=1;
                                    foreach($student as $k){
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $k->IDC ?></td>
                                            <td><?php echo $k->Name ?></td>
                                            <td><?php echo $k->ParentID ?></td>
                                            <td><?php echo '<i class="fas fa-mobile-alt"></i> '.$k->Contact_Number ?></td>
                                            <td><?php echo $k->Email ?></td>
                                            <td><?php echo $k->Status ?></td>

                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                      </div>

                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; HISNA 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
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
