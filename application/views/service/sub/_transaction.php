<style>
    .title_background {
  background-image: linear-gradient(180deg, #1f1f1f, #2d2d2d) !important;
  padding: .05em !important;
  font-size: 16px !important;
}

.tab_selected_background {
  background-image: linear-gradient(180deg, #B3761A, #EFCB81) !important;
  padding: .05em !important;
  font-size: 16px !important;
}

.tab_background {
  background-image: linear-gradient(180deg, #000000, #000000) !important;
  padding: .05em !important;
  font-size: 16px !important;
  border:#B3761A solid 2px;;
}

.green_badge {
  /* background-color: #6D2122; Green */
  background-color: green; 
  border: none;
  color: white;
  padding: 5px 5px;
  width:100px;
  border-radius: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:auto;
  margin-right:auto;
}
.orange_badge {
  
  background-color: orange; 
  border: none;
  color: white;
  padding: 5px 5px;
  width:100px;
  border-radius: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:auto;
  margin-right:auto;
}
.red_badge {
  /* background-color: #6D2122; Green */
  background-color: red; 
  border: none;
  color: white;
  padding: 5px 5px;
  width:100px;
  border-radius: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:auto;
  margin-right:auto;
}

.common_button {
  /* background-color: #6D2122; Green */
  background-image: linear-gradient(180deg, #6D2122, #915050) !important;
  border: none;
  color: white;
  padding: 5px 5px;
  width:100px;
  border-radius: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:auto;
  margin-right:auto;
}


.crown_button {
  /* background-color: #4CAF50; Green */
  background-image: linear-gradient(180deg, #6A6869, #C4C2C1) !important;
  border: none;
  color: white;padding: 5px 5px;
  width:100px;
  border-radius: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:auto;
  margin-right:auto;
}


.rare_button {
  
  background-image: linear-gradient(180deg, #8C4607, #F2BA68) !important;
  border: none;
  color: white;padding: 5px 5px;
  width:100px;
  border-radius: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:auto;
  margin-right:auto;
}


.legendary_button {
    background-image: linear-gradient(180deg, #3E174D, #804A96) !important;
  border: none;
  color: white;padding: 5px 5px;
  width:100px;
  border-radius: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:auto;
  margin-right:auto;
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
        <div class="row text-center">
            <div class="col-2"></div>
            <div class="col-8 text-center"> 
                <img  style="width:42px; height:42px;" src="<?=base_url();?>/public/img/ic_package.png"></img> 
                <span style="font-size: 30px; color: gold;">ประวัติ</span>

                <div style="margin-top:30px;">
                    <ul class="nav justify-content-center">
                        <li id="tab_panel_0" class="nav-item green_badge"  onclick="switchView(0);" style="width:200px;">
                            <img  style="width:22px; height:22px;" src="<?=base_url();?>/public/img/ic_mini_box.png"></img> 
                            <a class="nav-link" style="color:white !important;"  aria-current="page" href="#">+ ประวัติฝาก</a>
                        </li>

                        <li id="tab_panel_1" class="nav-item red_badge" onclick="switchView(1);" style="width:200px;">
                            <img  style="width:22px; height:22px;" src="<?=base_url();?>/public/img/ic_mini_box.png"></img> 
                            <a class="nav-link" style="color:white !important;"  href="#">- ประวัติถอน</a>
                        </li>
                    </ul>
                </div>
                <div style="margin-top:40px;">
                    <span>ข้อมูลการ</span> <span id="text_function" style="color:green;">ฝากเงิน</span>
                </div>

            </div>
            <div class="col-2"></div>
        </div>

        
  
        <div id="panel_0" 
        style=" overflow:auto; width: 600px; height:600px;  margin-top: 40px; margin-bottom:40px; margin-left: auto !important; margin-right:auto !important;">
     
            <div class="row" >
                <div class="col-12  text-center">
                    <div class="card shadow-sm p-3 mb-5 " style="background-color:#00ff0022 !important; border:#545253 solid 1px !important;">
                        <div class="row" >
                            <div class="col-2" >
                                <img  style="width:100px; height:100px;" src="<?=base_url();?>/public/img/ic_kbank.png"></img> 
                            </div>
                                <div class="col-6" >
                                <span style="text-size:26px; color:white;">ธนาคารกสิกรไทย</span><br/>
                                <span style="text-size:18px; color:white;">xxx-xxx-xxxx</span>
                            </div>

                            <div class="col-4  text-middle" >
                            <span class="orange_badge" style="ิtext-size:18px; color:white;">รอดำเนินการ </span><br/><span style="color:green; font-size:24px;" >+ 20,000 บาท</span><br/><span style="color:white; font-size:14px;" >6 DAY 10:05:12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" >
                <div class="col-12  text-center">
                    <div class="card shadow-sm p-3 mb-5 " style="background-color:#00ff0022 !important; border:#545253 solid 1px !important;">
                        <div class="row" >
                            <div class="col-2" >
                                <img  style="width:100px; height:100px;" src="<?=base_url();?>/public/img/ic_kbank.png"></img> 
                            </div>
                                <div class="col-6" >
                                <span style="text-size:26px; color:white;">ธนาคารกสิกรไทย</span><br/>
                                <span style="text-size:18px; color:white;">xxx-xxx-xxxx</span>
                            </div>

                            <div class="col-4  text-middle" >
                            <span class="green_badge" style="ิtext-size:18px; color:white;">สำเร็จ </span><br/><span style="color:green; font-size:24px;" >+ 20,000 บาท</span><br/><span style="color:white; font-size:14px;" >6 DAY 10:05:12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="row" >
                <div class="col-12  text-center">
                    <div class="card shadow-sm p-3 mb-5 " style="background-color:#00ff0022 !important; border:#545253 solid 1px !important;">
                        <div class="row" >
                            <div class="col-2" >
                                <img  style="width:100px; height:100px;" src="<?=base_url();?>/public/img/ic_kbank.png"></img> 
                            </div>
                                <div class="col-6" >
                                <span style="text-size:26px; color:white;">ธนาคารกสิกรไทย</span><br/>
                                <span style="text-size:18px; color:white;">xxx-xxx-xxxx</span>
                            </div>

                            <div class="col-4  text-middle" >
                            <span class="red_badge" style="ิtext-size:18px; color:white;">ไม่สำเร็จ </span><br/><span style="color:green; font-size:24px;" >+ 20,000 บาท</span><br/><span style="color:white; font-size:14px;" >6 DAY 10:05:12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row" >
                <div class="col-12  text-center">
                    <div class="card shadow-sm p-3 mb-5 " style="background-color:#00ff0022 !important; border:#545253 solid 1px !important;">
                        <div class="row" >
                            <div class="col-2" >
                                <img  style="width:100px; height:100px;" src="<?=base_url();?>/public/img/ic_kbank.png"></img> 
                            </div>
                                <div class="col-6" >
                                <span style="text-size:26px; color:white;">ธนาคารกสิกรไทย</span><br/>
                                <span style="text-size:18px; color:white;">xxx-xxx-xxxx</span>
                            </div>

                            <div class="col-4  text-middle" >
                            <span class="red_badge" style="ิtext-size:18px; color:white;">ไม่สำเร็จ </span><br/><span style="color:green; font-size:24px;" >+ 20,000 บาท</span><br/><span style="color:white; font-size:14px;" >6 DAY 10:05:12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row" >
                <div class="col-12  text-center">
                    <div class="card shadow-sm p-3 mb-5 " style="background-color:#00ff0022 !important; border:#545253 solid 1px !important;">
                        <div class="row" >
                            <div class="col-2" >
                                <img  style="width:100px; height:100px;" src="<?=base_url();?>/public/img/ic_kbank.png"></img> 
                            </div>
                                <div class="col-6" >
                                <span style="text-size:26px; color:white;">ธนาคารกสิกรไทย</span><br/>
                                <span style="text-size:18px; color:white;">xxx-xxx-xxxx</span>
                            </div>

                            <div class="col-4  text-middle" >
                            <span class="red_badge" style="ิtext-size:18px; color:white;">ไม่สำเร็จ </span><br/><span style="color:green; font-size:24px;" >+ 20,000 บาท</span><br/><span style="color:white; font-size:14px;" >6 DAY 10:05:12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div id="panel_1" class="" 
        style=" width: 600px;  margin-top: 40px; margin-bottom:40px; margin-left: auto !important; margin-right:auto !important;">
       




            <div class="row" >
                <div class="col-12  text-center">
                    <div class="card shadow-sm p-3 mb-5 " style="background-color:#ff000022 !important; border:#545253 solid 1px !important;">
                        <div class="row" >
                            <div class="col-2" >
                                <img  style="width:100px; height:100px;" src="<?=base_url();?>/public/img/ic_kbank.png"></img> 
                            </div>
                                <div class="col-6" >
                                <span style="text-size:26px; color:white;">ธนาคารกสิกรไทย</span><br/>
                                <span style="text-size:18px; color:white;">xxx-xxx-xxxx</span>
                            </div>

                            <div class="col-4  text-middle" >
                            <span class="orange_badge" style="ิtext-size:18px; color:white;">รอดำเนินการ </span><br/><span style="color:red; font-size:24px;" >+ 20,000 บาท</span><br/><span style="color:white; font-size:14px;" >6 DAY 10:05:12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" >
                <div class="col-12  text-center">
                    <div class="card shadow-sm p-3 mb-5 " style="background-color:#ff000022 !important; border:#545253 solid 1px !important;">
                        <div class="row" >
                            <div class="col-2" >
                                <img  style="width:100px; height:100px;" src="<?=base_url();?>/public/img/ic_kbank.png"></img> 
                            </div>
                                <div class="col-6" >
                                <span style="text-size:26px; color:white;">ธนาคารกสิกรไทย</span><br/>
                                <span style="text-size:18px; color:white;">xxx-xxx-xxxx</span>
                            </div>

                            <div class="col-4  text-middle" >
                            <span class="green_badge" style="ิtext-size:18px; color:white;">สำเร็จ </span><br/><span style="color:red; font-size:24px;" >+ 20,000 บาท</span><br/><span style="color:white; font-size:14px;" >6 DAY 10:05:12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>  

</div>




<script type="text/javascript">
    



    function switchView(d) {
        
        if(d == 0) {
            $("#text_function").text("ฝากเงิน");
            $("#panel_0").show();
            $("#panel_1").hide();
            
        }if(d == 1) {
            $("#text_function").text("ถอนเงิน");
            $("#panel_0").hide();
            $("#panel_1").show();
        }
        
    }

    switchView(0);
</script>