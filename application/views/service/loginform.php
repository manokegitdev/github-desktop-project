<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?=$this->app_module;?> - <?=$this->app_name;?></title></title>
    <meta name="description" content="<?=$this->app_desc;?>">
    <link rel="stylesheet" href="<?=base_url();?>public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?=site_url();?>public/assets/fonts/fontawesome-all.min.css">

    
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-5 col-xl-5">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                    
                        <div class="row">
                        <div class="col-12">
                                <div class="p-5" style="background:#1C1C1C;">
                                    <div>
                                        <ul class="nav justify-content-center">
                                            <li class="nav-item">
                                                <a class="nav-link" style="color:white !important;" onclick="switchView(0);"  aria-current="page" href="#">LOGIN</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" style="color:white !important;" onclick="switchView(1);" href="#">SIGN UP</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr/>
                                    
                                    <form id="login-form" class="user" action="<?=site_url("service/authen");?>" method="post">
                                        <div class="text-center">
                                            <h4 class=" mb-4" style="color:#e4b711 !important;">LOGIN</h4>
                                        </div>
                                        <div class="form-group"><input class="form-control " type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username..." name="uname"></div>
                                        <div class="form-group"><input class="form-control " type="password" id="exampleInputPassword" placeholder="Password..." name="pword"></div>
                                        <div class="form-group">
                                            
                                        </div>
                                        <button class="btn btn-warning btn-block text-white" type="submit">LOGIN</button>                                        
                                    </form>

                                    <!-- register -->
                                    <form id="register-form"   action="<?=site_url("service/register");?>" method="post" role="form" style="display: none;">
                                        <div class="text-center">
                                            <h4 class=" mb-4" style="color:#e4b711 !important;">SIGN UP</h4>
                                        </div>
                                        <div class="form-group">
                                            <label style="color:white;">ชื่อ - สกุล</label>
                                            <input type="fullname" name="fullname" id="fullname" tabindex="1" class="form-control" placeholder="Fullname..." value="">
                                        </div>    
                                        <div class="form-group">
                                        <label style="color:white;">ชื่อผู้ใช้</label>
                                            <input type="text" name="username" id="username" tabindex="2" class="form-control" placeholder="Username..." value="">
                                        </div>
                                        
                                        <div class="form-group">
                                        <label style="color:white;">รหัสผ่าน</label>
                                            <input type="password" name="password" id="password" tabindex="3" class="form-control" placeholder="Password...">
                                        </div>
                                        <div class="form-group">
                                        <label style="color:white;">ยืนยันรหัสผ่าน</label>
                                            <input type="password" name="re_password" id="re_password" tabindex="4" class="form-control" placeholder="Confirm Password">
                                        </div>

                                        <div class="form-group">
                                        <label style="color:white;">เบอร์โทรศัพท์</label>
                                            <input type="text" name="mobile" id="mobile" tabindex="4" class="form-control" placeholder="Mobile...">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="otp" id="otp" tabindex="4" class="form-control" placeholder="กรอกรหัส OTP...">
                                            <input type="button" name="req_otp" id="req_otp"  class="form-control" value="รับ OTP">
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    
                                                    <button class="btn btn-warning btn-block text-white" >SIGN UP</button>
                                                </div>
                                            </div>
                                        </div>
								    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=base_url();?>public/assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>public/assets/js/chart.min.js"></script>
    <script src="<?=base_url();?>public/assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="<?=base_url();?>public/assets/js/theme.js"></script>


    <style>
        .bg-gradient-primary {
            background-color:#101010 !important;
            background-image:none !important;
        }
    </style>
</body>

<script type="text/javascript">

    function switchView(d) {
        if(d == 0) {
            $("#register-form").hide();
            $("#login-form").show();
        }if(d == 1) {
            $("#login-form").hide();
            $("#register-form").show();
        }
        
    }
    function validForm(){


        if($("#fullname").val() == "") {
            alert('โปรดระบุ ชื่อ สกุล');
            $("#fullname").focus();
            return false;
        } 

        if($("#username").val() == "") {
            alert('โปรดระบุชื่อผู้ใช้งาน');
            $("#username").focus();
            return false;
        } 

        if($("#password").val().length < 6) {
            alert('โปรดระบุรหัสผ่าน ไม่ควรน้อยกว่า 6 ตัวอักษร');
            $("#password").focus();
            return false;
        }

        if($("#password").val() != $("#re_password").val()) {
            alert('ยืนยันรหัสผ่านไม่ถูกต้อง');
            $("#password").focus();
            return false;
        }

        if($("#mobile").val() == "") {
            alert('โปรดระบุชื่อเรียกในระบบ');
            $("#mobile").focus();
            return false;
        } else {
            postSave();
        }

    }// .End validForm

        function postSave(){
			$.post( "<?=site_url("service/doregister");?>", { 
				"fullname": $("#fullname").val(),
				"username": $("#username").val(),
				"password": $("#password").val(),
                "mobile": $("#mobile").val()
            },
        function(response){
                console.log(response.success);
                if(response.success){
                    alert('คุณลงทะเบียนเรียบร้อยแล้ว ระบบจะนำเข้าสู่เมนูผู้ใช้งานทันที');
                    window.location = "<?=site_url("service/loginform")?>";
                }else{
                    alert(response.data.msg);
                }
            },
			"json" );		
		}// .End postSave
</script>

</html>