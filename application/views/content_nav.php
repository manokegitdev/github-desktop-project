<nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
	<div class="container-fluid">
	
	<button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop"
			type="button"><i class="fas fa-bars"></i></button>
		 

		<ul class="nav navbar-nav flex-nowrap ml-auto">
			<li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
					aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
				<div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
					aria-labelledby="searchDropdown">
					<form class="form-inline mr-auto navbar-search w-100">
						<div class="input-group"><input class="bg-light form-control border-0 small" type="text"
								placeholder="Search for ...">
							<div class="input-group-append">
							<button class="btn btn-primary py-0" type="button">
							<i class="fas fa-search"></i></button></div>
						</div>
					</form>
				</div>
			</li>
			 
			<div class="d-none d-sm-block topbar-divider"></div>
			<li class="nav-item dropdown no-arrow" role="presentation">
				<div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
						aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?=@$_SESSION['fname'];?> <?=@$_SESSION['lname'];?></span><img class="border rounded-circle img-profile"
							src="<?=base_url();?>public/assets/img/avatars/avatar1.jpeg"></a>
					<div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
					
					<a class="dropdown-item" role="presentation" href="<?=base_url();?>welcome/myprofile" ><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;ข้อมูลส่วนตัว</a>
					
						<div class="dropdown-divider"></div>
						
						<a class="dropdown-item" role="presentation" href="<?=site_url("welcome/signout");?>"><i
								class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
					</div>
				</div>
			</li>
		</ul>
	</div>
</nav>
