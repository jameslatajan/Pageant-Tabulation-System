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
        <div class="col-12">
            <h1 style="text-align: center; margin-top:20px; font-weight:bold">SUMMARY</h1>
        </div>
    </div>

    <div class="container-fluid ps-5 pe-5">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="<?php echo site_url("summary/interview") ?>" class="nav-link <?php echo ($selected == "interview") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Closed-Door Interview</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("summary/production") ?>" class="nav-link <?php echo ($selected == "production") ? "active" : "" ?>" id="prod-tab" data-bs-target="#production" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Production</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("summary/playsuit") ?>" class="nav-link <?php echo ($selected == "playsuit") ? "active" : "" ?>" id="playsuit-tab" data-bs-target="#playsuit" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Playsuit</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("summary/gown") ?>" class="nav-link <?php echo ($selected == "gown") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Evening Gown</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("summary/consolidatedcategories") ?>" class="nav-link <?php echo ($selected == "consolidatedcategories") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Consolidated</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("summary/consolidatedresults") ?>" class="nav-link <?php echo ($selected == "consolidatedresults") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Top Ten Semifinalists</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                        <div class="ms-2 me-2">
                            <div class="row pt-4">
                                <?php if ($selected == "interview") { ?>
                                    <div class="col-12">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">CLOSED-DOOR INTERVIEW</h4>
                                        <?php

                                        if (!empty($record)) { ?>
                                            <table class="table table-bordered mt-5">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th style="font-size:px;">No.</th>
                                                        <th style="font-size:px;">Candidate's Name</th>
                                                        <?php if (!empty($judges)) {
                                                            foreach ($judges as $j) {
                                                        ?>
                                                                <th style="font-size:px;"><?php echo $j->judgeName; ?></th>

                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <th style="font-size:px;">Total</th>
                                                        <th style="font-size:px;">Rank</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $rank = 1;
                                                    foreach ($record as $rec) {

                                                    ?>
                                                        <tr >
                                                            <td class="text-center"><?php echo $rec['canNo'] ?></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $rec['fullname'] ?></td>
                                                            <?php
                                                            $total = 0;

                                                            foreach ($rec['rating'] as $p) {
                                                                $total += $p;
                                                            ?>
                                                                <td class="text-center" style=""><?php echo ($p != 0) ? $p : "0"; ?></td>

                                                            <?php } ?>
                                                            <td class="text-center" style=""><?php echo $rec['total']; ?></td>
                                                            <td class="text-center" style=""><?php echo ($rec['rank'] === 1)    ? '1st'     : (($rec['rank'] === 2)   ? '2nd'     : (($rec['rank'] === 3)   ? '3rd'     :
                                                                                                    $rec['rank'] . 'th'
                                                                                                )); ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>

                                <?php } else if ($selected == "production") { ?>
                                    <div class="col-12">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">PRODUCTION NUMBER</h4>
                                        <?php if (!empty($record)) { ?>
                                            <table class="table table-bordered mt-5">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th style="font-size:px;">No.</th>
                                                        <th style="font-size:px;">Candidate's Name</th>
                                                        <?php if (!empty($judges)) {
                                                            foreach ($judges as $j) {
                                                        ?>
                                                                <th style="font-size:px;"><?php echo $j->judgeName; ?></th>

                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <th style="font-size:px;">Total</th>
                                                        <th style="font-size:px;">Rank</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    
                                                    foreach ($record as $rec) {

                                                    ?>
                                                        <tr <?php echo ($rec['rank'] == 1 && ($selected !== "semifinals" && $selected !== "finals")) ? 'style="background-color: #FFFF00"' : "" ?>>
                                                            <td class="text-center"><?php echo $rec['canNo'] ?></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $rec['fullname'] ?></td>
                                                            <?php
                                                            $total = 0;

                                                            foreach ($rec['rating'] as $p) {
                                                                $total += $p;
                                                            ?>
                                                                <td class="text-center" style=""><?php echo ($p != 0) ? $p : ""; ?></td>

                                                            <?php } ?>
                                                            <td class="text-center" style=""><?php echo $rec['total']; ?></td>
                                                            <?php if($rec['total'] != 0) {?>
                                                            <td class="text-center" style=""><?php echo ($rec['rank'] === 1)    ? '1st'     : (($rec['rank'] === 2)   ? '2nd'     : (($rec['rank'] === 3)   ? '3rd'     :
                                                                                                    $rec['rank'] . 'th'
                                                                                                )); ?>
                                                            </td>
                                                            <?php } else { ?>
                                                                <td></td>
                                                            <?php }  ?>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>

                                <?php } else if ($selected == "playsuit") { ?>
                                    <div class="col-12">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">PLAYSUIT</h4>
                                        <?php if (!empty($record)) { ?>
                                            <table class="table table-bordered mt-5">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th style="font-size:px;">No.</th>
                                                        <th style="font-size:px;">Candidate's Name</th>
                                                        <?php if (!empty($judges)) {
                                                            foreach ($judges as $j) {
                                                        ?>
                                                                <th style="font-size:px;"><?php echo $j->judgeName; ?></th>

                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <th style="font-size:px;">Total</th>
                                                        <th style="font-size:px;">Rank</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                   
                                                    foreach ($record as $rec) {

                                                    ?>
                                                         <tr <?php echo ($rec['rank'] == 1 && ($selected !== "semifinals" && $selected !== "finals")) ? 'style="background-color: #FFFF00"' : "" ?>>
                                                            <td class="text-center"><?php echo $rec['canNo'] ?></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $rec['fullname'] ?></td>
                                                            <?php
                                                            $total = 0;

                                                            foreach ($rec['rating'] as $p) {
                                                                $total += $p;
                                                            ?>
                                                                <td class="text-center" style=""><?php echo ($p != 0) ? $p : ""; ?></td>

                                                            <?php } ?>
                                                            <td class="text-center" style=""><?php echo $rec['total']; ?></td>
                                                            <?php if($rec['total'] != 0) {?>
                                                            <td class="text-center" style=""><?php echo ($rec['rank'] === 1)    ? '1st'     : (($rec['rank'] === 2)   ? '2nd'     : (($rec['rank'] === 3)   ? '3rd'     :
                                                                                                    $rec['rank'] . 'th'
                                                                                                )); ?>
                                                            </td>
                                                            <?php } else { ?>
                                                                <td></td>
                                                            <?php }  ?>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>
                                <?php } else if ($selected == "gown") { ?>
                                    <div class="col-12">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">EVENING GOWN</h4>
                                        <?php if (!empty($record)) { ?>
                                            <table class="table table-bordered mt-5">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th style="font-size:px;">No.</th>
                                                        <th style="font-size:px;">Candidate's Name</th>
                                                        <?php if (!empty($judges)) {
                                                            foreach ($judges as $j) {
                                                        ?>
                                                                <th style="font-size:px;"><?php echo $j->judgeName; ?></th>

                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <th style="font-size:px;">Total</th>
                                                        <th style="font-size:px;">Rank</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($record as $rec) {

                                                    ?>
                                                         <tr <?php echo ($rec['rank'] == 1 && ($selected !== "semifinals" && $selected !== "finals")) ? 'style="background-color: #FFFF00"' : "" ?>>
                                                            <td class="text-center"><?php echo $rec['canNo'] ?></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $rec['fullname'] ?></td>
                                                            <?php
                                                            $total = 0;

                                                            foreach ($rec['rating'] as $p) {
                                                                $total += $p;
                                                            ?>
                                                                <td class="text-center" style=""><?php echo ($p != 0) ? $p : ""; ?></td>

                                                            <?php } ?>
                                                            <td class="text-center" style=""><?php echo $rec['total']; ?></td>
                                                            <?php if($rec['total'] != 0) {?>
                                                            <td class="text-center" style=""><?php echo ($rec['rank'] === 1)    ? '1st'     : (($rec['rank'] === 2)   ? '2nd'     : (($rec['rank'] === 3)   ? '3rd'     :
                                                                                                    $rec['rank'] . 'th'
                                                                                                )); ?>
                                                            </td>
                                                            <?php } else { ?>
                                                                <td></td>
                                                            <?php }  ?>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>

                                <?php } else if ($selected == "consolidatedresults") { ?>
                                        <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                                            <div class="ms-5 me-5">
                                                <div class="row">
                                                    <h3 class="mt-5 mb-4" style="text-align: center; font-weight:bold" class="text-uppercase">TOP TEN SEMIFINALISTS CONSOLIDATED RESULTS</h3>
                                                    <?php if (!empty($record)) { ?>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th style="font-size:13px;">Rank.</th>
                                                                    <th style="font-size:13px;">Candidate's Name</th>
                                                                    <?php if (!empty($judges)) {
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
                                                                <?php
                                                            

                                                                if (!empty($record)) {
                                                                    foreach ($record as $rec) {

                                                                ?>
                                                                        <tr <?php echo ($rec['rank'] <= 10) ? 'style="background-color: #FFFF00"' : "" ?>>
                                                                            <?php if ($rec['rank'] <= 10) { ?>
                                                                                <td class="text-center" style="vertical-align: middle"><?php echo ($rec['rank'] === 1)    ? '1st'     : (($rec['rank'] === 2)   ? '2nd'     : (($rec['rank'] === 3)   ? '3rd'     :
                                                                                                                                            $rec['rank'] . 'th'
                                                                                                                                        ));
                                                                                                                                        ?>
                                                                                </td>
                                                                            <?php } else { ?>
                                                                                <td></td>
                                                                            <?php } ?>
                                                                            <th class="text-left" style=vertical-align: middle" padding-left: 15px;width:750px;"><img class="rounded-circle w-10" src="<?php echo $image_path . '/' . $rec['canNo'] ?>" alt=""><span style="padding-left: 20px;"> #<?php echo $rec['canNo'] ?> Bb. <?php echo $rec['fullname'] ?></span></th>
                                                                            <?php
                                                                            foreach ($rec['judgeSum'] as $sum) {
                                                                            ?>
                                                                                <td class="text-center" style="vertical-align: middle"><?php echo ($sum != 0) ? $sum  : ""; ?></td>
                                                                            <?php } ?>
                                                                            <td class="text-center" style="vertical-align: middle"><?php echo number_format($rec['overallTotal'], 1); ?></td>
                                                                        </tr>
                                                                <?php   }
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                <?php } else { ?>
                                    <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                                        <div class="ms-5 me-5">
                                            <div class="row">
                                                <h2 style="text-align: center; margin-top:20px; font-weight:bold" class="text-uppercase">CONSOLIDATED RESULTS</h2>

                                                    <div class="container mt-4" align="center">
                                                            <h4 style="text-align: center; margin-bottom:17px; margin-top:10px; font-weight:bold" class="text-uppercase">BEST IN PRODUCTION NUMBER</h4>
                                                            <table class="table table-bordered mt-2" style="width: 80%">
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
                                                                                <td class="text-left" style="font-size: 30px;">Bb. <?php echo $r['fullname'] ?></td>
                                                                                <td class="text-center" style="font-size: 30px;"><?php echo $r['total']; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">BEST IN PLAYSUIT</h4>
                                                            <table class="table table-bordered mt-2" style="width: 80%">
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
                                                                                <td class="text-left" style="font-size: 30px;">Bb. <?php echo $r['fullname'] ?></td>
                                                                                <td class="text-center" style="font-size: 30px;"><?php echo $r['total']; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">BEST IN EVENING GOWN</h4>
                                                            <table class="table table-bordered mt-2" style="width: 80%">
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
                                                                                <td class="text-left" style="font-size: 30px;">Bb. <?php echo $r['fullname'] ?></td>
                                                                                <td class="text-center" style="font-size: 30px;"><?php echo $r['total']; ?></td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <div style="height: 120px;"></div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    </div>
                                <div style="height: 100px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>