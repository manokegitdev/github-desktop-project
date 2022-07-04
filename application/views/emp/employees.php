<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> <?=$this->app_module;?> - <?=$this->app_name;?></title>
    
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
                <h3 class="text-dark mb-4">งานจัดการข้อมูลพนักงาน</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">พนักงาน</p>
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

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employee" >เพิ่มใหม่</button>
                            <br/><br/>

                        <table id="datatable" class="table table-striped table-sm"> 
                <thead>
                  <tr> 
                  <th>No.</th>
                      <th>ชื่อ</th>
                      <th>สกุล</th>
                      <th>ตำแหน่ง</th>
                      <th>% ค่าคอม</th>
                      <th>วันที่บันทึกข้อมูล</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody id="tbody">
                        
                        <!-- <?php
                  $i=0;
                    if(count($items)>0){
                  foreach($items as $item){
                    echo "<tr>";
                    echo "<td>{$item->id}</td>" ;
                    echo "<td>{$item->name}</td>" ;
                    echo "<td>{$item->surname}</td>" ;
                    
                    echo "<td>{$item->comm_percent}</td>";
                    echo "<td>{$item->updated_at}</td>" ;
                    echo "<td><a href=\"#\" onclick=\"popForm($i)\" style=\"btn btn-primary\">EDIT</a></td>";  echo "</tr>";
                    $i++;
					
                  } //.end foreach
                } 
                ?> -->
					
	
                </tbody>
                </table>

               <!-- modal form --> <div class="row">
    
		
		<div class="modal fade" id="employee" tabindex="-1" role="dialog" aria-labelledby="label_employee" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="label_employee">Form employee</h5>
				
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
		  <label for="name">ชื่อ</label>
		  <input type="text" class="form-control" id="name" name="name" placeholder="" value="">
		</div>

	<div class="form-group">
		  <label for="surname">สกุล</label>
		  <input type="text" class="form-control" id="surname" name="surname" placeholder="" value="">
		</div>

	<div class="form-group">
		  <label for="position">ตำแหน่ง</label>
		  <input type="number" class="form-control" id="position" name="position" placeholder="" value="">
		</div>

	<div class="form-group">
		  <label for="comm_percent">ค่าคอม%</label>
		  <input type="text" class="form-control" id="comm_percent" name="comm_percent" placeholder="" value="">
		</div>

	<div class="form-check form-check-inline">      
      <input  type="checkbox" class="form-check-input" id="is_unuse" name="is_unuse" placeholder=""  value="" >
      <label  class="form-check-label" for="is_unuse">ระงับใช้งาน</label>
    </div>
</form>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" onclick="clearForm();"  data-dismiss="modal">ปิด</button>
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

        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © VProperty Co,.LTD Management 2020</span></div>
            </div>
        </footer>

    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="<?=base_url();?>public/assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>public/assets/js/chart.min.js"></script>
    <script src="<?=base_url();?>public/assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="<?=base_url();?>public/assets/js/theme.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript">
        var myDataStore = {};
            $(document).ready(function() {
              getDataStore();
              $('#datatable').DataTable();
            });

            function validForm(){
		 
					if($("#name").val() == "") {
            alert('Pls, Entry Name');
            $("name").focus();
						return;
          }// .End if
          
          if($("#surname").val() == "") {
            alert('Pls, Entry Surname');
            $("surname").focus();
						return;
					}// .End if
					

		postSave();
		 
	}// .End validForm

	function getDataStore() {
		$.get('<?=site_url('admin/gets_employee_json');?>'
				,function(response){
          console.log(response.success);
				  if(response.success){
            myDataStore = response.data;
            renderDatatable();
            
            
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
				
              tds += "<tr><td>" + e.id + "</td>";
              tds += "<td>" + e.name + "</td>";
              tds += "<td>" + e.surname + "</td>";
              tds += "<td>" + e.position + "</td>";
              tds += "<td>" + e.comm_percent + "</td>";
              tds += "<td>" + e.is_unuse + "</td>";
              
              tds += "<td><button  href=\"#\" onclick=\"confirmDel(" + e.id + ")\" style=\"btn btn-primary\">[ลบ</button></td>";
            tds += "<td><button data-toggle=\"modal\" data-target=\"#employee\" href=\"#\" onclick=\"edit(" + i + ")\" style=\"btn btn-primary\">[แก้ไข]</button></td></tr>";
            }); 
            $("#tbody").append(tds); 
        }
    }

    /**
			  Change state to is lock or unlock.
			 */
			function confirmDel(/** int */id){
			  let cc = confirm("ต้องการลบข้อมูล?");
			  if(cc){
				
				$.post("<?=site_url("admin/delete_employee_json");?>",{"id":id}
				,function(response){
				  if(response.success){
            getDataStore();
            alert('ทำรายการเรียบร้อย');
				  }else{
					  alert('ไม่สามารถปรับปรุงรายการได้');
				  }
				},'json');

			  } // .End if
			} //.end confirmDel()

	function edit(index){

    $("#id").val(myDataStore[index].id);
    $("#name").val(myDataStore[index].name);
    $("#surname").val(myDataStore[index].surname);
    $("#position").val(myDataStore[index].position);
    $("#comm_percent").val(myDataStore[index].comm_percent);
    $("#is_unuse").val(myDataStore[index].is_unuse);
  } // .End edit
  
  function clearForm(){
    $("#id").val("");
    $("#name").val("");
    $("#surname").val("");
    $("#position").val("");
    $("#comm_percent").val("");
    $("#is_unuse").val("");
  }
	
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
        } else {
        alert('ทำรายการไม่สำเร็จ');
        }
      },'json');

      } // .End if
    } //.end update_is_unuse()
    //////////////////////////////////////
			
		function postSave(){
      $.post( "<?=site_url("admin/update_employee_json");?>", 
      { 
					"id": $("#id").val(),
					"name": $("#name").val(),
					"surname": $("#surname").val(),
					"position": $("#position").val(),
					"comm_percent": $("#comm_percent").val(),
          "is_unuse": $("#is_unuse").val()
        }, 
				function(response){
          console.log(response);
					if(response.msg = "success"){
            getDataStore();
            alert('ทำรายการเรียบร้อย');
					}else{
						alert('เกิดข้อผิดพลาด ทำรายการไม่สำเร็จ');
					}
				},
      "json" );		
		}// .End postSave

          </script>
          <script src="<?=base_url();?>/public/js/app.js" ></script>
</body>
</html>