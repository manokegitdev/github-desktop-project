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

<body  style="background:#1C1C1C;">
    <div class="container">
    <br/><br/><br/><br/>
    <br/><br/>
        <div class="row justify-content-center">
            <div class="col-12" style="background:#1C1C1C;">
                <div class="card shadow-lg o-hidden border-0 my-5; border-radius:30px; padding:20px;">
                    <div class="card-body p-0" style="background:#20201D;">


                        <div class="row"  style="background:#20201D; ">
                            <div class="col-3">
                            </div>
                            <div class="col-6"  >
                                
                                <?php $this->load->view('service/_card'); ?>
                            </div>
                            
                            <div class="col-3">
                            </div>
                        </div>
                        <div style="height:600px; margin-top:0px; border:solid 3px gold; background:#20201D; border-radius:20px; ">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8" >
                                    <div  style="background:#20201D; margin-top:40px;">
                                        <?php $this->load->view('service/_menupanel'); ?>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                            <div style="margin:30px;" ></div>
                            <div class="row">
                            <div class="col-2"></div>
                                <div class="col-8">
                                    <?php
                                    $this->load->view('service/_carousel');
                                    ?>
                                </div>
                                <div class="col-2"></div>
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
    
</script>

</html>