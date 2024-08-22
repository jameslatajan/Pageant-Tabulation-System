<style>
    /* .table td {
        font-size: 10px;
    }

    .table th {
        font-size: 10px !important;
    } */
</style>

<div class="container-fluid">
    <div class="row">
        <?php if ($this->session->userdata('admin_loggedIn')) {?>
            <div class="col-12 heading my-1">
                <h1 class="module-title mt-2" style="text-align: center; font-weight:bold">CONSOLIDATED SCORES BY JUDGES</h1>
            </div>
        <?php } else {?>
            <div class="col-12 heading my-1">
                <h1 class="module-title mt-2" style="text-align: center; font-weight:bold">JUDGES SCORES</h1>
            </div>
        <?php } ?>
    </div>

    <div class="container-fluid p-1">
        <div class="card">
            <div class="card-body p-1">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbyjudges/judge/1")?>" class="nav-link <?php echo ($selected == "judge1") ? "active current" : "" ?>" id="prod-tab" data-bs-target="#production" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Judge 1</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbyjudges/judge/2")?>" class="nav-link <?php echo ($selected == "judge2") ? "active current" : "" ?>" id="playsuit-tab" data-bs-target="#playsuit" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Judge 2</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbyjudges/judge/3")?>" class="nav-link <?php echo ($selected == "judge3") ? "active current" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Judge 3 (CHAIRMAN)</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbyjudges/judge/4")?>" class="nav-link <?php echo ($selected == "judge4") ? "active current" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Judge 4</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbyjudges/judge/5")?>" class="nav-link <?php echo ($selected == "judge5") ? "active current" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Judge 5</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                            <div class="ms-2 me-2">
                                <div class="row pt-4">
                                    <h2 style="text-align: center; font-weight:bold" class="text-uppercase">JUDGE <?php echo $judge; ?></h2>

                                    <div class="col-4">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Production Number</h4>
                                        <table class="table table-bordered table-sm mt-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate's Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($record)) {?>

                                                <?php   
                                                    foreach ($record['production'] as $prod) {
                                                ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $prod->canNo ?></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Ms. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""><?php echo $prod->score; ?></td>

                                                        </tr>
                                                <?php }?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Casual Wear</h4>
                                        <table class="table table-bordered table-sm mt-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate's Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if (!empty($record)) {
                                                ?>

                                                <?php   
                                                    foreach ($record['casual'] as $prod) {
                                                ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $prod->canNo ?></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Ms. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""><?php echo $prod->score; ?></td>

                                                        </tr>
                                                <?php }?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Playsuit</h4>
                                        <table class="table table-bordered table-sm mt-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate's Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if (!empty($record)) {
                                                ?>

                                                <?php   
                                                    foreach ($record['playsuit'] as $prod) {
                                                ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $prod->canNo ?></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Ms. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""><?php echo $prod->score; ?></td>

                                                        </tr>
                                                <?php }?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Sports Wear</h4>
                                        <table class="table table-bordered table-sm mt-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate's Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if (!empty($record)) {
                                                ?>

                                                <?php   
                                                    foreach ($record['sports'] as $prod) {
                                                ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $prod->canNo ?></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Ms. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""><?php echo $prod->score; ?></td>

                                                        </tr>
                                                <?php }?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Uniform</h4>
                                        <table class="table table-bordered table-sm mt-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate's Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if (!empty($record)) {
                                                ?>

                                                <?php   
                                                    foreach ($record['uniform'] as $prod) {
                                                ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $prod->canNo ?></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Ms. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""><?php echo $prod->score; ?></td>

                                                        </tr>
                                                <?php }?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Tourism Video</h4>
                                        <table class="table table-bordered table-sm mt-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate's Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if (!empty($record)) {
                                                ?>

                                                <?php   
                                                    foreach ($record['tourism'] as $prod) {
                                                ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $prod->canNo ?></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Ms. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""><?php echo $prod->score; ?></td>

                                                        </tr>
                                                <?php }?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 ">
                                        <h4 style="text-align: center; margin-bottom:8px; margin-top:20px; font-weight:bold" class="text-uppercase">Gown</h4>
                                        <div class="d-flex justify-content-center">
                                            <table class="table table-bordered table-sm mt-2 w-50">
                                                
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-left">Candidate's Name</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        if (!empty($record)) {
                                                    ?>

                                                    <?php   
                                                        foreach ($record['gown'] as $prod) {
                                                    ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $prod->canNo ?></td>
                                                                <td class="text-left" style=" padding-left: 15px; width:350px;">Ms. <?php echo $prod->fullname ?></td>
                                                                <td class="text-center" style=""><?php echo $prod->score; ?></td>

                                                            </tr>
                                                    <?php }?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <?php if($isFinals->value == "1"){ ?>
                                        <div class="col-12 ">
                                            <h4 style="text-align: center; margin-bottom:8px; margin-top:20px; font-weight:bold" class="text-uppercase">Finals</h4>
                                            <div class="d-flex justify-content-center">
                                                <table class="table table-bordered table-sm mt-2 w-50">
                                                    
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-left">Candidate's Name</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            if (!empty($record)) {
                                                        ?>

                                                        <?php   
                                                            foreach ($record['finals'] as $prod) {
                                                        ?>
                                                                <tr>
                                                                    <td class="text-center"><?php echo $prod->canNo ?></td>
                                                                    <td class="text-left" style=" padding-left: 15px; width:350px;">Ms. <?php echo $prod->fullname ?></td>
                                                                    <td class="text-center" style=""><?php echo $prod->score; ?></td>

                                                                </tr>
                                                        <?php }?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <<?php } ?>


                                </div>
                            </div>
                        </div>
                
                </div>
            </div>
        </div>
    </div>
  
</div>
