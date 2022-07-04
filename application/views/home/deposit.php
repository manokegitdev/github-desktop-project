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

    <link rel="stylesheet" href="<?= site_url('public/assets/css/deposit_style.css'); ?>" />
    
    
</head>

<body class="">

<section class="section-qr-code">
        <div class="qrcode-content">
            <div class="section-title">
                <h1>ZAHA (QR CODE)</h1>
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
                            <form action="" method="post">
                                <div class="qrcode-input">
                                    <label for="">THB:</label>
                                    <input type="text" name="cent_put_amount" id="cent-put-amount" class="input-control" />
                                    <!-- <input type="hidden" name="account_type" value="CENT"> -->
                                </div>
                            </form>
                        </div>
                        <button>Deposit</button>
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
                            <form action="" method="post">
                                <div class="qrcode-input">
                                    <label for="">THB:</label>
                                    <input type="text" name="standard_put_amount" id="standard-put-amount" class="input-control" />
                                    <!-- <input type="hidden" name="account_type" value="standard"> -->
                                </div>
                            </form>
                        </div>
                        <button>Deposit</button>
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
                            <form action="" method="post">
                                <div class="qrcode-input">
                                    <label for="">THB:</label>
                                    <input type="text" name="ecn_put_amount" id="ecn-put-amount" class="input-control" />
                                    <!-- <input type="hidden" name="account_type" value="ECN"> -->
                                </div>
                            </form>
                        </div>
                        <button>Deposit</button>
                    </div>
                </article>


            </div>
        </div>
    </section>



  

</body>
</html>