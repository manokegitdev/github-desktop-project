<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>VProp 1.0</span></div>
        </a>

        <hr class="sidebar-divider my-0">
        
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
        <li class="nav-item" role="presentation">
            <?php 
            if($_SESSION['uname'] == "admin") { ?>
            <a class="nav-link active" href="<?=site_url("admin/assign_offices");?>">
                <i class="fas fa-table"></i><span>ตั้งค่าสำนักงาน</span>
            </a></li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/adminusers");?>">
                    <i class="fas fa-table"></i><span>เจ้าหน้าที่ในระบบ</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/projects");?>">
                    <i class="fas fa-table"></i><span>โครงการ</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/locations");?>">
                    <i class="fas fa-table"></i><span>ทำเล</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/rate_prices");?>">
                    <i class="fas fa-table"></i><span>ช่วงราคา</span>
                </a>
            </li>
            <?php } ?>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/subjects");?>">
                    <i class="fas fa-tachometer-alt"></i><span>Sale Page</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/doccontract");?>">
                    <i class="fas fa-tachometer-alt"></i><span>เอกสารสัญญา</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/assets");?>">
                    <i class="fas fa-table"></i><span>ทรัพย์</span>
                </a>
            </li>
</ul>
<ul class="nav navbar-nav text-light"  id="accordionSidebar">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo1"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>บันทึกความต้องการลูกค้า</span>
                </a>
                <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=site_url("admin/customernotes");?>">
                            <i class="fas fa-table"></i><span>ส่วน VPRO</span>
                        </a>
                    </div>

                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=site_url("admin/customernotes_bycustomer");?>">
                            <i class="fas fa-table"></i><span>ส่วน Friend get friend</span>
                        </a>
                    </div>

                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?=site_url("admin/customernotes_coagent");?>">
                            <i class="fas fa-table"></i><span>ส่วน Co-Agent</span>
                        </a>
                    </div>
                </div>
            </li>

            <!-- <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?=site_url("admin/assign_tasks");?>">
                    <i class="fas fa-table"></i><span>ใบสั่งตัก</span>
                </a>
            </li> -->
            
            <!-- <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?=site_url("admin/report_assign_tasks");?>">
                    <i class="fas fa-table"></i><span>ออกรายงานใบสั่งตัก</span>
                </a>
            </li> -->

        </ul>

        <div class="text-center d-none d-md-inline">
        <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>