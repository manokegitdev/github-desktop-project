<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?=$this->app_module;?> - <?=$this->app_name;?></title>
    <meta name="description" content="<?=$this->app_desc;?>">
    <link rel="stylesheet" href="<?=base_url();?>public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?=base_url();?>public/assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        
        <?php 
        // load left menu
         $this->load->view('admin/nav'); ?>
        
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            
            <?php 
            // load menu content
            $this->load->view('content_nav'); ?>

            <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-0">Dashboard</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report</a></div>
                <div class="row">
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Deposit</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>$40,000</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Fee</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>$215,000</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Avariable B/L</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span>115.46</span></div>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                            <!-- <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="sr-only">50%</span></div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Withdraw /Top-up</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>-3.28</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow border-left-success py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Payout B/L</span></div>
                                        <div class="text-dark font-weight-bold h5 mb-0"><span>$2,000</span></div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow border-left-info py-2">
                            <div class="card-body">
                                <div class="row align-items-center no-gutters">
                                    <div class="col mr-2">
                                        <div class="text-uppercase text-info font-weight-bold text-xs mb-1"><span>Current B/L</span></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span>100,015.46</span></div>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                                            <!-- <div class="col">
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar bg-info" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"><span class="sr-only">50%</span></div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>

                <div class="row">
                     
                    <div class="col-lg-12 col-xl-12">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Transaction</p>
                            </div>
                            <div class="card-body">
                                
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    
                                    <br /><br />

                                    <table id="datatable" class="table table-striped table-sm">
                                        <thead>
                                        <tr> 
                                            <th>id</th><th>transaction_at</th><th>ref_no</th><th>transfer_in</th><th>fee</th><th>net_balance</th><th>status</th><th>updated_at</th><th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                    
            </div>

            
        </div>
    </div>
    <footer class="bg-white sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>Copyright © 2020</span></div>
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
</body>

</html>