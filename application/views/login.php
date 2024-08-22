<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageant_name->value ?></title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/custom/uploads/logo.png" type="image/x-icon">

    <!-- css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/fa/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/custom/css/style.css" ver=7>
</head>

<body>
    <div class="container">
        <div class="row  my-2">
            <div class="col-12 my-5">
                <div class="card card-login">
                    <div class="card-body d-flex p-0">
                        <div class="col-sm-7 px-0 d-none d-sm-block text-center login-left">
                            <!-- <div class="p-3"> -->
                            <img src="<?php echo base_url() ?>assets/custom/uploads/bg-left.jpg" alt="Login image" class="logo-image p-0 rounded-start">
                            <!-- </div> -->
                        </div>
                        <div class="col-sm-5 right-background">
                            <div class="content">
                                <div class="px-5 ms-xl-4 text-black d-flex align-items-center justify-content-center">
                                    <form action=" <?php echo site_url('login/submit') ?>" method="POST" style="width: 15rem;" class="my-5 h-custom-2">
                                        <div class="form-outline mb-1 d-block justify-content-center">
                                            <p class="title">JUDGE NO.</p>
                                            <select name="userID" id="userID" class="form-control form-control-lg select-2">
                                                <option value=""></option>
                                                <?php foreach ($records as $rec) { ?>
                                                    <option value="<?php echo $rec->judgeID ?>"><?php echo $rec->judgeName ?></option>
                                                <?php }; ?>
                                            </select>
                                        </div>
                                        <div class="text-center pt-3 mt-3">
                                            <button type="submit" class="btn btn-light btn-lg w-15 login-button">Login</button>
                                            <!-- <button type="submit" class="btn btn-light btn-lg w-15">Login</button> -->
                                        </div>
                                    </form>
                                </div>
                                <p class="text-end pe-3 powered-by mb-0">POWERED BY: ISOTECH, INC.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="<?php echo base_url() ?>assets/libs/jquery/jquery-3.7.1.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/select2/js/select2.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/fa/all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/custom/js/script.js" ver=7></script>
</body>

</html>