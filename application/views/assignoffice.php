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
                        <p class="text-primary m-0 font-weight-bold">รายการตั้งค่าสำนักงาน</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div>
                        </div>
                        <div 
                        class="table-responsive table mt-2" 
                        id="dataTable"
                        role="grid"
                        aria-describedby="dataTable_info">

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assign_office" >เพิ่มใหม่</button>
                            <br/><br/>

                            <table id="datatable" class="table table-striped table-sm"> 
                <thead>
                <tr> <th>ID</th><th>สำนักงาน</th><th>รหัสนำหน้า</th><th>เลขรันบิล</th><th></th>
                  </tr>
                  </thead>
                  <tbody> 

    </tbody>
</table>

                        </div>
                        

<!-- modal form --> <div class="row">
<div class="col">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assign_office">
                + เพิ่มใหม่
            </button>
        </div>
		
		<div class="modal fade" id="assign_office" tabindex="-1" role="dialog" aria-labelledby="label_assign_office" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="label_assign_office">Form assign_office</h5>
				
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

	<div class="form-group">
			  <label for="office_name">สำนักงาน</label>
			  <input type="text" class="form-control" id="office_name" name="office_name" placeholder="" value="" >
			</div>

	<div class="form-group">
			  <label for="prefix">รหัสนำหน้า</label>
			  <input type="text" class="form-control" id="prefix" name="prefix" placeholder="" value="" >
			</div>

	<div class="form-group">
			  <label for="no_running">เลขรันบิล</label>
			  <input type="text" class="form-control" id="no_running" name="no_running" placeholder="" value="" >
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
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © VProperty Co,.LTD Management 2020</span></div>
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
        var myDataStore = {};
        
		    var table = {};
            $(document).ready(function() {
              getDataStore();
             table = $('#datatable').DataTable({
				  'paging': true,
                
                'ajax': {
                    'url':'<?=site_url('admin/gets_assign_office_dt_json');?>'
                },
                'columns': [   { data: 'id' }, 
             { data: 'office_name' }, 
             { data: 'prefix' }, 
             { data: 'no_running' }, 
          
        { data: 'action' },
                ]
            });
          });

    setInterval(function() {
        table.ajax.reload();
      }, 30000);

            function validForm(){
		
		postSave();
		 
	}// .End validForm

	function getDataStore() {
		$.get('<?=site_url('admin/gets_assign_office_json');?>'
				,function(response){
					console.log(response.success);
				  if(response.success){
            myDataStore = response.data;
			
				  }else{
					  alert('ไม่สามารถเรียกข้อมูลใหม่ได้');
				  }
				},'json');
  }
  
  

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
					tds += "<td>" + e.office_name + "</td>";
					tds += "<td>" + e.prefix + "</td>";
					tds += "<td>" + e.no_running + "</td>";
		
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
			$("#office_name").val("");
			$("#prefix").val("");
			$("#no_running").val("");
			
	}

	function edit(el){
    var index = el.getAttribute("data-index");

				$("#id").val(myDataStore[index].id);

				$("#office_name").val(myDataStore[index].office_name);

				$("#prefix").val(myDataStore[index].prefix);

				$("#no_running").val(myDataStore[index].no_running);
  
	} // .End edit
	
	 /**
			  Change state to is lock or unlock.
			 */
			function confirmDel(/** int */el){
        var id = el.getAttribute("data-id");
			  let cc = confirm("ต้องการลบข้อมูล?");
			  if(cc){
				
				$.post("<?=site_url("admin/delete_assign_office_json");?>",{"id":id}
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
			$.post( "<?=site_url("admin/update_assign_office_json");?>", { 
			
					"id": $("#id").val(),
					"office_name": $("#office_name").val(),
					"prefix": $("#prefix").val(),
					"no_running": $("#no_running").val(), }, 
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