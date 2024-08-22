<style>
    .category-title {
        text-align: center;
        /* margin-bottom: 10px; */
        /* margin-top: 10px; */
        font-weight: bold;
        font-size: 15px;
        font-family: Arial, sans-serif;
    }

    .w-25 {
        width: 100px !important;
    }

    /* .category-width {
        padding-left: 120px;
        padding-right: 120px;
    } */

    .candidate-name-td,
    .candidate-rating-td,
    .candidate-rating-td-final {
        line-height: 22px;
        font-family: Arial, Helvetica, sans-serif;
        vertical-align: middle;
    }

    .candidate-name-td {
        font-size: 12px;
    }

    .candidate-name-td-final {
        font-size: 18px;
    }

    .candidate-rating-td {
        font-size: 12px;
        font-weight: bold;
    }

    .candidate-rating-td-final {
        font-size: 18px;
        font-weight: bold;
    }


    .candidate-th {
        font-size: 12px;
        text-transform: uppercase;
    }


    .rank-width {
        width: 50px;
    }

    .w-10 {
        width: 50px;
        border: 3px solid black;
    }
</style>

<?php $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 heading my-1">
            <h1 class="module-title text-center mt-2">MY SCORE</h1>
        </div>
    </div>

    <?php if ($isFinals->value) { ?>
        <div class="row mb-3">
            <div class="col-8 category-width mx-auto">
                <div class="card">
                    <div class="card-header category-title"> FINALS </div>
                    <div class="card-body">
                        <table class="table table-collapse table-sm mb-0">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <td class="rank-width candidate-th">Rank</td>
                                    <td class="w-25"></td>
                                    <td class="candidate-th">Candidate Name</td>
                                    <td class="candidate-th">Rating</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($finals_miss)) {
                                    $prevScore = null; // Keep track of the previous score
                                    $rank = 1; // Initialize rank

                                    foreach ($finals_miss as $row) {
                                        $abbreviation = "";

                                        if ($row->score) {
                                            // Check if the current score is different from the previous one
                                            if ($prevScore !== null && $row->score !== $prevScore) {
                                                $rank++; // Increment rank if the score is different
                                            }

                                            // Use the rank to generate an abbreviation
                                            if (($rank % 100) >= 11 && ($rank % 100) <= 13) {
                                                $abbreviation = $rank . 'th';
                                            } else {
                                                $abbreviation = $rank . $ends[$rank % 10];
                                            }
                                        }
                                        // Display the table row
                                ?>
                                        <tr>
                                            <td class="text-center candidate-rating-td-final"><?php echo $abbreviation ?></td>
                                            <td class="text-center"><img class="rounded-circle w-10" src="<?php echo $image_path . '/' . $row->canNo ?>" alt=""></td>
                                            <td class="text-left candidate-name-td-final"><?php echo '#' . $row->canNo . '  Ms. ' . $row->fullname  ?></td>
                                            <td class="text-center candidate-rating-td-final"><?php if ($row->score) echo $row->score ?></td>
                                        </tr>
                                <?php
                                        $prevScore = $row->score;
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <!-- Production -->
        <div class="row mb-3">
            <div class="col-4 category-width">
                <div class="card mb-3">
                    <div class="card-header category-title"> PRODUCTION NUMBER </div>
                    <div class="card-body">
                        <table class="table table-collapse table-sm mb-0">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <td class="rank-width candidate-th">Rank</td>
                                    <td class="candidate-th">Candidate Name</td>
                                    <td class="candidate-th">Rating</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($production_miss)) {
                                    $prevScore = null; // Keep track of the previous score
                                    $rank = 1; // Initialize rank

                                    foreach ($production_miss as $row) {
                                        $abbreviation = "";

                                        if ($row->score) {
                                            // Check if the current score is different from the previous one
                                            if ($prevScore !== null && $row->score !== $prevScore) {
                                                $rank++; // Increment rank if the score is different
                                            }

                                            // Use the rank to generate an abbreviation
                                            if (($rank % 100) >= 11 && ($rank % 100) <= 13) {
                                                $abbreviation = $rank . 'th';
                                            } else {
                                                $abbreviation = $rank . $ends[$rank % 10];
                                            }
                                        }

                                        // Display the table row
                                ?>
                                        <tr>
                                            <td class="text-center candidate-rating-td"><?php echo $abbreviation ?></td>
                                            <td class="text-left candidate-name-td"><?php echo '#' . $row->canNo . ' Ms. ' . $row->fullname ?></td>
                                            <td class="text-center candidate-rating-td" style=""><?php if ($row->score) echo $row->score ?></td>
                                        </tr>
                                <?php
                                        // Update the previous score for the next iteration
                                        $prevScore = $row->score;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4 category-width">
                <div class="card mb-3">
                    <div class="card-header category-title">CASUAL WEAR</div>
                    <div class="card-body">
                        <table class="table table-collapse table-sm mb-0">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <td class="rank-width candidate-th">Rank</td>
                                    <td class="candidate-th">Candidate Name</td>
                                    <td class="candidate-th">Rating</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($casual_miss)) {
                                    $prevScore = null; // Keep track of the previous score
                                    $rank = 1; // Initialize rank

                                    foreach ($casual_miss as $row) {
                                        $abbreviation = "";

                                        if ($row->score) {
                                            // Check if the current score is different from the previous one
                                            if ($prevScore !== null && $row->score !== $prevScore) {
                                                $rank++; // Increment rank if the score is different
                                            }

                                            // Use the rank to generate an abbreviation
                                            if (($rank % 100) >= 11 && ($rank % 100) <= 13) {
                                                $abbreviation = $rank . 'th';
                                            } else {
                                                $abbreviation = $rank . $ends[$rank % 10];
                                            }
                                        }

                                        // Display the table row
                                ?>
                                        <tr>
                                            <td class="text-center candidate-rating-td"><?php echo $abbreviation ?></td>
                                            <td class="text-left candidate-name-td"><?php echo '#' . $row->canNo . ' Ms. ' . $row->fullname ?></td>
                                            <td class="text-center candidate-rating-td" style=""><?php if ($row->score) echo $row->score ?></td>
                                        </tr>
                                <?php
                                        // Update the previous score for the next iteration
                                        $prevScore = $row->score;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4 category-width">
                <div class="card ">
                    <div class="card-header category-title"> PLAYSUIT </div>
                    <div class="card-body">
                        <table class="table table-collapse table-sm mb-0">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <td class="rank-width candidate-th">Rank</td>
                                    <td class="candidate-th">Candidate Name</td>
                                    <td class="candidate-th">Rating</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($playsuit_miss)) {
                                    $prevScore = null; // Keep track of the previous score
                                    $rank = 1; // Initialize rank

                                    foreach ($playsuit_miss as $row) {
                                        $abbreviation = "";

                                        if ($row->score) {
                                            // Check if the current score is different from the previous one
                                            if ($prevScore !== null && $row->score !== $prevScore) {
                                                $rank++; // Increment rank if the score is different
                                            }

                                            // Use the rank to generate an abbreviation
                                            if (($rank % 100) >= 11 && ($rank % 100) <= 13) {
                                                $abbreviation = $rank . 'th';
                                            } else {
                                                $abbreviation = $rank . $ends[$rank % 10];
                                            }
                                        }

                                        // Display the table row
                                ?>
                                        <tr>
                                            <td class="text-center candidate-rating-td"><?php echo $abbreviation ?></td>
                                            <td class="text-left candidate-name-td"><?php echo '#' . $row->canNo . ' Ms. ' . $row->fullname ?></td>
                                            <td class="text-center candidate-rating-td" style=""><?php if ($row->score) echo $row->score ?></td>
                                        </tr>
                                <?php
                                        // Update the previous score for the next iteration
                                        $prevScore = $row->score;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-4 category-width">
                <div class="card mb-3">
                    <div class="card-header category-title">SPORTS WEAR</div>
                    <div class="card-body">
                        <table class="table table-collapse table-sm mb-0">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <td class="rank-width candidate-th">Rank</td>
                                    <td class="candidate-th">Candidate Name</td>
                                    <td class="candidate-th">Rating</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($sports_miss)) {
                                    $prevScore = null; // Keep track of the previous score
                                    $rank = 1; // Initialize rank

                                    foreach ($sports_miss as $row) {
                                        $abbreviation = "";

                                        if ($row->score) {
                                            // Check if the current score is different from the previous one
                                            if ($prevScore !== null && $row->score !== $prevScore) {
                                                $rank++; // Increment rank if the score is different
                                            }

                                            // Use the rank to generate an abbreviation
                                            if (($rank % 100) >= 11 && ($rank % 100) <= 13) {
                                                $abbreviation = $rank . 'th';
                                            } else {
                                                $abbreviation = $rank . $ends[$rank % 10];
                                            }
                                        }

                                        // Display the table row
                                ?>
                                        <tr>
                                            <td class="text-center candidate-rating-td"><?php echo $abbreviation ?></td>
                                            <td class="text-left candidate-name-td"><?php echo '#' . $row->canNo . ' Ms. ' . $row->fullname ?></td>
                                            <td class="text-center candidate-rating-td" style=""><?php if ($row->score) echo $row->score ?></td>
                                        </tr>
                                <?php
                                        // Update the previous score for the next iteration
                                        $prevScore = $row->score;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4 category-width">
                <div class="card mb-3">
                    <div class="card-header category-title">UNIFORM</div>
                    <div class="card-body">
                        <table class="table table-collapse table-sm mb-0">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <td class="rank-width candidate-th">Rank</td>
                                    <td class="candidate-th">Candidate Name</td>
                                    <td class="candidate-th">Rating</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($uniform_miss)) {
                                    $prevScore = null; // Keep track of the previous score
                                    $rank = 1; // Initialize rank

                                    foreach ($uniform_miss as $row) {
                                        $abbreviation = "";

                                        if ($row->score) {
                                            // Check if the current score is different from the previous one
                                            if ($prevScore !== null && $row->score !== $prevScore) {
                                                $rank++; // Increment rank if the score is different
                                            }

                                            // Use the rank to generate an abbreviation
                                            if (($rank % 100) >= 11 && ($rank % 100) <= 13) {
                                                $abbreviation = $rank . 'th';
                                            } else {
                                                $abbreviation = $rank . $ends[$rank % 10];
                                            }
                                        }

                                        // Display the table row
                                ?>
                                        <tr>
                                            <td class="text-center candidate-rating-td"><?php echo $abbreviation ?></td>
                                            <td class="text-left candidate-name-td"><?php echo '#' . $row->canNo . ' Ms. ' . $row->fullname ?></td>
                                            <td class="text-center candidate-rating-td" style=""><?php if ($row->score) echo $row->score ?></td>
                                        </tr>
                                <?php
                                        // Update the previous score for the next iteration
                                        $prevScore = $row->score;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-4 category-width">
                <div class="card mb-3">
                    <div class="card-header category-title">TOURISM</div>
                    <div class="card-body">
                        <table class="table table-collapse table-sm mb-0">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <td class="rank-width candidate-th">Rank</td>
                                    <td class="candidate-th">Candidate Name</td>
                                    <td class="candidate-th">Rating</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($tourism_miss)) {
                                    $prevScore = null; // Keep track of the previous score
                                    $rank = 1; // Initialize rank

                                    foreach ($tourism_miss as $row) {
                                        $abbreviation = "";

                                        if ($row->score) {
                                            // Check if the current score is different from the previous one
                                            if ($prevScore !== null && $row->score !== $prevScore) {
                                                $rank++; // Increment rank if the score is different
                                            }

                                            // Use the rank to generate an abbreviation
                                            if (($rank % 100) >= 11 && ($rank % 100) <= 13) {
                                                $abbreviation = $rank . 'th';
                                            } else {
                                                $abbreviation = $rank . $ends[$rank % 10];
                                            }
                                        }

                                        // Display the table row
                                ?>
                                        <tr>
                                            <td class="text-center candidate-rating-td"><?php echo $abbreviation ?></td>
                                            <td class="text-left candidate-name-td"><?php echo '#' . $row->canNo . ' Ms. ' . $row->fullname ?></td>
                                            <td class="text-center candidate-rating-td" style=""><?php if ($row->score) echo $row->score ?></td>
                                        </tr>
                                <?php
                                        // Update the previous score for the next iteration
                                        $prevScore = $row->score;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12 category-width d-flex justify-content-center">
                <div class="card mb-3 w-50">
                    <div class="card-header category-title">EVENING GOWN</div>
                    <div class="card-body">
                        <table class="table table-collapse table-sm mb-0">
                            <thead>
                                <tr class="text-center fw-bold">
                                    <td class="rank-width candidate-th">Rank</td>
                                    <td class="candidate-th">Candidate Name</td>
                                    <td class="candidate-th">Rating</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($gown_miss)) {
                                    $prevScore = null; // Keep track of the previous score
                                    $rank = 1; // Initialize rank

                                    foreach ($gown_miss as $row) {
                                        $abbreviation = "";

                                        if ($row->score) {
                                            // Check if the current score is different from the previous one
                                            if ($prevScore !== null && $row->score !== $prevScore) {
                                                $rank++; // Increment rank if the score is different
                                            }

                                            // Use the rank to generate an abbreviation
                                            if (($rank % 100) >= 11 && ($rank % 100) <= 13) {
                                                $abbreviation = $rank . 'th';
                                            } else {
                                                $abbreviation = $rank . $ends[$rank % 10];
                                            }
                                        }

                                        // Display the table row
                                ?>
                                        <tr>
                                            <td class="text-center candidate-rating-td"><?php echo $abbreviation ?></td>
                                            <td class="text-left candidate-name-td"><?php echo '#' . $row->canNo . ' Ms. ' . $row->fullname ?></td>
                                            <td class="text-center candidate-rating-td" style=""><?php if ($row->score) echo $row->score ?></td>
                                        </tr>
                                <?php
                                        // Update the previous score for the next iteration
                                        $prevScore = $row->score;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>