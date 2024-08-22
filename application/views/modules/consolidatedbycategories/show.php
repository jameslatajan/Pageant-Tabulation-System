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
                <h1 class="module-title mt-2" style="text-align: center; font-weight:bold">CONSOLIDATED BY CATEGORIES</h1>
            </div>
        <?php } else {?>
            <div class="col-12 heading my-1">
                <h1 class="module-title mt-2" style="text-align: center; font-weight:bold">SUMMARY</h1>
            </div>
        <?php } ?>
    </div>

    <div class="container-fluid p-1">
        <div class="card">
            <div class="card-body p-1">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbycategories/production")?>" class="nav-link <?php echo ($selected == "production") ? "active current" : "" ?>" id="prod-tab" data-bs-target="#production" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Production Number</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbycategories/casual")?>" class="nav-link <?php echo ($selected == "casual") ? "active current" : "" ?>" id="prod-tab" data-bs-target="#casualwear" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Casual Wear</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbycategories/playsuit")?>" class="nav-link <?php echo ($selected == "playsuit") ? "active current" : "" ?>" id="playsuit-tab" data-bs-target="#playsuit" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Playsuit</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbycategories/sports")?>" class="nav-link <?php echo ($selected == "sports") ? "active current" : "" ?>" id="prod-tab" data-bs-target="#sportswear" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sports Wear</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbycategories/uniform")?>" class="nav-link <?php echo ($selected == "uniform") ? "active current" : "" ?>" id="prod-tab" data-bs-target="#uniform" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Uniform</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbycategories/tourism")?>" class="nav-link <?php echo ($selected == "tourism") ? "active current" : "" ?>" id="contact-tab" data-bs-target="#tourismvideo" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Tourism Video</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbycategories/gown")?>" class="nav-link <?php echo ($selected == "gown") ? "active current" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Gown</a>
                    </li>
                    <li class="nav-item" >
                        <a href="<?php echo site_url("consolidatedbycategories/consolidated")?>" class="nav-link <?php echo ($selected == "consolidated") ? "active current" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Consolidated Results</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                            <div class="ms-5 me-5">
                                <div class="row">

                                    <?php if ($this->session->userdata('admin_loggedIn') && $selected != "consolidated" ) {?>
                                        <div align="right" class="mt-3">
                                            <a onclick="popUp('<?php echo site_url('consolidatedbycategories/printcategory/'. $selected); ?>', '<?php echo 'Best in '. $catTitle?>')" class="btn btn-primary mt-3 mb-3 ms-3" >Print Results</a>
                                        </div>
                                    <?php }?>

                                    <?php if ($selected != "consolidated") {?>
                                        <?php if ($record[0]['rank'] == 1 && $record[0]['total'] != 0) {?>
                                                <h2 style="text-align: center; font-weight:bold" class="mt-4 text-uppercase">BEST IN <?php echo $catTitle?></h2>
                                                <div class="d-flex align-items-center justify-content-center">
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
                                                            if (!empty($record)) {
                                                                    foreach ($record as $rec => $r) {
                                                                        if ($r['rank'] == 1 && $r['total'] != 0) {
                                                                ?>
                                                                    <tr class="fw-bold">
                                                                        <td class="text-center" style="font-size: 20px;"><?php echo $r['canNo'] ?></td>
                                                                        <td class="text-left" style="font-size: 20px;">Ms. <?php echo $r['fullname'] ?></td>
                                                                        <td class="text-center" style="font-size: 20px;"><?php echo $r['total']; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if ($selected != "consolidated") {?>
                                        <div class="col mt-3">
                                            <h3 style="text-align: center; font-weight:bold" class="text-uppercase"><?php echo $catTitle?></h3>
                
                                            <?php if (!empty($record)) { ?>
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
                                                            <th style="font-size:px;">Rank</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            foreach ($record as $rec) {

                                                        ?>
                                                                <tr <?php echo ($rec['rank'] == 1 && $rec['total'] != 0 && ($selected !== "semifinals" && $selected !== "finals")) ? 'style="background-color: #d1e7dd; color: black; font-weight:bold "' : ""?>>
                                                                    <td class="text-center"><?php echo $rec['canNo'] ?></td>
                                                                    <td class="text-left" style=" padding-left: 15px; width:350px;">Ms. <?php echo $rec['fullname'] ?></td>
                                                                    <?php
                                                                    $total = 0;

                                                                    foreach ($rec['rating'] as $p) {
                                                                        $total += $p;
                                                                    ?>
                                                                        <td class="text-center" style=""><?php echo ($p != 0) ? $p : "0"; ?></td>

                                                                    <?php } ?>
                                                                    <td class="text-center" style=""><?php echo $rec['total']; ?></td>
                                                                    <td class="text-center" style="">
                                                                        <?php
                                                                            echo ($rec['total'] != 0) ? 
                                                                                (($rec['rank'] === 1) ? '1st' : (($rec['rank'] === 2) ? '2nd' : (($rec['rank'] === 3) ? '3rd' : $rec['rank'] . 'th'))) 
                                                                                : '';
                                                                        ?>
                                                                    </td>

                                                                </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        
                                            <div style="height: 100px;"></div>
                                        
                                        </div>
                                    <?php } ?>


                                    <?php if ($selected == "consolidated") {?>
                                        <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                                            <div class="ms-5 me-5">
                                                <div class="row">
                                                    <h3 class="mt-5 mb-4" style="text-align: center; font-weight:bold" class="text-uppercase">CONSOLIDATED RESULT</h3>
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
                                                                                    <td class="text-center" style="vertical-align: middle"><?php echo ($sum != 0) ? number_format( $sum, 1)  : ""; ?></td>
                                                                                <?php } ?>
                                                                                <td class="text-center" style="vertical-align: middle"><?php echo number_format($rec['overallTotal'], 1); ?></td>
                                                                            </tr>
                                                                    <?php  }
                                                                        } ?>
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
        </div>
    </div>
  
</div>
