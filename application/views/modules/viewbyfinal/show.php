<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">FINALS Q AND A</h1>
        </div>

        <!-- Production -->
        <div class="row">
            <div class="col-10">
                <h4 class="text-uppercase" style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">MISTER bgfc</h4>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th style="font-size:13px;">No.</th>
                                    <th style="font-size:13px;">Candidate's Name</th>
                                    <th style="font-size:13px;">Judge 1</th>
                                    <th style="font-size:13px;">Judge 2</th>
                                    <th style="font-size:13px;">Judge 3</th>
                                    <th style="font-size:13px;">Judge 4</th>
                                    <th style="font-size:13px;">Judge 5</th>
                                    <th style="font-size:13px;">Total</th>
                                    <th style="font-size:13px;">Rank</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($mrtop3)) {
                                    $rank = 1;
                                    foreach ($mrtop3 as $mr) {

                                ?>
                                        <tr>
                                            <td class="text-center"><?php echo $mr['canNo'] ?></td>
                                            <td class="text-left" style="margin-left:20px; width:200px;"><?php echo $mr['fullname'] ?></td>
                                            <?php
                                            foreach ($mr['judgeSum'] as $m) {
                                            ?>
                                                <td class="text-center" style=""><?php echo ($m != 0) ? $m  : "0"; ?></td>
                                            <?php } ?>
                                            <td class="text-center" style=""><?php echo number_format($mr['overallTotal'], 1); ?></td>
                                            <td class="text-center" style=""><?php echo ($mr['overallTotal'] != 0 && $rank === 1)    ? 'MR. BGFC 2023'     : (($mr['overallTotal'] != 0 && $rank === 2)   ? '1st Runner Up'     : (($mr['overallTotal'] != 0 && $rank === 3)   ? '2nd Runner Up' : ""));
                                                                                $rank++ ?></td>
                                        </tr>
                                <?php   }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>

            <div class="col-1"></div>
            <div class="col-10">
                <h4 class="text-uppercase" style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">MISs bgfc</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th style="font-size:13px;">No.</th>
                            <th style="font-size:13px;">Candidate's Name</th>
                            <th style="font-size:13px;">Judge 1</th>
                            <th style="font-size:13px;">Judge 2</th>
                            <th style="font-size:13px;">Judge 3</th>
                            <th style="font-size:13px;">Judge 4</th>
                            <th style="font-size:13px;">Judge 5</th>
                            <th style="font-size:13px;">Total</th>
                            <th style="font-size:13px;">Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($mstop3)) {
                            $rank = 1;
                            foreach ($mstop3 as $ms) {

                        ?>
                                <tr>
                                    <td class="text-center"><?php echo $ms['canNo'] ?></td>
                                    <td class="text-left" style="margin-left:20px; width:200px;"><?php echo $ms['fullname'] ?></td>
                                    <?php
                                    foreach ($ms['judgeSum'] as $m) {
                                    ?>
                                        <td class="text-center" style=""><?php echo ($m != 0) ? $m  : "0"; ?></td>
                                    <?php } ?>
                                    <td class="text-center" style=""><?php echo number_format($ms['overallTotal'], 1); ?></td>
                                    <td class="text-center" style=""><?php echo ($ms['overallTotal'] != 0 && $rank === 1)    ? 'MS. BGFC 2023'     : (($ms['overallTotal'] != 0 && $rank === 2)   ? '1st Runner Up'     : (($ms['overallTotal'] != 0 && $rank === 3)   ? '2nd Runner Up' : ""));
                                                                        $rank++ ?></td>
                                </tr>
                        <?php   }
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <!-- <a href="<?php echo site_url('consolidatefinal/print_final_result') ?>" class="btn btn-primary mt-5 mb-5 ms-5" type="button">Generate Final Result</a> -->
</div>