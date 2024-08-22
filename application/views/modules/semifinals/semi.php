<style>
    .w-10 {
        width: 50px;
        border: 3px solid black;
    }
</style>

<div class="container-fluid">
    <!-- controller page  -->
    <input type="hidden" name="controller_page" id="controller_page" value="<?php echo $controller_page ?>">
    <!-- miss routes -->
    <input type="hidden" name="get_miss" id="get_miss" value="<?php echo $get_miss ?>">
    <input type="hidden" name="get_miss_rating" id="get_miss_rating" value="<?php echo $get_miss_rating ?>">
    <input type="hidden" name="save_miss_rating" id="save_miss_rating" value="<?php echo $save_miss_rating ?>">

    <!-- <div class="row">
        <input type="hidden" name="judgeID" id="judgeID" value="<?php echo $judgeID ?>">
        <div class="col-12 heading my-2 mt-4">
            <h1 class="module-title">TOP 10 SEMIFINALISTS CONSOLIDATED RESULTS</h1>
        </div>
    </div> -->

    <div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="prod-tab" tabindex="0">
        <div class="ms-5 me-5 pb-5">
            <div class="row">
                <h2 class="mt-5 mb-4" style="text-align: center; font-weight:bold" class="text-uppercase">TOP TEN SEMIFINALISTS CONSOLIDATED RESULTS</h2>
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($record)) { ?>
                            <table class="table table-collapse mt-4">
                                <thead>
                                    <tr class="text-center">
                                        <th style="font-size:px;">No.</th>
                                        <th style="font-size:px;">Candidate Name</th>
                                        <?php if (!empty($judges)) {
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
                                    $rank = 1;
                                    foreach ($record as $rec) {

                                    ?>
                                        <tr>
                                            <?php if ($rec['total'] != 0) {?>
                                                <th class="text-center" style="vertical-align:middle" style=""><?php echo ($rec['rank'] === 1)    ? '1st'     : (($rec['rank'] === 2)   ? '2nd'     : (($rec['rank'] === 3)   ? '3rd'     :
                                                                                                                    $rec['rank'] . 'th'
                                                                                                                ));
                                                                                                                ?></th>
                                            <?php } else {?>
                                                <td></td>
                                            <?php }?>
                                            <th class="text-left" style=" padding-left: 15px;width:550px;"><img class="rounded-circle w-10" src="<?php echo $image_path . '/' . $rec['canNo'] ?>" alt=""><span style="padding-left: 20px;"> #<?php echo $rec['canNo'] ?> Bb. <?php echo $rec['fullname'] ?></span></th>
                                            <?php
                                            $total = 0;

                                            foreach ($rec['rating'] as $p) {
                                                $total += $p;
                                            ?>
                                                <th class="text-center" style="vertical-align:middle" style=""><?php echo ($p != 0) ? $p : ""; ?></th>

                                            <?php } ?>
                                            <th class="text-center" style="vertical-align:middle" style=""> <?php if ($rec['total']) echo $rec['total']; ?></th>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>