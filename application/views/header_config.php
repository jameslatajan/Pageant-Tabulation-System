<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $module_title ?></title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/custom/uploads/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/fa/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/custom/css/style-categories.css" ver=13>

    <script src="<?php echo base_url() ?>assets/libs/jquery/jquery-3.7.1.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/fa/all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/sweetalert/sweetalert2.all.min.js"></script>

    <style>
        .mr {
            text-transform: uppercase;
        }

        .crit {
            font-size: 20px !important;
        }

        td {
            padding: 1px;
        }

        .form-select {
            padding-top: 1px;
            padding-bottom: 1px;
        }

        .logout:hover {
            cursor: pointer;
        }

        .demo-wrap {
            overflow: hidden;
            position: relative;
        }

        .demo-bg {
            opacity: 0.6;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: auto;
        }

        .demo-content {
            position: relative;
        }

        .nav-link {
            padding-top: 8px;
            padding-bottom: 8px;
            padding-left: 20px;
            padding-right: 20px;
        }

        /* modified */
        .mr-link,
        .ms-link {
            font-size: 1.2rem;
            padding-top: 13px;
            padding-bottom: 13px;
        }

        .item {
            position: relative;
            padding-top: 20px;
            display: inline-block;

        }

        .card-body {
            padding: 0px;
        }

        .notify-badge {
            background: url('<?php echo base_url() ?>assets/image/badge.png');
            background-repeat: no-repeat;
            position: absolute;
            left: -19px;
            top: 3px;
            text-align: center;
            padding: 5px 10px;
            font-weight: bolder;
            width: 98px;
            height: 127px;
        }

        .notify-text {
            font-size: 48px;
            color: white;
            text-shadow:
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000;
        }

        .nav-pills .nav-link {
            margin-top: 28%;
            margin-bottom: 6px;
            background-color: #f6f6f6;
            color: #525351;
            border: 1px solid black;
        }

        /* modified */
        .can_image {
            width: 237px;
            height: 200px;
            border: 1px solid #01090a;
            border-radius: 10%;
        }

        #mr_name,
        #ms_name {
            font-size: 30px;
            font-weight: bold;
            text-transform: uppercase;
        }

        #mr_remarks,
        #ms_remarks {
            font-size: 20px;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #800000;

        }

        .full-height {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .fill-height {
            flex-grow: 1;
            width: 100%;
        }

        .doborder {
            border: 1px solid;
            border-color: #ddd;
            border-radius: 4px;
        }

        .controlsdiv {
            display: table;
            width: 100%;
        }

        .navbar-nav .nav-link.active,
        .navbar-nav .show>.nav-link {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark custom-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url() ?>/assets/image/background.png" alt="" style="width: 30px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($current_module == 'categories') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url('consolidatedbycategories') ?>">CATEGORIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php if ($current_module == 'judge') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url('consolidatedbyjudges') ?>">JUDGES SCORES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  <?php if ($current_module == 'summary') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url('consolidatedsummary') ?>">SUMMARY</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link  <?php if ($current_module == 'categories') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url('consolidatebycategories') ?>">CATEGORIES</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link  <?php if ($current_module == 'result') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url('consolidatebestresult') ?>">RESULT</a>
                    </li>
                    <?php if ($isFinals->value) { ?>
                        <li class="nav-item">
                            <a class="nav-link  <?php if ($current_module == 'final') {
                                                    echo 'active';
                                                } ?>" href="<?php echo site_url('consolidatefinal') ?>">FINALS</a>
                        </li>
                    <?php } ?> -->
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item me-4">
                        <!-- <a class="nav-link <?php if ($current_module == 'config') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url('config') ?>">SET INITIAL</a> -->
                        <button class="btn btn-warning btn-md" id="set-initial">SET INITIAL</button>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item logout">
                    <a class="nav-link text-white px-2" id="logout"><i class="fa-solid fa-power-off"></i></a>
                </li>
            </ul>
        </div>
    </nav>