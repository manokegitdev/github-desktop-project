<style>
    .title_background {
  background-image: linear-gradient(180deg, #1f1f1f, #2d2d2d) !important;
  padding: .05em !important;
  font-size: 16px !important;
}

.browse_button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 5px 32px;
  border-radius: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
.img_profile {
    border-radius: 15px;
    width:120px;
    height: 140px;
}

</style>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb title_background">
                <li class="breadcrumb-item"><a class="nav-link" style="color:white !important;" href="<?=site_url("service/index/menupanel");?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    < กลับหน้าหลัก <span class="sr-only"></span>
                    </a></li>
                
            </ol>
        </nav>
    </div>
  
</div>

<div class="row" >
    <div class="col-12">
        <div class="row ">
            <div class="col-12 text-center"> 
            <img  style="width:42px; height:42px;" src="<?=base_url();?>/public/img/ic_member_info.png"></img> <span style="font-size: 30px; color: gold;">เปลี่ยนรหัสผ่าน</span>

                
            </div>
        </div>

        
  
        <div class="" 
style=" width: 400px;  margin-top: 40px; margin-bottom:40px; margin-left: auto !important; margin-right:auto !important;">
     
<form id="register-form"   action="<?=site_url("service/changepassword");?>" method="post" role="form" >
                                        
                                         

                                        <div class="form-group">
                                        <label style="color:white;">รหัสผ่านเดิม</label>
                                            <input type="password" name="password" id="password" tabindex="3" class="form-control" placeholder="Password...">
                                        </div>

                                        <div class="form-group">
                                        <label style="color:white;">รหัสผ่านใหม่</label>
                                            <input type="password" name="password" id="password" tabindex="3" class="form-control" placeholder="Password...">
                                        </div>
                                        <div class="form-group">
                                        <label style="color:white;">ยืนยันรหัสผ่านใหม่</label>
                                            <input type="password" name="re_password" id="re_password" tabindex="4" class="form-control" placeholder="Confirm Password">
                                        </div>
 

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-12  text-center" >
                                                    
                                                    <button class="btn btn-warning btn-block text-white" style="width:200px; margin-left:auto; margin-right:auto;">ยืนยัน</button>
                                                </div>
                                            </div>
                                        </div>
								    </form>

       
    
  
</div>

</div>




<script type="text/javascript">
    function importData() {
        let input = document.createElement('input');
        input.type = 'file';
        input.onchange = _ => {
            // you can use this method to get file and perform respective operations
            let files =   Array.from(input.files);
            console.log(files);
        };
        input.click();
  
    }
</script>