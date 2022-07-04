<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ซื้อบ้านใหม่ บ้านมือสอง คอนโดฯ ทำเลเยี่ยม</title></title>
    <meta name="description" content="รวมประกาศ ขาย ให้เช่า รีวิว คอนโด บ้าน ที่ดิน กรุงเทพและทั่วประเทศ มีหลายโครงการ รายละเอียดครบ ค้นหาง่าย อัพเดททุกวัน ลงประกาศฟรี คนดูเยอะ ปิดการขายง่าย">
    <link rel="stylesheet" href="<?=base_url();?>public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?=site_url();?>public/assets/fonts/fontawesome-all.min.css">
</head>

<body class="" style="background-color:#f4f4f4;">
    <div class="container" style="background-color:white;">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">

            <?php foreach($items as $k => $v) { 
                
                ?>
                <img src="<?=base_url();?>uploads/salepage/<?=$v->pic_file;?>" alter="" style="width:100%; margin-top:10px;" />
            <?php } ?>


                <div style="margin-top:20px;">
                    <iframe width="100%" height="415" src="https://www.youtube.com/embed/rT-XBeoubAY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div style="margin-top:20px;">
                    <form class="user" action="<?=site_url("home/submittsalepage/".$v->id);?>" method="post">
                        <div class="form-group">
                            <input class="form-control form-control" type="text" id="fname"  placeholder="ชื่อผู้ติดต่อ..." name="fname">
                        </div>
                        
                        <div class="form-group">
                            <input class="form-control form-control" type="text" id="email" placeholder="E-Mail..." name="email">
                        </div>

                        <div class="form-group">
                            <input class="form-control form-control" type="text" id="mobile" placeholder="หมายเลขติดต่อกลับ..." name="mobile">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control form-control"  id="detail" placeholder="ระบุรายละเอียด..." name="detail"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block text-white btn" type="submit">สอบถามเพิ่มเติม</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <script src="<?=base_url();?>public/assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>public/assets/js/chart.min.js"></script>
    <script src="<?=base_url();?>public/assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    
</body>

</html>