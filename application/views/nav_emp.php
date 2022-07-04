<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>TONY Finance</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="<?=site_url("welcome/dashboard");?>">
                            <i class="fas fa-tachometer-alt"></i><span>ภาพรวม</span></a></li>
                    
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" href="<?=site_url("welcome/cars");?>">
                        <i class="fas fa-table"></i><span>รถในระบบ</span>
                    </a></li>

                    <li class="nav-item" role="presentation">
                    <a class="nav-link" href="<?=site_url("welcome/employees");?>">
                        <i class="fas fa-table"></i><span>เจ้าหน้าที่ในระบบ</span></a></li>
                    
                    
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" href="<?=site_url("welcome/backsetting");?>">
                        <i class="fas fa-user-circle"></i><span>ตั้งค่าระบบหลังบ้าน</span>
                    </a></li>
                </ul>


                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>