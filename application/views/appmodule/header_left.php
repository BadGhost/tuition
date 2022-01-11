

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="<?php echo base_url().'main_page'; ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                 Dashboard</a
                            >

                            <div class="sb-sidenav-menu-heading">Task</div>



                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Student Record
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                <a class="nav-link" href="<?php echo base_url().'appmodule/student'; ?>">Student List</a>
                                <a class="nav-link" href="<?php echo base_url().'appmodule/parent'; ?>">Parent List</a>
                                <a class="nav-link" href="<?php echo base_url().'appmodule/student_report'; ?>">Report</a></nav>


                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Fee Record
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>

                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url().'appmodule/bill_add'; ?>">Generate Bill</a>
                                <a class="nav-link" href="<?php echo base_url().'appmodule/bill'; ?>">Bill List</a>
                                <a class="nav-link" href="<?php echo base_url().'appmodule/ageing'; ?>">Ageing Analysis</a>
                                <a class="nav-link" href="<?php echo base_url().'appmodule/bill_report'; ?>">Report</a></nav>



                            </div>


                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Attendance
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>

                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <!-- <a class="nav-link" href="<?php echo base_url().'appmodule/attendance'; ?>">Attendance List</a> -->
                                <a class="nav-link" href="<?php echo base_url().'appmodule/attendance_report_admin'; ?>">Report</a></nav>



                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Assessment
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>

                            <div class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <!-- <a class="nav-link" href="<?php echo base_url().'appmodule/assessment'; ?>">Assessment List</a> -->
                                <a class="nav-link" href="<?php echo base_url().'appmodule/assessment_report_admin'; ?>">Report</a></nav>



                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Master Setup
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages5" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Centre Structure
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href=<?php echo base_url().'appmodule/tutor'; ?>>Tutor</a>
                                            <a class="nav-link" href="<?php echo base_url().'appmodule/group'; ?>">Group</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Course & Subject
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="<?php echo base_url().'appmodule/package'; ?>">Package</a>
                                            <a class="nav-link" href=<?php echo base_url().'appmodule/course'; ?>>Subject</a>
                                            <a class="nav-link" href="<?php echo base_url().'appmodule/program'; ?>">Program</a></nav>
                                    </div>
                                    <!-- <a class="nav-link" href="<?php echo base_url().'appmodule/forgot_password'; ?>">Forgot Password -->
                                    </a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Analysis</div>
                            <!-- <a class="nav-link" href="#"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts</a> -->
                            <a class="nav-link" href="<?php echo base_url().'appmodule/analysis'; ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables</a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Panda I+ Management
                    </div>
                </nav>
