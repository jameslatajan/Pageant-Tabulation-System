<style>
    /* .table td {
        font-size: 10px;
    }

    .table th {
        font-size: 10px !important;
    } */
</style>

<style>
    .w-10 {
        width: 50px;
        border: 3px solid black;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <?php if ($this->session->userdata('admin_loggedIn')) {?>
            <div class="col-12 heading my-1">
                <h1 class="module-title mt-2" style="text-align: center; font-weight:bold">SUMMARY</h1>
            </div>
        <?php } else {?>
            <?php if ($current_module == 'finaljudgescores') {?>
                <div class="col-12 heading my-1">
                    <h1 class="module-title mt-2" style="text-align: center; font-weight:bold">JUDGES SCORES</h1>
                </div>
            <?php }else{?>
                <div class="col-12 heading my-1">
                    <h1 class="module-title mt-2" style="text-align: center; font-weight:bold">SUMMARY</h1>
                </div>
            <?php  } ?>
        <?php } ?>
    </div>

    <div class="container-fluid p-1">
        <div class="card">
            <div class="card-body p-1">
                <ul class="nav nav-tabs" role="tablist">
                    <?php if($this->session->userdata('admin_loggedIn')){?>
                        <li class="nav-item" >
                            <a href="<?php echo site_url("consolidatedsummary/best")?>" class="nav-link <?php echo ($selected == "best") ? "active current" : "" ?>" id="prod-tab" data-bs-target="#production" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">BEST RESULT</a>
                        </li>
                        <li class="nav-item" >
                            <a href="<?php echo site_url("consolidatedsummary/consolidated")?>" class="nav-link <?php echo ($selected == "consolidated") ? "active current" : "" ?>" id="prod-tab" data-bs-target="#production" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">CONSOLIDATED RESULT</a>
                        </li>
                    <?php } ?>
                    <?php if($current_module == "finaljudgescores") { ?>
                        <li class="nav-item" >
                            <a href="<?php echo site_url("consolidatedsummary/finaljudgescores/1")?>" class="nav-link <?php echo ($selected == "judge1") ? "active current" : "" ?>" id="prod-tab" data-bs-target="#production" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Judge 1</a>
                        </li>
                        <li class="nav-item" >
                            <a href="<?php echo site_url("consolidatedsummary/finaljudgescores/2")?>" class="nav-link <?php echo ($selected == "judge2") ? "active current" : "" ?>" id="playsuit-tab" data-bs-target="#playsuit" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Judge 2</a>
                        </li>
                        <li class="nav-item" >
                            <a href="<?php echo site_url("consolidatedsummary/finaljudgescores/3")?>" class="nav-link <?php echo ($selected == "judge3") ? "active current" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Judge 3 (CHAIRMAN)</a>
                        </li>
                        <li class="nav-item" >
                            <a href="<?php echo site_url("consolidatedsummary/finaljudgescores/4")?>" class="nav-link <?php echo ($selected == "judge4") ? "active current" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Judge 4</a>
                        </li>
                        <li class="nav-item" >
                            <a href="<?php echo site_url("consolidatedsummary/finaljudgescores/5")?>" class="nav-link <?php echo ($selected == "judge5") ? "active current" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Judge 5</a>
                        </li>
                        
                    <?php } ?>
                    <?php if($isFinals->value == "1" && ($selected == "finals" || $this->session->userdata('admin_loggedIn'))) { ?>
                        <li class="nav-item" >
                            <a href="<?php echo site_url("consolidatedsummary/finals")?>" class="nav-link <?php echo ($selected == "finals") ? "active current" : "" ?>" id="contact-tab" data-bs-target="#semifinalists" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">FINALS</a>
                        </li>
                    <?php } ?>
                </ul>
                <div class="tab-content" id="myTabContent">

                    <?php if($this->session->userdata('admin_loggedIn')){?>

                        <?php if ($selected == "best") {?>
                            <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                                <div class="ms-5 me-5">
                                    <div class="row">
                                        <div class="d-flex align-items-end">
                                            <a onclick="popUp('<?php echo site_url('consolidatedsummary/printCategory'); ?>', 'Best Category Results')" class="btn btn-primary mt-3 mb-3 ms-auto" >Print Results</a>
                                        </div>

                                        <div class="container mt-3" align="center">
                                            <?php if(!empty($production) && $production[0]['total'] != 0) {?>
                                                <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">BEST IN PRODUCTION NUMBER</h4>
                                                <table class="table table-bordered mt-2" style="width: 50%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-left">Candidate's Name</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // var_dump($production_ms);
                                                        if (!empty($production)) {
                                                                foreach ($production as $rec => $r) {
                                                                    if ($r['rank'] == 1 && $r['total'] != 0) {

                                                            ?>
                                                                <tr class="fw-bold">
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['canNo'] ?></td>
                                                                    <td class="text-left" style="font-size: 30px;">Ms. <?php echo $r['fullname'] ?></td>
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['total']; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>

                                            <?php if(!empty($casual) && $casual[0]['total'] != 0) {?>
                                                <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">BEST IN CASUAL WEAR</h4>
                                                <table class="table table-bordered mt-2" style="width: 50%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-left">Candidate's Name</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // var_dump($production_ms);
                                                        if (!empty($casual)) {
                                                                foreach ($casual as $rec => $r) {
                                                                    if ($r['rank'] == 1 && $r['total'] != 0) {

                                                            ?>
                                                                <tr class="fw-bold">
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['canNo'] ?></td>
                                                                    <td class="text-left" style="font-size: 30px;">Ms. <?php echo $r['fullname'] ?></td>
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['total']; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>

                                            <?php if(!empty($playsuit) && $playsuit[0]['total'] != 0) {?>
                                                <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">BEST IN playsuit</h4>
                                                <table class="table table-bordered mt-2" style="width: 50%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-left">Candidate's Name</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // var_dump($production_ms);
                                                        if (!empty($playsuit)) {
                                                                foreach ($playsuit as $rec => $r) {
                                                                    if ($r['rank'] == 1 && $r['total'] != 0) {

                                                            ?>
                                                                <tr class="fw-bold">
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['canNo'] ?></td>
                                                                    <td class="text-left" style="font-size: 30px;">Ms. <?php echo $r['fullname'] ?></td>
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['total']; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>                                       

                                            <?php if(!empty($sports) && $sports[0]['total'] != 0) {?>
                                                <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">BEST IN SPORTS WEAR</h4>
                                                <table class="table table-bordered mt-2" style="width: 50%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-left">Candidate's Name</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // var_dump($production_ms);
                                                        if (!empty($sports)) {
                                                                foreach ($sports as $rec => $r) {
                                                                    if ($r['rank'] == 1 && $r['total'] != 0) {

                                                            ?>
                                                                <tr class="fw-bold">
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['canNo'] ?></td>
                                                                    <td class="text-left" style="font-size: 30px;">Ms. <?php echo $r['fullname'] ?></td>
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['total']; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>

                                            <?php if(!empty($uniform) && $uniform[0]['total'] != 0) {?>
                                                <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">BEST IN UNIFORM</h4>
                                                <table class="table table-bordered mt-2" style="width: 50%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-left">Candidate's Name</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // var_dump($production_ms);
                                                        if (!empty($uniform)) {
                                                                foreach ($uniform as $rec => $r) {
                                                                    if ($r['rank'] == 1 && $r['total'] != 0) {

                                                            ?>
                                                                <tr class="fw-bold">
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['canNo'] ?></td>
                                                                    <td class="text-left" style="font-size: 30px;">Ms. <?php echo $r['fullname'] ?></td>
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['total']; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>

                                            <?php if(!empty($tourism) && $tourism[0]['total'] != 0) {?>
                                                <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">BEST IN TOURISM VIDEO</h4>
                                                <table class="table table-bordered mt-2" style="width: 50%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-left">Candidate's Name</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // var_dump($production_ms);
                                                        if (!empty($tourism)) {
                                                                foreach ($tourism as $rec => $r) {
                                                                    if ($r['rank'] == 1 && $r['total'] != 0) {

                                                            ?>
                                                                <tr class="fw-bold">
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['canNo'] ?></td>
                                                                    <td class="text-left" style="font-size: 30px;">Ms. <?php echo $r['fullname'] ?></td>
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['total']; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>

                                            <?php if(!empty($gown) && $gown[0]['total'] != 0) {?>
                                                <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">BEST IN gown</h4>
                                                <table class="table table-bordered mt-2" style="width: 50%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-left">Candidate's Name</th>
                                                            <th class="text-center">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // var_dump($production_ms);
                                                        if (!empty($gown)) {
                                                                foreach ($gown as $rec => $r) {
                                                                    if ($r['rank'] == 1 && $r['total'] != 0) {

                                                            ?>
                                                                <tr class="fw-bold">
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['canNo'] ?></td>
                                                                    <td class="text-left" style="font-size: 30px;">Ms. <?php echo $r['fullname'] ?></td>
                                                                    <td class="text-center" style="font-size: 30px;"><?php echo $r['total']; ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div style="height: 50px;"></div>
                        <?php } ?>
                    
                        <?php if ($selected == "consolidated") {?>
                            <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                                <div class="ms-5 me-5">
                                    <div class="d-flex align-items-end justify-content-end">
                                        <button class="btn btn-primary ps-2 mt-3 mb-2 ms-auto" id="setFinals">Set Finals</button>
                                        <button class="btn btn-primary ps-2 mt-3 mb-2 ms-2" onclick="popUp('<?php echo site_url('consolidatedsummary/printFinalist'); ?>', 'Finalist')">Print Finalist</button>
                                    </div>

                                    <div class="row">
                                        <h3 class="mb-4" style="text-align: center; font-weight:bold" class="text-uppercase">CONSOLIDATED RESULT</h3>
                                            <?php if (!empty($record)) { ?>
                                                <table class="table table-bordered border-dark">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th style="font-size:13px;">Rank.</th>
                                                            <th style="font-size:13px;">Candidate's Name</th>
                                                            <?php if(!empty($judges)) {
                                                                foreach ($judges as $j) { 
                                                            ?>
                                                                <th style="font-size:13px;"><?php echo $j->judgeName; ?></th>
                                                                
                                                            <?php 
                                                                }
                                                            }
                                                            ?>
                                                            <th style="font-size:13px;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- <?php var_dump($record);?> -->
                                                        <?php
                                                        
                                                        if (!empty($record)) {
                                                            $count = 1;
                                                            foreach ($record as $rec) {

                                                        ?>
                                                                <tr <?php echo ($rec['highlight']) ? 'style="background-color: #d1e7dd; color: dark; font-weight:bold"' : ""?>>
                                                                    <?php if($rec['highlight']) {
                                                                    ?>
                                                                        <td class="text-center" style="vertical-align: middle"><?php echo ($rec['rank'] === 1)    ? '1st'     : (($rec['rank'] === 2)   ? '2nd'     : (($rec['rank'] === 3)   ? '3rd'     :
                                                                                                                $rec['rank'] . 'th'
                                                                                                            ));
                                                                        ?>
                                                                        </td>
                                                                    <?php } else {?>
                                                                        <td></td>
                                                                    <?php } ?>
                                                                    <th class="text-left" style="vertical-align: middle padding-left: 15px;width:450px;"><img class="rounded-circle w-10" src="<?php echo $image_path . '/' . $rec['canNo'] ?>" alt=""><span style="padding-left: 20px;"> #<?php echo $rec['canNo'] ?>  Ms. <?php echo $rec['fullname'] ?></span></th>
                                                                    <?php
                                                                    foreach ($rec['judgeSum'] as $sum) {
                                                                    ?>
                                                                        <td class="text-center" style="vertical-align: middle"><?php echo ($sum != 0) ? number_format($sum, 1)  : ""; ?></td>
                                                                    <?php } ?>
                                                                    <td class="text-center" style="vertical-align: middle"><?php echo number_format($rec['overallTotal'], 1); ?></td>
                                                                </tr>
                                                        <?php $count++;  }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <?php if ($current_module == "finaljudgescores") {?>
                        <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                            <div class="ms-5 me-5">
                                <div class="row">
                                    <h2 style="text-align: center; font-weight:bold" class=" module-title text-uppercase mt-3">JUDGE <?php echo $judge; ?></h2>
                                    <?php if (!empty($records)) { ?>
                                        <table class="table table-bordered mt-3">
                                            <thead>
                                                <tr class="text-center">
                                                    <th class="text-start ps-5"style="font-size:px;">Candidates Name</th>
                                                    
                                                    <th style="font-size:px;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                foreach ($records['finals'] as $rec) {
                                                    ?>
                                                    <tr>
                                                      
                                                        <td class="text-left" style="vertical-align: middle; padding-left: 15px; width:750px;">
                                                            <img class="rounded-circle w-10" src="<?php echo $image_path . '/' . $rec->canNo ?>" alt="">
                                                            <span style="padding-left: 20px;"> #<?php echo $rec->canNo ?>  Ms. <?php echo $rec->fullname ?></span>
                                                        </td>
                                                       
                                                        <td class="text-center" style="vertical-align: middle"><?php echo round($rec->score, 1); ?></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>

                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($selected == "finals" || $this->session->userdata('admin_loggedIn')) { ?>
                        <?php if($this->session->userdata('admin_loggedIn') && $selected == "finals"){?>
                            <div class="d-flex align-items-end justify-content-end">
                                <button class="btn btn-primary ps-2 mt-4 mb-2 me-5" onclick="popUp('<?php echo site_url('consolidatedsummary/printGrandResult'); ?>', 'Grand Result')">Print Grand Result</button>
                            </div>
                        <?php } ?>

                        <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                            <div class="ms-5 me-5">
                                <div class="row">
                                    <?php if (!empty($records)) { ?>
                                    <h3 class="mt-3" style="text-align: center; font-weight:bold" class="text-uppercase">FINALIST CONSOLIDATED RESULTS</h3>
                                        <table class="table table-bordered mt-3">
                                            <thead>
                                                <tr class="text-center">
                                                    <th style="font-size:px;">No.</th>
                                                    <th style="font-size:px;">Candidate's Name</th>
                                                    <?php if(!empty($judges)) {
                                                        foreach ($judges as $j) { 
                                                    ?>
                                                        <th style="font-size:px;"><?php echo $j->judgeName; ?></th>
                                                        
                                                    <?php 
                                                        }
                                                    }
                                                    ?>
                                                    <th style="font-size:px;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($records as $rec) {

                                                ?>
                                                        <tr >
                                                            <?php if($rec['total'] != 0 ){ ?>
                                                                <?php if($rec['rank'] <= 5) {?>
                                                                    <td class="text-center" style="vertical-align: middle"><?php echo ($rec['rank'] === 1)    ? '1st'     : (($rec['rank'] === 2)   ? '2nd'     : (($rec['rank'] === 3)   ? '3rd'     :
                                                                                                            $rec['rank'] . 'th'
                                                                                                        ));
                                                                        ?>
                                                                    </td>
                                                                <?php } else {?>
                                                                    <td></td>
                                                            <?php } ?>
                                                            <?php } else {?>
                                                                <td></td>
                                                            <?php } ?>
                                                            <th class="text-left" style=vertical-align: middle" padding-left: 15px;width:750px;"><img class="rounded-circle w-10" src="<?php echo $image_path . '/' . $rec['canNo'] ?>" alt=""><span style="padding-left: 20px;"> #<?php echo $rec['canNo'] ?>  Ms. <?php echo $rec['fullname'] ?></span></th>
                                                            <?php
                                                            foreach ($rec['rating'] as $sum) {
                                                            ?>
                                                                <td class="text-center" style="vertical-align: middle"><?php echo ($sum != 0) ? $sum  : ""; ?></td>
                                                            <?php } ?>
                                                            <td class="text-center" style="vertical-align: middle"><?php echo number_format($rec['total'], 1); ?></td>
                                                        </tr>
                                                        
                                                
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $('#setFinals').on('click', function() {
        Swal.fire({
            title: 'Confirm set to Finals?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#1ecbe1',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#setFinals').attr('disable', true);
                window.location.href = "<?php echo site_url('consolidatedsummary/setFinals') ?>";
                // location.reload(); // Reload the page
            }
        })
    });

    $('#printGrandResult').on('click', function() {
        Swal.fire({
            title: 'Confirm to print Grand Results?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#1ecbe1',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.open("<?php echo site_url('consolidatedsummary/printGrandResult') ?>", '_blank');
                // location.reload(); // Reload the page
            }
        })
    });

</script>
