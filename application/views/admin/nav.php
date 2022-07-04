<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Invester 1.0</span></div>
        </a>

        <hr class="sidebar-divider my-0">
        
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
        <li class="nav-item" role="presentation">
            <?php 
            if($_SESSION['uname'] == "admin") { ?>
            <a class="nav-link active" href="<?=site_url("admin/home");?>">
                <i class="fas fa-table"></i><span>Home</span>
            </a></li>


            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/overview");?>">
                    <i class="fas fa-table"></i><span>Overview</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/statistic");?>">
                    <i class="fas fa-table"></i><span>Statistic</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/transactions");?>">
                    <i class="fas fa-table"></i><span>Completed</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/Timeout");?>">
                    <i class="fas fa-table"></i><span>Timeout</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/export_to_excel");?>">
                    <i class="fas fa-table"></i><span>Export to Excel</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/Export To Excel");?>">
                    <i class="fas fa-table"></i><span>Payout Wallet</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/make_payout_to_client");?>">
                    <i class="fas fa-table"></i><span>Make Payout to Client</span>
                </a>
            </li>
            

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/payout_status");?>">
                    <i class="fas fa-table"></i><span>Payout Status</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/withdraws");?>">
                    <i class="fas fa-table"></i><span>Withdraw</span>
                </a>
            </li>


            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/Make New Request");?>">
                    <i class="fas fa-table"></i><span>Make New Request</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/history");?>">
                    <i class="fas fa-table"></i><span>History</span>
                </a>
            </li>


            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/history");?>">
                    <i class="fas fa-table"></i><span>API Integration</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/history");?>">
                    <i class="fas fa-table"></i><span>Setting</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/history");?>">
                    <i class="fas fa-table"></i><span>Change Password</span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?=site_url("admin/history");?>">
                    <i class="fas fa-table"></i><span>Logout</span>
                </a>
            </li>

            <?php } ?>

            
            

            
</ul>
<ul class="nav navbar-nav text-light"  id="accordionSidebar">
             

        </ul>

        <div class="text-center d-none d-md-inline">
        <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>