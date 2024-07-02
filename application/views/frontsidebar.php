<!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">Dashboard</span>
                                
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-globe"></i>
                                </span>
                                <span class="title">All Services</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url('services/view')?>">View Services</a>
                            </li>

                            <!--<li>-->
                            <!--        <a href="<?=base_url('services')?>">Add Services</a>-->
                            <!--</li>-->
                                <!--<li>-->
                                <!--    <a href="<?=base_url()?>services/neurotoxin">Neurotoxin</a>-->
                                <!--</li>-->
                            </ul>
                        </li>
                        
                        <?php if($this->session->userdata('user_type')== 'super admin' || $this->session->userdata('user_type')=='admin'){ ?>
                              <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-heartbeat"></i>
                                </span>
                                <span class="title">Staff</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url()?>staff/addStaff">Add Staff</a>
                                </li>
                                 <li>
                                    <a href="<?=base_url()?>staff">View Staff</a>
                                </li>
                                
                            </ul></li>
                        <?php } ?>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="fa fa-heartbeat"></i>
                                </span>
                                <span class="title">Patients</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                            <!--    <li>-->
                            <!--        <a href="<?=base_url()?>patients/allpatients">Patient List</a>-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        <a href="<?=base_url()?>patients/registration">Registration</a>-->
                            <!--    </li>-->

                               <li>
                                    <a href="<?=base_url()?>patients/patient_note_list/">Patient Notes List</a>
                                </li>
                                   <li>
                                    <a href="<?=base_url()?>FrontDashboard/all_transication">Add Session/package</a>
                                </li>
                            <!--   <li>-->
                            <!--        <a href="<?=base_url()?>patients/patients_preparation_form/">Patient's Preparation</a>-->
                            <!--    </li>-->


                            <!--    <li>-->
                            <!--        <a href="<?=base_url()?>patients/ntxnpatientlist">Service</a>-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        <a href="<?=base_url()?>patients/fillerservice">Filler</a>-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        <a href="#">Service Note</a>-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        <a href="#">Invoice</a>-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        <a href="#">Daily List</a>-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        <a href="#">All Services by Note</a>-->
                            <!--    </li>-->
                            <!--    <li>-->
                            <!--        <a href="#">Added Document List</a>-->
                            <!--    </li>-->
                            </ul>
                        </li>
        <!--                <li class="nav-item dropdown">-->
        <!--                    <a class="dropdown-toggle" href="javascript:void(0);">-->
        <!--                        <span class="icon-holder">-->
								<!--	<i class="anticon anticon-build"></i>-->
								<!--</span>-->
        <!--                        <span class="title">Total Revenue</span>-->
        <!--                        <span class="arrow">-->
								<!--	<i class="arrow-icon"></i>-->
								<!--</span>-->
        <!--                    </a>-->
        <!--                    <ul class="dropdown-menu">-->
        <!--                        <li>-->
        <!--                            <a href="<?php echo base_url('revenue/yearData'); ?>">Yearly</a>-->
        <!--                        </li>-->
                                <!-- <li>
        <!--                            <a href="#">Weekly</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="#">Monthly</a>-->
        <!--                        </li>-->
        <!--                        <li>-->
        <!--                            <a href="#">Choosen Priod</a>-->
        <!--                        </li> -->
        <!--                    </ul>-->
        <!--                </li>-->
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-hdd"></i>
                                </span>
                                <span class="title">Inventory</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url()?>inventory/">Add New Inventory</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('inventory/view_inventory')?>">View Inventory</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-form"></i>
                                </span>
                                <span class="title">Invoices Building</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?=base_url('invoice')?>">Create Invoice</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('invoice/invoice_list')?>">View Invoices</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->