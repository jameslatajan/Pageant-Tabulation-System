<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageant_name->value ?></title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/custom/uploads/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/fa/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/custom/css/style-categories.css" ver=13>

    <script src="<?php echo base_url() ?>assets/libs/jquery/jquery-3.7.1.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/fa/all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url() ?>assets/custom/js/script.js" ver=11></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark custom-nav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url() ?>assets/custom/uploads/logo.png" alt="" style="width: 38px;" class="rounded-pill">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <ul class="navbar-nav mb-2 mb-lg-0">

                    <?php if ($isFinals->value) { ?>
                        <li class="nav-item">
                            <a class="nav-link header-nav <?php if ($current_module == 'finals') {
                                                                echo 'active';
                                                            } ?>" href="<?php echo site_url('finals') ?>">FINALS</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link header-nav <?php if ($current_module == 'myscore') {
                                                                echo 'active';
                                                            } ?>" href="<?php echo base_url('myscore') ?>">MY SCORE</a>
                        </li>
                        <?php if ($judgeID == 3) { ?>
                            <li class="nav-item">
                                <a class="nav-link header-nav <?php if ($current_module == 'finaljudgescores') {
                                                                    echo 'active';
                                                                } ?>" href="<?php echo site_url('consolidatedsummary/finaljudgescores/1') ?>">JUDGES SCORES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link header-nav <?php if ($current_module == 'viewConsolidated') {
                                                                    echo 'active';
                                                                } ?>" href="<?php echo site_url('consolidatedsummary/finals') ?>">FINAL RESULT</a>
                            </li>
                        <?php } ?>
                    <?php } else { ?>
                        <li class="nav-item ">
                            <a class="nav-link header-nav <?php if ($current_module == 'production') {
                                                                echo 'active';
                                                            } ?>" href="<?php echo site_url('production') ?>">PRODUCTION</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link header-nav <?php if ($current_module == 'casual') {
                                                                echo 'active';
                                                            } ?>" href="<?php echo site_url('casual') ?>">CASUAL</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link header-nav <?php if ($current_module == 'playsuit') {
                                                                echo 'active';
                                                            } ?>" href="<?php echo site_url('playsuit') ?>">PLAYSUIT</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link header-nav <?php if ($current_module == 'sports') {
                                                                echo 'active';
                                                            } ?>" href="<?php echo site_url('sports') ?>">SPORTS</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link header-nav <?php if ($current_module == 'uniform') {
                                                                echo 'active';
                                                            } ?>" href="<?php echo site_url('uniform') ?>">UNIFORM</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link header-nav <?php if ($current_module == 'tourism') {
                                                                echo 'active';
                                                            } ?>" href="<?php echo site_url('tourism') ?>">TOURISM</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link header-nav <?php if ($current_module == 'gown') {
                                                                echo 'active';
                                                            } ?>" href="<?php echo site_url('gown') ?>">GOWN</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link header-nav <?php if ($current_module == 'myscore') {
                                                                echo 'active';
                                                            } ?>" href="<?php echo base_url('myscore') ?>">MY SCORE</a>
                        </li>
                        <?php if ($judgeID == 3) { ?>
                            <li class="nav-item ">
                                <a class="nav-link header-nav <?php if ($current_module == 'judges_scores') {
                                                                    echo 'active';
                                                                } ?>" href="<?php echo site_url('consolidatedbyjudges') ?>">JUDGES SCORES</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link header-nav <?php if ($current_module == 'summary') {
                                                                    echo 'active';
                                                                } ?>" href="<?php echo site_url('consolidatedbycategories') ?>">SUMMARY</a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item judge-name navbar-text text-white fw-bold me-4">
                        <?php echo $judgeName; ?>
                    </li>
                    <li class="nav-item logout ">
                        <button class="btn btn-outline-light btn-sm mt-1" id="logout">Logout</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>