<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>
    <?=$this->app_module;?> - <?=$this->app_name;?></title>
    
    <meta name="description" content="ระบบบริหารข้อมูล,ระบบจัดการสมาชิก,ระบบบริหาร ไลน์ @,ไลน์ @,">
    <link rel="stylesheet" href="<?=base_url();?>public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?=base_url();?>public/assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
    <?php $this->load->view('nav'); ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php $this->load->view('content_nav'); ?>

            <div class="container-fluid">
                 
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">รายการใบสั่งตัก</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
								
										
								<div class="form-group"> 
									<input type="hidden" class="form-control" id="id" name="id" placeholder="" value="">
									
										<div class='input-group date'>
										<span style="width: 60px;padding-top: 5px;">วันที่:</span>
										<input type='date' class="form-control" value="<?php echo date('Y-m-d'); ?>" id="search_created_at" name="search_created_at" />
										<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
										</span>
										</div>
									</div>
							
	
									<div class="form-group">
										<label for="title">สำนักงาน</label>
										<select  class="form-control" id="search_assign_office_id" name="search_assign_office_id"></select>
									</div>

									<div class="form-group">
										<label for="title">ผู้ทำรายการ</label>
										<select class="form-control" id="search_app_user_id" name="search_app_user_id" ></select>
									</div>
										
										
								<button type="button" onclick="validSearchForm()" class="btn btn-primary"> ค้นหา </button> &nbsp;&nbsp;&nbsp;&nbsp;
								<button type="button" onclick="clearForm()" class="btn btn-sm btn-normal"> ล้าง </button>
								
									
								</div>
							</div>
                        <div 
                        class="table-responsive table mt-2" 
                        id="dataTable"
                        role="grid"
                        aria-describedby="dataTable_info">
                           
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assign_task"> + เพิ่มใหม่ </button>
                        <br/><br/>

						<table id="datatable" class="table table-striped table-sm">
							<thead>
								<tr> 
									
									<th>คิวเลขที่</th>
									<th>สำนักงาน</th>
									<th>ชื่อลูกค้า</th>
									<th>สินค้า</th>
									<th>จำนวน</th>
									<th>ทะเบียนรถรับของ</th>
									<th>ผู้บันทึก</th>
									<th>วันที่บันทึกข้อมูล</th>
									<th></th>
								</tr>
							</thead>
							<tbody id="tbody">

							</tbody>
						</table>

                        </div>
                        

<!-- modal form --> <div class="row">

		
		<div class="modal fade" id="assign_task" tabindex="-1" role="dialog" aria-labelledby="label_assign_task" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="label_assign_task">ฟอร์มบันทึกตั้งค่าสำนักงาน</h5>
				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">×</span>
				</button>
			  </div>
			  <div class="modal-body">
				
				<!-- input hmtl content here -->
				<form id="frm" name="frm" method="post">
					<div class="form-group"> 
					<input type="hidden" class="form-control" id="id" name="id" placeholder="" value="">
					</div>

					<div class="form-group" style="display:none;">
						<label for="app_user_id">ผู้ทำรายการ</label>
						<select class="form-control" id="app_user_id" name="app_user_id">
						</select>
					</div>
					
					<div class="form-group">
					<label for="assign_office_id">สำนักงาน</label>
					
					<select class="form-control" id="assign_office_id" name="assign_office_id">
					
					</select>
					
					</div>
					<div class="form-group">
							<label for="customer_name">ชื่อลูกค้า</label>
							<input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="" value="" >
							</div>

					<div class="form-check form-check-inline">      
					<input  type="checkbox" class="form-check-input" id="khong_gravel" name="khong_gravel" placeholder=""  value="" >
					<label  class="form-check-label" for="khong_gravel">หินโขงกรวด</label>
					</div>

					<div class="form-check form-check-inline">      
					<input  type="checkbox" class="form-check-input" id="coarse_sand" name="coarse_sand" placeholder=""  value="" >
					<label  class="form-check-label" for="coarse_sand">ทรายหยาบ</label>
					</div>

					<div class="form-check form-check-inline">      
					<input  type="checkbox" class="form-check-input" id="fine_sand" name="fine_sand" placeholder=""  value="" >
					<label  class="form-check-label" for="fine_sand">ทรายละเอียด</label>
					</div>

					<div class="form-check form-check-inline">      
					<input  type="checkbox" class="form-check-input" id="mountain_rock" name="mountain_rock" placeholder=""  value="" >
					<label  class="form-check-label" for="mountain_rock">หินภูเขา 3/4</label>
					</div>

					<div class="form-check form-check-inline">      
					<input  type="checkbox" class="form-check-input" id="mool_sand" name="mool_sand" placeholder=""  value="" >
					<label  class="form-check-label" for="mool_sand">ทรายมูล</label>
					</div>

					<div class="form-group">
							<label for="ohter">สินค้าอื่น</label>
							<input type="text" class="form-control" id="ohter" name="ohter" placeholder="" value="" >
							</div>

					<div class="form-check form-check-inline" style="display:none;">      
					<input  type="checkbox" class="form-check-input" id="is_print" name="is_print" placeholder=""  value="" >
					<label  class="form-check-label" for="is_print">is_print</label>
					</div>

					<div class="form-check form-check-inline" style="display:none;">      
					<input  type="checkbox" class="form-check-input" id="is_unuse" name="is_unuse" placeholder=""  value="" >
					<label  class="form-check-label" for="is_unuse">is_unuse</label>
					</div>

					<div class="form-check form-check-inline">      
					<input  type="checkbox" class="form-check-input" id="is_pickup" name="is_pickup" placeholder=""  value="" >
					<label  class="form-check-label" for="is_pickup">รับสินค้าเอง</label>
					</div>

					<div class="form-group">
							<label for="ship_address">สถานที่ส่งของ</label>
							<input type="text" class="form-control" id="ship_address" name="ship_address" placeholder="" value="" >
							</div>

					<div class="form-group">
							<label for="qty">จำนวน</label>
							<input type="number" class="form-control" id="qty" name="qty" placeholder="" value="" />

						

							<select id="unit" name="unit" class="form-control">
								<option value="ตัก">ตัก</option>
								<option value="คิว">คิว</option>
								<option value="หกล้อ">หกล้อ</option>
								<option value="สิบล้อ">สิบล้อ</option>
								<option value="พ่วง">พ่วง</option>
							</select>
							</div>

					

					<div class="form-group">
							<label for="car_license_no">ทะเบียนรถรับของ</label>
							<input type="text" class="form-control" id="car_license_no" name="car_license_no" placeholder="" value="" >
							</div>

					<div class="form-group">
					
					<label for="remark">หมายเหตุ</label>
						
					<textarea class="form-control" id="remark" name="remark" placeholder=""></textarea>
							
					</div>
				</form>
				
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
	@media print { 

		body * {
       visibility: hidden;
    }
    #printDiv, #printDiv * {
       visibility: visible;
    }
    #printDiv {
       position: absolute;
       left: 0;
       top: 0;
    }
}
#printDiv { size: 80mm 4in }
		.b-number{
			background-color:#000!important;
			text-align: center;
			font-size: 30px;
			color:#FFF;
			font-weight: 900;
			-webkit-print-color-adjust: exact; 
		}
	}
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


			<!-- print modal -->


			<div class="modal fade" id="print_assign_task" tabindex="-1" role="dialog" aria-labelledby="label_print_assign_task" aria-hidden="true">
				<div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="label_print_assign_task">พิมพ์ใบสั่งงาน</h5>
						
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div id="printDiv">
						 
							<table >
							<tr>
								<td width="120px;">เลขรันบิล</td><td id="print_no_running"></td>
								</tr>
								<tr>
								<td width="120px;">วันที่พิมพ์</td><td id="print_date"></td>
								</tr>
								<tr>
								<td width="120px;">ผู้ทำรายการ</td><td id="print_app_user"></td>
								</tr>
								<tr>
								<td>สำนักงาน</td><td id="print_assign_office"></td>
								</tr>
								<tr>
								<td>ชื่อลูกค้า</td><td id="print_customer_name"></td>
								</tr>
								<tr>
								<td>การรับของ</td><td id="print_is_pickup"></td>
								</tr>
								<tr>
								<td>ที่จัดส่ง</td><td id="print_shipp_address"></td>
								</tr>
								<tr>
								<td style="font-size:22px;">สินค้า</td><td style="font-size:22px;" id="print_product"></td>
								</tr>
								<tr>
								<td style="font-size:22px;">จำนวน</td><td style="font-size:22px;" id="print_qty_unit"></td>
								</tr>
								<tr>
								<td style="font-size:20px;">ทะเบียนรถ</td><td style="font-size:20px;" id="print_car_license_no"></td>
								</tr>
								<tr>
								<td>หมายเหตุ</td><td id="print_remark"></td>
								</tr>
							</table>
							 
						</div>

						<!-- end print modal -->
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary"   data-dismiss="modal">ปิด</button>
							<button type="button" class="btn btn-primary"  onclick="printAssignTask();">พิมพ์</button>
						</div>
					</div>
				</div>
				</div>


                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Thasia Management 2021</span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="<?=base_url();?>public/assets/js/jquery.min.js"></script>
	<script src="<?=base_url();?>public/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>public/assets/js/chart.min.js"></script>
	<script src="<?=base_url();?>public/assets/js/bs-init.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
	<script src="<?=base_url();?>public/assets/js/theme.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
	</script>
</body>


<script type="text/javascript">

function toThaiDateString(date) {
    let monthNames = [
        "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน",
        "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม.",
        "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
    ];

    let year = date.getFullYear() + 543;
    let month = monthNames[date.getMonth()];
    let numOfDay = date.getDate();

    let hour = date.getHours().toString().padStart(2, "0");
    let minutes = date.getMinutes().toString().padStart(2, "0");
    let second = date.getSeconds().toString().padStart(2, "0");

    return `${numOfDay} ${month} ${year} ` +
        `${hour}:${minutes}:${second} น.`;
}

let date1 = new Date();

console.log(toThaiDateString(date1));

        var myDataStore = {};
        var myApp_userStore = [];
		var myAssign_officeStore = [];
		
		    var table = {};
            $(document).ready(function() {
              getDataStore();
             table = $('#datatable').DataTable({
				  'paging': true,
                
                'ajax': {
                    'url':'<?=site_url('admin/gets_assign_task_dt_json');?>'
                },
                'columns': [   
					{ data: 'no_running' }, 
             
             { data: 'assign_office_id' }, 
             { data: 'customer_name' },   
             { data: 'product' },  
             { data: 'qty' }, 
             { data: 'car_license_no' }, 
          
             { data: 'created_by' }, 
             
          
        { data: 'action' },
                ]
            });


			

          });

		  function printAssignTask() {

			window.print();
		  }

		  function viewBillTask(el) {

			var index = el.getAttribute("data-index");

				$("#print_app_user").html(myDataStore[index].app_user);
				$("#print_no_running").html(myDataStore[index].no_running);
				$("#print_date").html(toThaiDateString(date1));
				$("#print_assign_office").html(myDataStore[index].assign_office);
				$("#print_customer_name").html(myDataStore[index].customer_name);
				 
				var product = "";
				if(myDataStore[index].khong_gravel == "y") {
					product += " หินโขงกรวด";
				}
				if(myDataStore[index].coarse_sand == "y") {
					product += " ทรายหยาบ";
				}
				if(myDataStore[index].fine_sand == "y") {
					product += " ทรายละเอียด";
				}
				if(myDataStore[index].mountain_rock == "y") {
					product += " หินภูเขา 3/4";
				}
				if(myDataStore[index].mool_sand == "y") {
					product += " ทรายมูล";
				}
				if(myDataStore[index].ohter != "") {
					$product += " " +myDataStore[index].ohter;
				}
   
				$("#print_product").html(product);

				if(myDataStore[index].is_pickup == "y") {
					$("#print_is_pickup").html("รับของเอง")
					$("#print_ship_address").html("-");
				}else{
					$("#print_is_pickup").html("ให้ไปส่ง")
					$("#print_ship_address").html(myDataStore[index].ship_address);
				}
				
				$("#print_qty_unit").html(myDataStore[index].qty + " " + myDataStore[index].unit);
				$("#print_car_license_no").html(myDataStore[index].car_license_no);
				$("#print_remark").html(myDataStore[index].remark);

		  } // .End function

    setInterval(function() {
        table.ajax.reload();
      }, 30000);

            function validForm(){
		 
					if($("#app_user_id option:selected").val() == "") {
						alert('Pls, select item');
						return;
					}// .End if
					
 
					if($("#assign_office_id option:selected").val() == "") {
						alert('Pls, select item');
						return;
					}// .End if
					

		postSave();
		 
	}// .End validForm

	function validSearchForm(){
		 
		 if($("#search_app_user_id option:selected").val() == "") {
			 alert('Pls, select item');
			 return;
		 }// .End if
		 

		 if($("#search_assign_office_id option:selected").val() == "") {
			 alert('Pls, select item');
			 return;
		 }// .End if
		 
		postSearch();

	}// .End validForm

	function getDataStore() {
		$.get('<?=site_url('admin/gets_assign_task_json');?>'
		,function(response){
			console.log(response.success);
			
			if(response.success){
				myDataStore = response.data;
			}else{
				alert('ไม่สามารถเรียกข้อมูลใหม่ได้');
			}
		},'json');
  }
  
   

    function getApp_userDataStore() {
        $.get('<?= site_url('admin/gets_app_user_json'); ?>',
            function(response) {
                if (response.success) {
                    myApp_userStore = response.data;
                    renderToOption(myApp_userStore, "app_user_id", "id", "name");
					renderToOption(myApp_userStore, "search_app_user_id", "id", "name");
                } else {
                    alert('ไม่สามารถเรียกข้อมูลใหม่ได้');
                }
            }, 'json');
    }
    getApp_userDataStore();
     

    function getAssign_officeDataStore() {
        $.get('<?= site_url('admin/gets_assign_office_json'); ?>',
            function(response) {
                if (response.success) {
                    myAssign_officeStore = response.data;
                    renderToOption(myAssign_officeStore, "assign_office_id", "id", "office_name");
					renderToOption(myAssign_officeStore, "search_assign_office_id", "id", "office_name");
                } else {
                    alert('ไม่สามารถเรียกข้อมูลใหม่ได้');
                }
            }, 'json');
    }
    getAssign_officeDataStore();
    

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
  
  function renderDatatable() {
        var tds = "";
        if(myDataStore.length > 0) {
            $("#tbody").html("");

            myDataStore.forEach(function (e,i) {
				tds += "<tr>";
				
					tds += "<td>" + e.id + "</td>";
					tds += "<td>" + e.app_user_id + "</td>";
					tds += "<td>" + e.assign_office_id + "</td>";
					tds += "<td>" + e.customer_name + "</td>";
					tds += "<td>" + e.khong_gravel + "</td>";
					tds += "<td>" + e.coarse_sand + "</td>";
					tds += "<td>" + e.fine_sand + "</td>";
					tds += "<td>" + e.mountain_rock + "</td>";
					tds += "<td>" + e.mool_sand + "</td>";
					tds += "<td>" + e.ohter + "</td>";
					tds += "<td>" + e.is_print + "</td>";
					tds += "<td>" + e.is_unuse + "</td>";
					tds += "<td>" + e.is_pickup + "</td>";
					tds += "<td>" + e.ship_address + "</td>";
					tds += "<td>" + e.qty + "</td>";
					tds += "<td>" + e.unit + "</td>";
					tds += "<td>" + e.car_license_no + "</td>";
					tds += "<td>" + e.remark + "</td>";
		
            tds += "<td>" + genButtonCommand(e.id) + "</td></tr>";
        }); 
            $("#tbody").append(tds); 
        }
        
        

    } //.End renderDatatable
  
    /**
     * Generate button Command for table view
     */
    function genButtonCommand(id){
      var html = "<div class=\"btn-group\">";
    html +="<button type=\"button\" class=\"btn btn-danger\">คำสั่ง</button>";
      
	html +="<button type=\"button\" class=\"btn btn-danger dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">";
	html +="<span class=\"sr-only\">Toggle Dropdown</span>";
	html +="</button>";

	html +="<div class=\"dropdown-menu\">";
	html +="<a class=\"dropdown-item\"  onclick=\"view(" + id + ")\"  href=\"#\">เรียกดู</a>";
	html +="<a class=\"dropdown-item\"  onclick=\"print(" + id + ")\"  href=\"#\">พิมพ์</a>";
        html +"<a class=\"dropdown-item\"  onclick=\"edit(" + id + ")\"  href=\"#\">แก้ไข</a>";
        html +"<div class=\"dropdown-divider\"></div>";
        html +"<a class=\"dropdown-item\" href=\"#\" onclick=\"confirmDel(" + id + ")\">ลบ</a>";
		html +"</div>";
      
		html +="</div>";

      return html;
    }

	function clearForm(){ 
    $("#id").val("");
			
			$("#app_user_id option")[0].selected = true;
			$("#assign_office_id option")[0].selected = true;$("#customer_name").val("");
			
			$("#khong_gravel").prop("checked",false);
			$("#coarse_sand").prop("checked",false);
			$("#fine_sand").prop("checked",false);
			$("#mountain_rock").prop("checked",false);
			$("#mool_sand").prop("checked",false);$("#ohter").val("");
			
			$("#is_print").prop("checked",false);
			$("#is_unuse").prop("checked",false);
			$("#is_pickup").prop("checked",false);$("#ship_address").val("");
			$("#qty").val("");
			$("#unit").val("");
			$("#car_license_no").val("");
			$("#remark").val("");
			
	}

	function edit(el){
    var index = el.getAttribute("data-index");

				$("#id").val(myDataStore[index].id);

					$("#app_user_id").val(myDataStore[index].app_user_id);
					$("#assign_office_id").val(myDataStore[index].assign_office_id);
				$("#customer_name").val(myDataStore[index].customer_name);

					$("#khong_gravel").prop("checked",(myDataStore[index].khong_gravel == "y") ? true : false);
					$("#coarse_sand").prop("checked",(myDataStore[index].coarse_sand == "y") ? true : false);
					$("#fine_sand").prop("checked",(myDataStore[index].fine_sand == "y") ? true : false);
					$("#mountain_rock").prop("checked",(myDataStore[index].mountain_rock == "y") ? true : false);
					$("#mool_sand").prop("checked",(myDataStore[index].mool_sand == "y") ? true : false);
				$("#ohter").val(myDataStore[index].ohter);

					$("#is_print").prop("checked",(myDataStore[index].is_print == "y") ? true : false);
					$("#is_unuse").prop("checked",(myDataStore[index].is_unuse == "y") ? true : false);
					$("#is_pickup").prop("checked",(myDataStore[index].is_pickup == "y") ? true : false);
				$("#ship_address").val(myDataStore[index].ship_address);

				$("#qty").val(myDataStore[index].qty);

				$("#unit").val(myDataStore[index].unit);

				$("#car_license_no").val(myDataStore[index].car_license_no);

				$("#remark").val(myDataStore[index].remark);
  
	} // .End edit
	
	
			
			/**
			  Change state to is lock or unlock.
			 */
			function update_khong_gravel(/** int */id,/** string */ v){
			  let cc = confirm("Are you want to change this item?");
			  if(cc){
				
				$.post('<?=site_url('admin/update_khong_gravel_json');?>',{'id':id,'khong_gravel':v}
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
			} //.end update_khong_gravel()
			//////////////////////////////////////
			
			
			/**
			  Change state to is lock or unlock.
			 */
			function update_coarse_sand(/** int */id,/** string */ v){
			  let cc = confirm("Are you want to change this item?");
			  if(cc){
				
				$.post('<?=site_url('admin/update_coarse_sand_json');?>',{'id':id,'coarse_sand':v}
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
			} //.end update_coarse_sand()
			//////////////////////////////////////
			
			
			/**
			  Change state to is lock or unlock.
			 */
			function update_fine_sand(/** int */id,/** string */ v){
			  let cc = confirm("Are you want to change this item?");
			  if(cc){
				
				$.post('<?=site_url('admin/update_fine_sand_json');?>',{'id':id,'fine_sand':v}
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
			} //.end update_fine_sand()
			//////////////////////////////////////
			
			
			/**
			  Change state to is lock or unlock.
			 */
			function update_mountain_rock(/** int */id,/** string */ v){
			  let cc = confirm("Are you want to change this item?");
			  if(cc){
				
				$.post('<?=site_url('admin/update_mountain_rock_json');?>',{'id':id,'mountain_rock':v}
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
			} //.end update_mountain_rock()
			//////////////////////////////////////
			
			
			/**
			  Change state to is lock or unlock.
			 */
			function update_mool_sand(/** int */id,/** string */ v){
			  let cc = confirm("Are you want to change this item?");
			  if(cc){
				
				$.post('<?=site_url('admin/update_mool_sand_json');?>',{'id':id,'mool_sand':v}
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
			} //.end update_mool_sand()
			//////////////////////////////////////
			
			
			/**
			  Change state to is lock or unlock.
			 */
			function update_is_print(/** int */id,/** string */ v){
			  let cc = confirm("Are you want to change this item?");
			  if(cc){
				
				$.post('<?=site_url('admin/update_is_print_json');?>',{'id':id,'is_print':v}
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
			} //.end update_is_print()
			//////////////////////////////////////
			
			
			/**
			  Change state to is lock or unlock.
			 */
			function update_is_unuse(/** int */id,/** string */ v){
			  let cc = confirm("Are you want to change this item?");
			  if(cc){
				
				$.post('<?=site_url('admin/update_is_unuse_json');?>',{'id':id,'is_unuse':v}
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
			} //.end update_is_unuse()
			//////////////////////////////////////
			
			
			/**
			  Change state to is lock or unlock.
			 */
			function update_is_pickup(/** int */id,/** string */ v){
			  let cc = confirm("Are you want to change this item?");
			  if(cc){
				
				$.post('<?=site_url('admin/update_is_pickup_json');?>',{'id':id,'is_pickup':v}
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
			} //.end update_is_pickup()
			//////////////////////////////////////
			 /**
			  Change state to is lock or unlock.
			 */
			function confirmDel(/** int */el){
        var id = el.getAttribute("data-id");
			  let cc = confirm("ต้องการลบข้อมูล?");
			  if(cc){
				
				$.post("<?=site_url("admin/delete_assign_task_json");?>",{"id":id}
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
			$.post( "<?=site_url("admin/update_assign_task_json");?>", { 
			
					"id": $("#id").val(),
					"app_user_id": $("#app_user_id option:selected").val(),
					"assign_office_id": $("#assign_office_id option:selected").val(),
					"customer_name": $("#customer_name").val(),
					"khong_gravel": ($("#khong_gravel:checked").prop("checked")) ? "y" : "n",
					"coarse_sand": ($("#coarse_sand:checked").prop("checked")) ? "y" : "n",
					"fine_sand": ($("#fine_sand:checked").prop("checked")) ? "y" : "n",
					"mountain_rock": ($("#mountain_rock:checked").prop("checked")) ? "y" : "n",
					"mool_sand": ($("#mool_sand:checked").prop("checked")) ? "y" : "n",
					"ohter": $("#ohter").val(),
					"is_print": ($("#is_print:checked").prop("checked")) ? "y" : "n",
					"is_unuse": ($("#is_unuse:checked").prop("checked")) ? "y" : "n",
					"is_pickup": ($("#is_pickup:checked").prop("checked")) ? "y" : "n",
					"ship_address": $("#ship_address").val(),
					"qty": $("#qty").val(),
					"unit": $("#unit").val(),
					"car_license_no": $("#car_license_no").val(),
					"remark": $("#remark").val(), }, 
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


		function postSearch(){
      		table.ajax.url('<?=site_url('admin/search_assign_task_dt_json');?>/?created_at='+ $("#search_created_at").val() + '&assign_office_id=' + $("#search_assign_office_id").val() +"&app_user_id=" + $("#search_app_user_id").val()).load();
   		}// .End postSearch

    </script>

</html>