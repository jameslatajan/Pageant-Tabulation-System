<style>
    .table {
        width: 100%;
    }

    .table td {
        font-size: 15px !important;
        font-weight: bold;
        text-transform: uppercase;
    }


    .col-6 {
        padding-left: 3.5rem;
        padding-right: 3.5rem;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">RESULTS</h1>
        </div>
    </div>

    <h3 class="text-uppercase" style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN EACH CATEGORIES</h3>
    <!-- PRODUCTION -->
    <div class="row">
        <h5 class="text-uppercase " style="text-align: center; margin-bottom:17px; font-weight:bold">BEST IN PRODUCTION</h5>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Candidate No.</th>
                        <th>MISTER</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php if ($best_mr_list['production'][1]['total'] != 0) { ?>
                            <td class="text-center">
                                <?php echo $best_mr_list['production'][1]['canNo'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $best_mr_list['production'][1]['fullname'] ?>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td class="text-center">
                            </td>
                            <td class="text-center">
                            </td>
                        <?php
                        } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Candidate No.</th>
                        <th>MISS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php if ($best_ms_list['production'][1]['total'] != 0) { ?>
                            <td class="text-center">
                                <?php echo $best_ms_list['production'][1]['canNo'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $best_ms_list['production'][1]['fullname'] ?>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td class="text-center">
                            </td>
                            <td class="text-center">
                            </td>
                        <?php
                        } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-3"></div>
    </div>

    <!--UNIFORM -->
    <div class="row">
        <h5 class="text-uppercase" style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN SCHOOL UNIFORM</h5>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Candidate No.</th>
                        <th>MISTER</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php if ($best_mr_list['uniform'][1]['total'] != 0) { ?>
                            <td class="text-center">
                                <?php echo $best_mr_list['uniform'][1]['canNo'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $best_mr_list['uniform'][1]['fullname'] ?>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td class="text-center">
                            </td>
                            <td class="text-center">
                            </td>
                        <?php
                        } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Candidate No.</th>
                        <th>MISS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php if ($best_ms_list['uniform'][1]['total'] != 0) { ?>
                            <td class="text-center">
                                <?php echo $best_ms_list['uniform'][1]['canNo'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $best_ms_list['uniform'][1]['fullname'] ?>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td class="text-center">
                            </td>
                            <td class="text-center">
                            </td>
                        <?php
                        } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-3"></div>
    </div>

    <!--SPORTSWEAR -->
    <div class="row">
        <h5 class="text-uppercase" style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN SPORTSWEAR</h5>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Candidate No.</th>
                        <th>MISTER</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php if ($best_mr_list['sportsware'][1]['total'] != 0) { ?>
                            <td class="text-center">
                                <?php echo $best_mr_list['sportsware'][1]['canNo'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $best_mr_list['sportsware'][1]['fullname'] ?>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td class="text-center">
                            </td>
                            <td class="text-center">
                            </td>
                        <?php
                        } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Candidate No.</th>
                        <th>MISS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php if ($best_ms_list['sportsware'][1]['total'] != 0) { ?>
                            <td class="text-center">
                                <?php echo $best_ms_list['sportsware'][1]['canNo'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $best_ms_list['sportsware'][1]['fullname'] ?>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td class="text-center">
                            </td>
                            <td class="text-center">
                            </td>
                        <?php
                        } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-3"></div>
    </div>

    <!-- FORMAL -->
    <div class="row">
        <h5 class="text-uppercase" style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">BEST IN FORMAL</h5>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Candidate No.</th>
                        <th>MISTER</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php if ($best_mr_list['formal'][1]['total'] != 0) { ?>
                            <td class="text-center">
                                <?php echo $best_mr_list['formal'][1]['canNo'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $best_mr_list['formal'][1]['fullname'] ?>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td class="text-center">
                            </td>
                            <td class="text-center">
                            </td>
                        <?php
                        } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Candidate No.</th>
                        <th>MISS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php if ($best_ms_list['formal'][1]['total'] != 0) { ?>
                            <td class="text-center">
                                <?php echo $best_ms_list['formal'][1]['canNo'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $best_ms_list['formal'][1]['fullname'] ?>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td class="text-center">
                            </td>
                            <td class="text-center">
                            </td>
                        <?php
                        } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-3"></div>
    </div>

    <div class="row mt-5 mb-5">
        <h3 class="text-uppercase" style="text-align: center; margin-bottom:17px; margin-top:20px; font-weight:bold">MR. AND MS. BGFC TOP 3</h3>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Candidate No.</th>
                        <th>MISTER</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (($mr_top[0]['overallTotal'] != 0)) {
                        foreach ($mr_top as $mr) {
                    ?>
                            <tr>
                                <td class="text-center" style="width:150px;">
                                    <?php echo $mr['canNo'] ?>
                                </td>
                                <td class="text-left" style="width:300px; padding-left: 30px;">
                                    <?php echo $mr['fullname'] ?>
                                </td>
                                <td class="text-center" style="">
                                    <?php echo number_format($mr['overallTotal'], 1); ?>
                                </td>
                            </tr>
                        <?php   }
                    } else {  ?>
                        <tr>
                            <td class="text-center" style="width:150px;">
                            </td>
                            <td class="text-left" style="width:300px; padding-left: 30px;">
                            </td>
                            <td class="text-center" style="">
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Candidate No.</th>
                        <th>MISS</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (($ms_top[0]['overallTotal'] != 0)) {
                        foreach ($ms_top as $mr) {
                    ?>
                            <tr>
                                <td class="text-center" style="width:150px;">
                                    <?php echo $mr['canNo'] ?>
                                </td>
                                <td class="text-left" style="width:300px; padding-left: 30px;">
                                    <?php echo $mr['fullname'] ?>
                                </td>
                                <td class="text-center" style="">
                                    <?php echo number_format($mr['overallTotal'], 1); ?>
                                </td>
                            </tr>
                        <?php   }
                    } else {  ?>
                        <tr>
                            <td class="text-center" style="width:150px;">
                            </td>
                            <td class="text-left" style="width:300px; padding-left: 30px;">
                            </td>
                            <td class="text-center" style="">
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- <button class="btn btn-primary" id="setFinals">Set Finals</button> -->
    <!-- <a href="<?php echo site_url('consolidatesummary/getFinals') ?>" class="btn btn-primary" type="button">Generate</a> -->
    <!-- <a href="<?php echo site_url('consolidatebestresult/print_best_result') ?>" class="btn btn-primary mt-5 mb-5 ms-3" type="button">Generate Best Result</a>
    <a href="<?php echo site_url('consolidatebestresult/print_top3_result') ?>" class="btn btn-primary mt-5 mb-5 ms-3" type="button">Generate Top 3 Result</a> -->
</div>

<!-- <script>
    $('#setFinals').on('click', function() {
        Swal.fire({
            title: 'Confirm set finals?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#1ecbe1',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#setFinals').attr('disable', true);
                window.location.href = "<?php echo site_url('consolidatesummary/getFinals') ?>"
            }
        })
    });
</script> -->