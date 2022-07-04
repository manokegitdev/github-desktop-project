<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>
	<?=$this->app_module;?> - <?=$this->app_name;?></title>
	<meta name="description" content="<?=$this->app_desc;?>">
	<link rel="stylesheet" href="<?=base_url();?>public/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="<?=base_url();?>public/assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
	<div id="wrapper">
		<?php $this->load->view('admin/nav'); ?>
		<div class="d-flex flex-column" id="content-wrapper">



			<div id="content">
				<?php $this->load->view('content_nav'); ?>

				<div class="container-fluid">

					<div class="card shadow">
						<div class="card-header py-3">
							<p class="text-primary m-0 font-weight-bold">Withdraw</p>
						</div>
						<div class="card-body">
							
							<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
								<button type="button" class="btn btn-primary" data-toggle="modal"
									data-target="#subject">เพิ่มใหม่</button>
								<br /><br />

								<table id="datatable" class="table table-striped table-sm">
									<thead>
									<tr> 
										<th>id</th><th>bank_id</th><th>account_number</th><th>account_name</th><th>amount_to_withdraw</th><th>updated_at</th><th></th>
                  					</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<!-- modal form --> 

    <div class="row">
      <div class="col">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#withdraw">
            + เพิ่มใหม่
        </button>
      </div>

      <div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="label_withdraw" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="label_withdraw">Form withdraw</h5>

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
      <label for="bank_id">bank_id</label>
	
      <select class="form-control" id="bank_id" name="bank_id">
	</select>
	
    </div>
	<div class="form-group">
			  <label for="account_number">account_number</label>
			  <input type="text" class="form-control" id="account_number" name="account_number" placeholder="" value="" >
			</div>

	<div class="form-group">
			  <label for="account_name">account_name</label>
			  <input type="text" class="form-control" id="account_name" name="account_name" placeholder="" value="" >
			</div>

	<div class="form-group">
			  <label for="amount_to_withdraw">amount_to_withdraw</label>
			  <input type="number" class="form-control" id="amount_to_withdraw" name="amount_to_withdraw" placeholder="" value="" >
			</div>
</form>
          <!-- input hmtl content end here -->
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
		</div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

</body>

<script src="<?=base_url();?>public/assets/js/jquery.min.js"></script>
	<script src="<?=base_url();?>public/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>public/assets/js/chart.min.js"></script>
	<script src="<?=base_url();?>public/assets/js/bs-init.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
	<script src="<?=base_url();?>public/assets/js/theme.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
</script>

<script src="<?=base_url();?>/public/js/app.js"></script>

<script type="text/javascript">
        var myDataStore = {} // default data store;
        
		    var table = {};
            $(document).ready(function() {
              getDataStore();
             table = $('#datatable').DataTable({
              buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
              ],
				      'paging': true,

                'ajax': {
                    'url':'<?=site_url('admin/gets_transaction_dt_json');?>'
                },
                'columns': [
                     { data: 'id' },
             { data: 'transaction_at' },
             { data: 'ref_no' },
             { data: 'transfer_in' },
             { data: 'fee' },
             { data: 'net_balance' },
             { data: 'status' },
             { data: 'created_at' },
             { data: 'created_by' },
             { data: 'updated_at' },
             { data: 'updated_by' },
          
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
		$.get('<?=site_url('admin/gets_transaction_json');?>'
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
    } // .End if
  } //.End renderToOption

  function renderDatatable() {
    var tds = "";
    if(myDataStore.length > 0) {
        $("#tbody").html("");

        myDataStore.forEach(function (e,i) {
    tds += "<tr>";
    
      tds += "<td>" + e.id + "</td>";
      tds += "<td>" + e.transaction_at + "</td>";
      tds += "<td>" + e.ref_no + "</td>";
      tds += "<td>" + e.transfer_in + "</td>";
      tds += "<td>" + e.fee + "</td>";
      tds += "<td>" + e.net_balance + "</td>";
      tds += "<td>" + e.status + "</td>";

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
			$("#transaction_at").val("");
			$("#ref_no").val("");
			$("#transfer_in").val("");
			$("#fee").val("");
			$("#net_balance").val("");
			$("#status").val("");
			
	}

	function edit(el){
    var index = el.getAttribute("data-index");

				$("#id").val(myDataStore[index].id);

				$("#transaction_at").val(myDataStore[index].transaction_at);

				$("#ref_no").val(myDataStore[index].ref_no);

				$("#transfer_in").val(myDataStore[index].transfer_in);

				$("#fee").val(myDataStore[index].fee);

				$("#net_balance").val(myDataStore[index].net_balance);

				$("#status").val(myDataStore[index].status);

	} // .End edit

	 /**
			  Change state to is lock or unlock.
			 */
			function confirmDel(/** int */el){
        var id = el.getAttribute("data-id");
			  let cc = confirm("ต้องการลบข้อมูล?");
			  if(cc){
          $.post("<?=site_url("admin/delete_transaction_json");?>",{"id":id}
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
			$.post( "<?=site_url("admin/update_transaction_json");?>", {
			
					"id": $("#id").val(),
					"transaction_at": $("#transaction_at").val(),
					"ref_no": $("#ref_no").val(),
					"transfer_in": $("#transfer_in").val(),
					"fee": $("#fee").val(),
					"net_balance": $("#net_balance").val(),
					"status": $("#status").val(), },
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
      table.ajax.url('<?=site_url('member/search_transaction_dt_json');?>/?title='+ $("#title").val() + '&management_level=' + $("#management_level").val() +"&department=" + $("#department").val() + '&office='+ $("#office").val() + '&company_name='+ $("#company_name").val()).load();
   }// .End postSearch

          </script>

</html>
