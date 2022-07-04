<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $this->app_module; ?> - <?= $this->app_name; ?></title>
    </title>
    <meta name="description" content="<?= $this->app_desc; ?>">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?= site_url(); ?>public/assets/fonts/fontawesome-all.min.css">

    <link rel="stylesheet" href="<?= base_url('public/assets/css/deposit_style.css'); ?>" />
</head>

<body class="">

    <section class="section-qr-code">
        <div class="qrcode-content">
            <div class="section-title">
                <h1>ZAHA (QR CODE)</h1>
                <hr class="hr-top">
            </div>


            <div class="grid-qr-code">
                <article>
                    <div class="qr-code-text">
                        <h3>CENT ACCOUNT</h3>
                        <div class="detail-box">
                            <div class="debox-l">Trading No#</div>
                            <div class="debox-r">27016884</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Platform</div>
                            <div class="debox-r">MT4</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Type</div>
                            <div class="debox-r">CENT</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Server</div>
                            <div class="debox-r">MT001</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Leverage</div>
                            <div class="debox-r">1:800</div>
                        </div>

                        <div class="qr-code-form">
                            <p>** Put amount in THB **</p>
                            <form id="form--cent" action="<?= site_url("service/authen"); ?>" method="post">
                                <div class="qrcode-input">
                                    <label for="">THB:</label>
                                    <input type="text" name="cent_put_amount" id="cent-put-amount" class="input-control" />
                                </div>
                            </form>
                        </div>
                        <button class="btn-submit" aria-type="cent" aria-submit-form="form-cent">
                            Deposit
                        </button>
                    </div>
                </article>

                <article>
                    <div class="qr-code-text">
                        <h3>STANDARD ACCOUNT</h3>
                        <div class="detail-box">
                            <div class="debox-l">Trading No#</div>
                            <div class="debox-r">8011520</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Platform</div>
                            <div class="debox-r">MT4</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Type</div>
                            <div class="debox-r">STANDARD</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Server</div>
                            <div class="debox-r">MT004</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Leverage</div>
                            <div class="debox-r">1:500</div>
                        </div>

                        <div class="qr-code-form">
                            <p>** Put amount in THB **</p>
                            <form id="form-standard" action="<?= site_url("service/authen"); ?>" method="post">
                                <div class="qrcode-input">
                                    <label for="">THB:</label>
                                    <input type="text" name="standard_put_amount" id="standard-put-amount" class="input-control" />
                                </div>
                            </form>
                        </div>
                        <button class="btn-submit" aria-type="standard" aria-submit-form="form-standard">
                            Deposit
                        </button>
                    </div>
                </article>

                <article>
                    <div class="qr-code-text">
                        <h3>ECN ACCOUNT</h3>
                        <div class="detail-box">
                            <div class="debox-l">Trading No#</div>
                            <div class="debox-r">11447700</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Platform</div>
                            <div class="debox-r">MT4</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Type</div>
                            <div class="debox-r">ECN</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Server</div>
                            <div class="debox-r">MT009</div>
                        </div>
                        <div class="detail-box">
                            <div class="debox-l">Leverage</div>
                            <div class="debox-r">1:50</div>
                        </div>

                        <div class="qr-code-form">
                            <p>** Put amount in THB **</p>
                            <form action="<?= site_url("service/authen"); ?>" method="post">
                                <div class="qrcode-input">
                                    <label for="">THB:</label>
                                    <input type="text" name="ecn_put_amount" id="ecn-put-amount" class="input-control" />
                                </div>
                            </form>
                        </div>
                        <button class="btn-submit" aria-type="ecn" aria-submit-form="form-ecn">
                            Deposit
                        </button>
                    </div>
                </article>


            </div>

            <hr class="hr-footer">
            <div class="section-qrcode-footer">
                <p>* The system only support for THB => USD</p>
                <p>** It's a Dynamic QR code, can be used only 1 time for each transaction.</p>
                <p>*** Need more info, please contact: <span>api.my@wintech.center</span> </p>
            </div>
        </div>

    </section>


    <script>
        const btn_submit = document.querySelectorAll(".btn-submit")
        btn_submit.forEach(s => s.addEventListener("click", () => {
            let form_submit = s.getAttribute('aria-submit-form')
            let type_submit = s.getAttribute('aria-type')
            // alert(form_submit + " : " + type_submit)
            
        }))
    </script>



</body>

</html>