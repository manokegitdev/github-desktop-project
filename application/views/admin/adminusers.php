<!DOCTYPE html>
<html lang="th">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?=$this->app_module;?> - <?=$this->app_name;?></title>
	<meta name="description" content="<?=$this->app_desc;?>">
	<link rel="stylesheet" href="<?= base_url(); ?>public/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="<?= base_url(); ?>public/assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
	<div id="wrapper"><?php
						// load left menu
						$this->load->view('admin/nav'); ?>
		<div class="d-flex flex-column" id="content-wrapper">
			<div id="content">
				<?php
				// load menu content
				$this->load->view('content_nav'); ?>
				<div class="container-fluid">

					<div class="card shadow">
						<div class="card-header py-3">
							<p class="text-primary m-0 font-weight-bold">รายการผู้ใช้งานระบบ</p>
						</div>
						<div class="card-body">
							
							<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#admin_users" >เพิ่มใหม่</button>
							<br /><br />

								<table id="datatable" class="table table-striped table-sm">
									<thead>
										<tr>
											<th>No</th>
											<th>ชื่อ</th>
											<th>สกุล</th>
											<th>E-Mail</th>
											<th>โทรศัพท์</th>
											<th>ผู้ใช้</th>
											<th>ชื่อกลุ่มสิทธิ์</th>
											<th>ระงับ</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>



									</tbody>
								</table>

								
<!-- modal form --> <div class="row">
		
		<div class="modal fade" id="admin_users" tabindex="-1" role="dialog" aria-labelledby="label_admin_users" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="label_admin_users">ฟอร์มจัดการ Admin</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">×</span>
				</button>
			  </div>
			  <div class="modal-body">
				
				<!-- input hmtl content here -->
			<form id="frm" name="frm" method="post">
				<div class="form-check form-check-inline">      
					<input type="hidden" class="form-control" id="id" name="id" placeholder="" value="">
					<input  type="checkbox" class="form-check-input" id="is_lock" name="is_lock" placeholder=""  value="" >
					<label  class="form-check-label" for="is_lock">ระงับ</label>
				</div>

				<div class="form-group">
						<label for="fname">ชื่อ</label>
						<input type="text" class="form-control" id="fname" name="fname" placeholder="ชื่อ..." value="" >
						</div>

				<div class="form-group">
						<label for="lname">สกุล</label>
						<input type="text" class="form-control" id="lname" name="lname" placeholder="สกุล..." value="" >
						</div>

				<div class="form-group">
						<label for="email">E-Mail</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="E-Mail..." value="" >
						</div>

				<div class="form-group">
						<label for="phone">โทรศัพท์</label>
						<input type="text" class="form-control" id="phone" name="phone" placeholder="โทรศัพท์..." value="" >
						</div>

				<div class="form-group">
						<label for="uname">ชื่อผู้ใช้</label>
						<input type="text" class="form-control" id="uname" name="uname" placeholder="ชื่อผู้ใช้..." value="" >
						</div>

				<div class="form-group">
						<label for="pword">รหัสผ่าน</label>
						<input type="password" class="form-control" id="pword" name="pword" placeholder="รหัสผ่าน..." value="" >
						</div>

				

				<div class="form-group">
				<label for="role_id">สิทธิ์การใช้งาน</label>
				
				<select class="form-control" id="role_id" name="role_id">
				</select>
				
				</div></form>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" onclick="clearForm();" data-dismiss="modal">ปิด</button>
				<button type="button" class="btn btn-primary"  onclick="validForm();">บันทึก</button>
			  </div>
			</div>
		  </div>
		</div>
    </div>
	
	
	
	<style>
		/*Not Required*/
		.btn{margin-bottom:15px;}
		/*Required*/
		@media (max-width: 576px){.modal-dialog.modal-dialog-slideout {width: 80%}}
		.modal-dialog-slideout {min-height: 100%; margin: 0 auto 0 0 ;background: #fff;}
		.modal.fade .modal-dialog.modal-dialog-slideout {-webkit-transform: translate(-100%,0);transform: translate(-100%,0);}
		.modal.fade.show .modal-dialog.modal-dialog-slideout {-webkit-transform: translate(0,0);transform: translate(0,0);flex-flow: column;}
		.modal-dialog-slideout .modal-content{border: 0;}
	</style>
	
            <!-- end modal form -->  

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="bg-white sticky-footer">
		<div class="container my-auto">
			<div class="text-center my-auto copyright"><span>Copyright © Management 2020</span></div>
		</div>
	</footer>
	</div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
	<script src="<?= base_url(); ?>public/assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>public/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>public/assets/js/chart.min.js"></script>
	<script src="<?= base_url(); ?>public/assets/js/bs-init.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
	<script src="<?= base_url(); ?>public/assets/js/theme.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</body>

<script src="<?= base_url(); ?>/public/js/app.js"></script>


<script type="text/javascript">
        var myDataStore = {};
		var myRoleDataStore = {};
		var table = {};
            $(document).ready(function() {
              getDataStore();
             table= $('#datatable').DataTable({
				  'paging': true,
                
                'ajax': {
                    'url':'<?=site_url('admin/gets_admin_user_dt_json');?>'
                },
                'columns': [   { data: 'id' }, 
					   { data: 'fname' }, 
					   { data: 'lname' }, 
					   { data: 'email' }, 
					   { data: 'phone' }, 
					   { data: 'uname' }, 
					   { data: 'role_id' }, 
					   
					   { data: 'is_lock' }, 
					   { data: 'action' }	
                ]
            });
			});
			
	getRoleDataStore();

	setInterval(function() {
		table.ajax.reload();
	}, 30000);

	function renderToOption(ds, id, k, v) {
        var el = "";

        if (ds.length > 0) {
            $("#" + id).html("");

            ds.forEach(function(e, i) {
                el += "<option value=" + eval("e." + k) + ">" + eval("e." + v) + "</option>";
            });

            $("#" + id).append(el);
        }
    } //.End renderToOption

	function getRoleDataStore() {
        $.get('<?= site_url('admin/gets_role_json'); ?>',
            function(response) {
                if (response.success) {
                    myRoleDataStore = response.data;
                    renderToOption(myRoleDataStore, "role_id", "id", "name");
                } else {
                    alert('ไม่สามารถเรียกข้อมูลใหม่ได้');
                }
            }, 'json');
    }

	function validForm(){
	
			if($("#role_id option:selected").val() == "") {
				alert('Pls, select item');
				return;
			}// .End if
					

		postSave();
		 
	}// .End validForm

	function getDataStore() {
		$.get('<?=site_url('admin/gets_admin_user_json');?>'
				,function(response){
					console.log(response.success);
				  if(response.success){
            		myDataStore = response.data;
				  }else{
					  alert('ไม่สามารถเรียกข้อมูลใหม่ได้');
				  }
				},'json');
  	}
  
  	function renderDatatable() {
        var tds = "";
        if(myDataStore.length > 0) {
            $("#tbody").html("");

            myDataStore.forEach(function (e,i) {
				tds += "<tr>";
				
					tds += "<td>" + e.id + "</td>";
					tds += "<td>" + e.fname + "</td>";
					tds += "<td>" + e.lname + "</td>";
					tds += "<td>" + e.email + "</td>";
					tds += "<td>" + e.phone + "</td>";
					tds += "<td>" + e.uname + "</td>";
					tds += "<td>" + e.pword + "</td>";
					tds += "<td>" + e.is_lock + "</td>";
					tds += "<td>" + e.roles_id + "</td>";
		
            tds += "<td><a href=\"#\" onclick=\"edit(" + e.id + ")\" class=\"btn btn-primary\">EDIT</a>";
			tds += "<a data-toggle=\"modal\" data-target=\"#customer\"  href=\"#\" onclick=\"confirmDel(" + e.id + ")\" class=\"btn btn-warning\">DEL</a></td></tr>";
        }); 
            $("#tbody").append(tds); 
        }
        
        

    } //.End renderDatatable
	
	function clearForm(){ $("#id").val("");
			$("#fname").val("");
			$("#lname").val("");
			$("#email").val("");
			$("#phone").val("");
			$("#uname").val("");
			$("#pword").val("");
			
			$("#is_lock").prop("checked",false);
			$("#role_id option")[0].selected = true;
	}

	function edit(index){

				$("#id").val(myDataStore[index].id);
				$("#fname").val(myDataStore[index].fname);
				$("#lname").val(myDataStore[index].lname);
				$("#email").val(myDataStore[index].email);
				$("#phone").val(myDataStore[index].phone);
				$("#uname").val(myDataStore[index].uname);
				$("#pword").val(myDataStore[index].pword);
				$("#is_lock").prop("checked",(myDataStore[index].is_lock == "y") ? true : false);
				$("#role_id").val(myDataStore[index].roles_id);

	} // .End edit
	
	
			
			/**
			  Change state to is lock or unlock.
			 */
			function update_is_lock(/** int */id,/** string */ v){
			  let cc = confirm("Are you want to change this item?");
			  if(cc){
				$.post('<?=site_url('admin/update_is_lock_json');?>',{'id':id, 'is_lock':v}
				,function(response){
				  if(response.success){
            		getDataStore();
					alert('ทำรายการเรียบร้อย');
					table.ajax.reload();
				  }else{
					alert('ทำรายการไม่สำเร็จ');
				  }
				},'json');

			  } // .End if
			} //.end update_is_lock()
			//////////////////////////////////////
			 /**
			  Change state to is lock or unlock.
			 */
			function confirmDel(/** int */id){
			  let cc = confirm("ต้องการลบข้อมูล?");
			  if(cc){
				
				$.post("<?=site_url("admin/delete_admin_users_json");?>",{"id":id}
				,function(response){
				  if(response.success){
					getDataStore();
					table.ajax.reload();
					alert('ทำรายการเรียบร้อย');
				  }else{
					alert('ไม่สามารถปรับปรุงรายการได้');
				  }
				},'json');

			  } // .End if
			} //.end confirmDel()
			
		function postSave(){			
			$.post( "<?=site_url("admin/update_admin_users_json");?>", { 
					"id": $("#id").val(),
					"fname": $("#fname").val(),
					"lname": $("#lname").val(),
					"email": $("#email").val(),
					"phone": $("#phone").val(),
					"uname": $("#uname").val(),
					"pword": $("#pword").val(),
					"is_lock": ($("#is_lock:checked").prop("checked")) ? "y" : "n",
					"roles_id": $("#role_id option:selected").val(), }, 
				function(response){
					if(response.msg = "success"){
						getDataStore();
						table.ajax.reload();
						alert('บันทึกเปลี่ยนแปลงข้อมูลเรียบร้อย');
					}else{
						alert('เกิดข้อผิดพลาด ทำรายการไม่สำเร็จ');
					}
				},
			"json" );		
		}// .End postSave
        </script>
</html>