<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/libs/image/background.png" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/fa/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/sweetalert/sweetalert2.min.css">

    <script src="<?php echo base_url() ?>assets/libs/jquery/jquery-3.7.1.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/fa/all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/sweetalert/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="margin-top: 20px;">
            <div class="col-12">
                <h3>MONITORING</h3>
                <form action="<?php echo site_url('login_config/save') ?>" method="post" id="formFilter">
                    <input type="password" name="pass" value="" class="form-control form-control-sm" style="width: 175px; margin-bottom:10px" required>
                    <button type="submit" class="btn btn-primary" id="set" >Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>