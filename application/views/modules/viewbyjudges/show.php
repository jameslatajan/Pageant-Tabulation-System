<style>
    .table td {
        font-size: 10px;
    }

    .table th {
        font-size: 10px !important;
    }
</style>

<div class="container-fluid">
    <!-- <div class="row">
        <div class="col-12">
            <h1 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">CONSOLIDATED RESULTS BY JUDGES</h1>
        </div>
    </div> -->

    <!-- Production -->
    <div class="row">
        <div class="col-6">
            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN PRODUCTION (MISTER)</h4>
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
                    // var_dump($production_mr)
                    if (!empty($production_mr)) {
                        $rank = 1;
                        foreach ($production_mr as $prod) {

                    ?>
                            <tr>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $prod['canNo'] ?></td>
                                <td class="text-center" style="width:350px;<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $prod['fullname'] ?></td>
                                <?php
                                $total = 0;

                                foreach ($prod['rating'] as $p) {
                                    $total += $p;
                                ?>
                                    <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($p != 0) ? $p : "0"; ?></td>
                                <?php } ?>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $prod['total']; ?></td>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                        $rank . 'th'
                                                                    ));
                                                                    $rank++ ?></td>

                            </tr>
                    <?php   }
                    } ?>
                </tbody>
            </table>
        </div>

        <div class="col-6">
            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN PRODUCTION (MISS)</h4>
            <table class="table table-bordered ">
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
                    // var_dump($production_mr)
                    if (!empty($production_ms)) {
                        $rank = 1;
                        foreach ($production_ms as $prod) {

                    ?>
                            <tr>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $prod['canNo'] ?></td>
                                <td class="text-center" style="width:350px;<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $prod['fullname'] ?></td>
                                <?php
                                $total = 0;

                                foreach ($prod['rating'] as $p) {
                                    $total += $p;
                                ?>
                                    <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($p != 0) ? $p : "0"; ?></td>

                                <?php } ?>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $prod['total']; ?></td>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                        $rank . 'th'
                                                                    ));
                                                                    $rank++ ?></td>

                            </tr>
                    <?php   }
                    } ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Uniform -->
    <div class="row">
        <div class="col-6">
            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN SCHOOL UNIFORM (MISTER)</h4>
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
                <tbody>
                    <?php
                    if (!empty($uniform_mr)) {
                        $rank = 1;
                        foreach ($uniform_mr as $uni) {

                    ?>
                            <tr>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $uni['canNo'] ?></td>
                                <td class="text-center" style="width:350px;<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $uni['fullname'] ?></td>
                                <?php
                                $total = 0;

                                foreach ($uni['rating'] as $p) {
                                    $total += $p;
                                ?>
                                    <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($p != 0) ? $p : "0"; ?></td>
                                <?php } ?>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $uni['total']; ?></td>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                        $rank . 'th'
                                                                    ));
                                                                    $rank++ ?></td>

                            </tr>
                    <?php   }
                    } ?>
                </tbody>
                </tbody>
            </table>
        </div>

        <div class="col-6">
            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN SCHOOL UNIFORM (MISS)</h4>
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
                    if (!empty($uniform_ms)) {
                        $rank = 1;
                        foreach ($uniform_ms as $uni) {

                    ?>
                            <tr>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $uni['canNo'] ?></td>
                                <td class="text-center" style="width:350px;<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $uni['fullname'] ?></td>
                                <?php
                                $total = 0;

                                foreach ($uni['rating'] as $p) {
                                    $total += $p;
                                ?>
                                    <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($p != 0) ? $p : "0"; ?></td>
                                <?php } ?>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $uni['total']; ?></td>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                        $rank . 'th'
                                                                    ));
                                                                    $rank++ ?></td>

                            </tr>
                    <?php   }
                    } ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Sports Wear -->
    <div class="row">
        <div class="col-6">
            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN SPORTS WEAR (MISTER)</h4>
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
                    if (!empty($sportswear_mr)) {
                        $rank = 1;
                        foreach ($sportswear_mr as $sport) {

                    ?>
                            <tr>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $sport['canNo'] ?></td>
                                <td class="text-center" style="width:350px;<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $sport['fullname'] ?></td>
                                <?php
                                $total = 0;

                                foreach ($sport['rating'] as $p) {
                                    $total += $p;
                                ?>
                                    <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($p != 0) ? $p : "0"; ?></td>
                                <?php } ?>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $sport['total']; ?></td>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                        $rank . 'th'
                                                                    ));
                                                                    $rank++ ?></td>

                            </tr>
                    <?php   }
                    } ?>
                </tbody>
            </table>
        </div>

        <div class="col-6">
            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN SPORTS WEAR (MISS)</h4>
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
                    if (!empty($sportswear_ms)) {
                        $rank = 1;
                        foreach ($sportswear_ms as $sport) {

                    ?>
                            <tr>
                                <td class="text-center"><?php echo $sport['canNo'] ?></td>
                                <td class="text-center" style="width:350px;"><?php echo $sport['fullname'] ?></td>
                                <?php
                                $total = 0;

                                foreach ($sport['rating'] as $p) {
                                    $total += $p;
                                ?>
                                    <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($p != 0) ? $p : "0"; ?></td>
                                <?php } ?>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $sport['total']; ?></td>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                        $rank . 'th'
                                                                    ));
                                                                    $rank++ ?></td>

                            </tr>
                    <?php   }
                    } ?>
                </tbody>
            </table>
        </div>

    </div>


    <!-- FORMAL Wear -->
    <div class="row">
        <div class="col-6">
            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN FORMAL (MISTER)</h4>
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
                    if (!empty($formal_mr)) {
                        $rank = 1;
                        foreach ($formal_mr as $formal) {

                    ?>
                            <tr>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $formal['canNo'] ?></td>
                                <td class="text-center" style="width:350px;<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $formal['fullname'] ?></td>
                                <?php
                                $total = 0;

                                foreach ($formal['rating'] as $p) {
                                    $total += $p;
                                ?>
                                    <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($p != 0) ? $p : "0"; ?></td>
                                <?php } ?>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $formal['total']; ?></td>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                        $rank . 'th'
                                                                    ));
                                                                    $rank++ ?></td>

                            </tr>
                    <?php   }
                    } ?>
                </tbody>
            </table>
        </div>

        <div class="col-6">
            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN GOWN (MISS)</h4>
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
                    if (!empty($formal_ms)) {
                        $rank = 1;
                        foreach ($formal_ms as $formal) {

                    ?>
                            <tr>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $formal['canNo'] ?></td>
                                <td class="text-center" style="width:350px;<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $formal['fullname'] ?></td>
                                <?php
                                $total = 0;

                                foreach ($formal['rating'] as $p) {
                                    $total += $p;
                                ?>
                                    <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($p != 0) ? $p : "0"; ?></td>
                                <?php } ?>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $formal['total']; ?></td>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                        $rank . 'th'
                                                                    ));
                                                                    $rank++ ?></td>

                            </tr>
                    <?php   }
                    } ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- INTERVIEW -->
    <div class="row">
        <div class="col-6">
            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">PRELIMINARY INTERVIEW (MISTER)</h4>
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
                    if (!empty($interview_mr)) {
                        $rank = 1;
                        foreach ($interview_mr as $inter) {

                    ?>
                            <tr>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $inter['canNo'] ?></td>
                                <td class="text-center" style="width:350px;<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $inter['fullname'] ?></td>
                                <?php
                                $total = 0;

                                foreach ($inter['rating'] as $p) {
                                    $total += $p;
                                ?>
                                    <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($p != 0) ? $p : "0"; ?></td>
                                <?php } ?>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $inter['total']; ?></td>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                        $rank . 'th'
                                                                    ));
                                                                    $rank++ ?></td>

                            </tr>
                    <?php   }
                    } ?>
                </tbody>
            </table>
        </div>

        <div class="col-6 last" id="last">
            <h4 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">PRELIMINARY INTERVIEW (MISS)</h4>
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
                    if (!empty($interview_ms)) {
                        $rank = 1;
                        foreach ($interview_ms as $inter) {

                    ?>
                            <tr>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $inter['canNo'] ?></td>
                                <td class="text-center" style="width:350px;<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $inter['fullname'] ?></td>
                                <?php
                                $total = 0;

                                foreach ($inter['rating'] as $p) {
                                    $total += $p;
                                ?>
                                    <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($p != 0) ? $p : "0"; ?></td>
                                <?php } ?>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo $inter['total']; ?></td>
                                <td class="text-center" style="<?php if($rank == 1){echo 'font-weight:bold; color:green';}?>"><?php echo ($rank === 1)    ? '1st'     : (($rank === 2)   ? '2nd'     : (($rank === 3)   ? '3rd'     :
                                                                        $rank . 'th'
                                                                    ));
                                                                    $rank++ ?></td>

                            </tr>
                    <?php   }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- <script>

    function reloadPage() {
        location.reload()
    }

    setTimeout(reloadPage, 2000);
</script> -->