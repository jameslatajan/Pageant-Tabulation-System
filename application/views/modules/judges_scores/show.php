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
        <div class="col-12">
            <h1 style="text-align: center; margin-top:20px; font-weight:bold">JUDGES SCORES</h1>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body pb-5">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="<?php echo site_url("judges_scores/judge/1") ?>" class="nav-link <?php echo ($selected == "judge1") ? "active" : "" ?>" id="prod-tab" data-bs-target="#production" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Judge 1</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("judges_scores/judge/2") ?>" class="nav-link <?php echo ($selected == "judge2") ? "active" : "" ?>" id="playsuit-tab" data-bs-target="#playsuit" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Judge 2</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("judges_scores/judge/3") ?>" class="nav-link <?php echo ($selected == "judge3") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Judge 3 (CHAIRMAN)</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("judges_scores/judge/4") ?>" class="nav-link <?php echo ($selected == "judge4") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Judge 4</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("judges_scores/judge/5") ?>" class="nav-link <?php echo ($selected == "judge5") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Judge 5</a>
                    </li>
                    <!-- <li class="nav-item" >
                            <a href="<?php echo site_url("judges_scores/interview") ?>" class="nav-link <?php echo ($selected == "interview") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Interview</a>
                        </li> -->
                    <!-- <li class="nav-item">
                        <a href="<?php echo site_url("consolidatedresult/production") ?>" class="nav-link text-secondary <?php echo ($selected == "production") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Consolidated Results</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("consolidatedresult/playsuit") ?>" class="nav-link text-secondary <?php echo ($selected == "playsuit") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Consolidated Results</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url("consolidatedresult/gown") ?>" class="nav-link text-secondary <?php echo ($selected == "gown") ? "active" : "" ?>" id="contact-tab" data-bs-target="#eveninggown" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Consolidated Results</a>
                    </li> -->
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                        <div class="ms-2 me-2">
                            <div class="row">
                                <h2 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Judge <?php echo $judge ?></h2>
                                <?php if ($selected == "judge1") { ?>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">PRODUCTION NUMBER</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($record)) {
                                                ?>

                                                    <?php
                                                    foreach ($record['production'] as $prod) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong> </td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">playsuit</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
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
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Evening Gown</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
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
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php if ($showInterview->value) { ?>
                                        <div class="col-4 pb-3">
                                            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Interview</h4>
                                            <table class="table table-collapse mt-4 mb-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-left">Candidate Name</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($record)) {
                                                    ?>

                                                        <?php
                                                        foreach ($record['interview'] as $prod) {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                                <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                                <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>

                                <?php } else if ($selected == "judge2") { ?>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">PRODUCTION NUMBER</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($record)) {
                                                ?>

                                                    <?php
                                                    foreach ($record['production'] as $prod) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">playsuit</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
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
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Evening Gown</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
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
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php if ($showInterview->value) { ?>
                                        <div class="col-4 pb-3">
                                            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Interview</h4>
                                            <table class="table table-collapse mt-4 mb-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-left">Candidate Name</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($record)) {
                                                    ?>

                                                        <?php
                                                        foreach ($record['interview'] as $prod) {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                                <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                                <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>

                                <?php } else if ($selected == "judge3") { ?>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">PRODUCTION NUMBER</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($record)) {
                                                ?>

                                                    <?php
                                                    foreach ($record['production'] as $prod) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">playsuit</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
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
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Evening Gown</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
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
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php if ($showInterview->value) { ?>
                                        <div class="col-4 pb-3">
                                            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Interview</h4>
                                            <table class="table table-collapse mt-4 mb-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-left">Candidate Name</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($record)) {
                                                    ?>

                                                        <?php
                                                        foreach ($record['interview'] as $prod) {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                                <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                                <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>

                                <?php } else if ($selected == "judge4") { ?>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">PRODUCTION NUMBER</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($record)) {
                                                ?>

                                                    <?php
                                                    foreach ($record['production'] as $prod) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">playsuit</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
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
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Evening Gown</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
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
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php if ($showInterview->value) { ?>
                                        <div class="col-4 pb-3">
                                            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Interview</h4>
                                            <table class="table table-collapse mt-4 mb-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-left">Candidate Name</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($record)) {
                                                    ?>

                                                        <?php
                                                        foreach ($record['interview'] as $prod) {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                                <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                                <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>
                                <?php } else if ($selected == "judge5") { ?>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">PRODUCTION NUMBER</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($record)) {
                                                ?>

                                                    <?php
                                                    foreach ($record['production'] as $prod) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">playsuit</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
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
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 pb-3">
                                        <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Evening Gown</h4>
                                        <table class="table table-collapse mt-4 mb-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-left">Candidate Name</th>
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
                                                            <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                            <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                            <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <?php if ($showInterview->value) { ?>
                                        <div class="col-4 pb-3">
                                            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold" class="text-uppercase">Interview</h4>
                                            <table class="table table-collapse mt-4 mb-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No.</th>
                                                        <th class="text-left">Candidate Name</th>
                                                        <th class="text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if (!empty($record)) {
                                                    ?>

                                                        <?php
                                                        foreach ($record['interview'] as $prod) {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><strong><?php echo $prod->canNo ?></strong></td>
                                                                <td class="text-left" style=" padding-left: 15px; width:350px;">Bb. <?php echo $prod->fullname ?></td>
                                                                <td class="text-center" style=""> <strong><?php if ($prod->score) echo $prod->score; ?></strong></td>

                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } ?>

                                <?php } else if ($selected == "consolidated") { ?>
                                    <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                                        <div class="ms-5 me-5">
                                            <div class="row">
                                                <h3 class="mt-4 mb-4" style="text-align: center; font-weight:bold" class="text-uppercase">CONSOLIDATED RESULT</h3>
                                                <?php if (!empty($record)) { ?>
                                                    <table class="table table-collapse">
                                                        <thead>
                                                            <tr class="text-center">
                                                                <th style="font-size:13px;">Rank</th>
                                                                <th style="font-size:13px;">Candidate Name</th>
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
                                                                $rank = 1;
                                                                foreach ($record as $rec) {

                                                            ?>
                                                                    <tr>
                                                                        <td class="text-center" style=""><strong> <?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                                                                        $rank . 'th'
                                                                                                                    ));
                                                                                                                    $rank++ ?> </strong></td>
                                                                        <td class="text-left" style=" padding-left: 15px;width:350px;"><strong><?php echo  ' #' . $rec['canNo'] ?></strong> Bb. <?php echo $rec['fullname'] ?></td>
                                                                        <?php
                                                                        foreach ($rec['judgeSum'] as $sum) {
                                                                        ?>
                                                                            <td class="text-center" style=""><?php echo ($sum != 0) ? $sum  : "0"; ?></td>
                                                                        <?php } ?>
                                                                        <td class="text-center" style=""><strong><?php if ($rec['overallTotal']) echo number_format($rec['overallTotal'], 1); ?></strong></td>
                                                                    </tr>
                                                            <?php   }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                <?php } ?>
                                                <div style="height: 50px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else if ($selected == "interview") { ?>
                                    <?php if ($showInterview->value) { ?>
                                        <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
                                            <div class="ms-5 me-5">
                                                <div class="row">
                                                    <h3 class="mt-5 mb-4" style="text-align: center; font-weight:bold" class="text-uppercase">Interview RESULT</h3>
                                                    <?php if (!empty($record)) { ?>
                                                        <table class="table table-collapse">
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th style="font-size:13px;">No.</th>
                                                                    <th style="font-size:13px;">Candidate Name</th>
                                                                    <?php if (!empty($judges)) {
                                                                        foreach ($judges as $j) {
                                                                    ?>
                                                                            <th style="font-size:13px;"><?php echo $j->judgeName; ?></th>

                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <th style="font-size:13px;">Total</th>
                                                                    <th style="font-size:13px;">Rank</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($record)) {
                                                                    $rank = 1;
                                                                    foreach ($record as $rec) {

                                                                ?>
                                                                        <tr>
                                                                            <td class="text-center"><strong><?php echo $rec['canNo'] ?></strong></td>
                                                                            <td class="text-left" style=" padding-left: 15px;width:350px;">Bb. <?php echo $rec['fullname'] ?></td>
                                                                            <?php
                                                                            foreach ($rec['judgeSum'] as $sum) {
                                                                            ?>
                                                                                <td class="text-center" style=""><?php echo ($sum != 0) ? $sum  : "0"; ?></td>
                                                                            <?php } ?>
                                                                            <td class="text-center" style=""><strong><strong><?php if ($rec['overallTotal']) echo number_format($rec['overallTotal'], 1); ?></strong></strong></td>
                                                                            <td class="text-center" style=""><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                                                                    $rank . 'th'
                                                                                                                ));
                                                                                                                $rank++ ?></td>
                                                                        </tr>
                                                                <?php   }
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    <?php } ?>
                                                    <div style="height: 50px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>