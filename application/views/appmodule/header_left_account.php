

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="<?php echo base_url().'main_page'; ?>"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                 Dashboard</a
                            >

                            <div class="sb-sidenav-menu-heading">Task</div>

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


                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Panda I+ Management
                    </div>
                </nav>
