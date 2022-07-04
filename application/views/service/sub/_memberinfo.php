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
            <img  style="width:42px; height:42px;" src="<?=base_url();?>/public/img/ic_member_info.png"></img> <span style="font-size: 30px; color: gold;">ข้อมูลส่วนตัว</span>

                <div style="margin-top:20px;"><img class="img_profile" src="<?=base_url();?>/public/img/avatar.png"></img></div>
                <button class="browse_button" style="margin-top:20px;" onclick="importData()">+ Browse</button>
            </div>
        </div>

        
  
        <div class="" 
style=" width: 400px;  margin-top: 40px; margin-bottom:40px; margin-left: auto !important; margin-right:auto !important;">
     
        <div class="row" >
            <div class="col-6">
                <img  style="width:22px; height:22px;" src="<?=base_url();?>/public/img/ic_mini_user.png"></img> 
                <span style="font-size: 20px; color: white;">คุณ :</span>
            </div>
            <div class="col-6"><?=$_SESSION['fullname'];?></div>
        </div>

        <div class="row">
            <div class="col-6">
                <img  style="width:22px; height:22px;" src="<?=base_url();?>/public/img/ic_mini_user_circle.png"></img> <span style="font-size: 20px; color: white;">ยูสเซอร์ :</span>
            </div>
            <div class="col-6"><?=$_SESSION['username'];?></div>
        </div>

        <div class="row">
            <div class="col-6">
                <img  style="width:22px; height:22px;" src="<?=base_url();?>/public/img/ic_mini_lock.png"></img> <span style="font-size: 20px; color: white;">รหัสผ่าน :</span>
            </div>
            <div class="col-6"><a href="<?=site_url("service/index/changepassword");?>">*******</a></div>
        </div>

        <div class="row">
            <div class="col-6">
                <img  style="width:22px; height:22px;" src="<?=base_url();?>/public/img/ic_mini_capital.png"></img> <span style="font-size: 20px; color: white;">ธนาคารของคุณ :</span>
            </div>
            <div class="col-6"><img  style="width:22px; height:22px;" src="<?=base_url();?>/public/img/ic_kbank.png"></img>  กสิกรไทย</div>
        </div>


        <div class="row">
            <div class="col-6">
                <img  style="width:22px; height:22px;" src="<?=base_url();?>/public/img/ic_mini_capital.png"></img> <span style="font-size: 20px; color: white;">แพ็คเก็จของคุณ :</span>
            </div>
            <div class="col-6"> -</div>
        </div>

        <div class="row">
            <div class="col-6">
                <img  style="width:22px; height:22px;" src="<?=base_url();?>/public/img/ic_mini_team.png"></img> <span style="font-size: 20px; color: white;">แพ็คเก็จของคุณ :</span>
            </div>
            <div class="col-6"> 111.00 บาท</div>
        </div>

        <div class="row">
            <div class="col-6">
                <img  style="width:22px; height:22px;" src="<?=base_url();?>/public/img/ic_mini_money_bag.png"></img> <span style="font-size: 20px; color: white;">ยอดคอมมิชชั่น :</span>
            </div>
            <div class="col-6"> 99.00 บาท</div>
        </div>
    
  
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