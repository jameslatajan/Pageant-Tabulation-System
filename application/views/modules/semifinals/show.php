<div class="container-fluid">
    <!-- controller page  -->
    <input type="hidden" name="controller_page" id="controller_page" value="<?php echo $controller_page ?>">
    <!-- miss routes -->
    <input type="hidden" name="get_miss" id="get_miss" value="<?php echo $get_miss ?>">
    <input type="hidden" name="get_miss_rating" id="get_miss_rating" value="<?php echo $get_miss_rating ?>">
    <input type="hidden" name="save_miss_rating" id="save_miss_rating" value="<?php echo $save_miss_rating ?>">

    <div class="row">
        <input type="hidden" name="judgeID" id="judgeID" value="<?php echo $judgeID ?>">
        <div class="col-12 heading my-2">
            <h1 class="module-title"><?php echo strtoupper($module_title) ?></h1>
        </div>
    </div>

    <div class="row nav-pills ms-ul pills-tab">
        <!-- START MS link -->
        <div class="col-4 ms_start">
            <h5 class="text-center mb-0 candidates-label">CANDIDATES</h5>
            <ul class="nav" id="pills-tab1">
                <?php foreach ($miss_can as $miss) { ?>
                    <li class="nav-item ms-item ms_tab">
                        <button class="nav-link ms-link candidate-links-semi-final mx-1" type="button" id="ms_<?php echo $miss->canNo ?>" title="<?php echo $miss->canNo ?>" data-bs-toggle="pill"><?php echo $miss->canNo ?></button>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <!-- START MS Tab -->
        <div class="col-8 ms_start">
            <!-- candidate content start -->
            <div class="candidate-content" id="ms_content">
                <div class="card candidate-card mb-2">
                    <div class="card-body candidate-body text-center">
                        <div class="image-box">
                            <span class="notify-badge">
                                <p class="notify-text" id="ms_badge"></p>
                            </span>
                            <img src="" alt="" class="can_image" id="ms_img" ver=1>
                        </div>
                    </div>
                </div>

                <div class="card candidate-name-card mb-2">
                    <div class="card-body candidate-name-body text-center">
                        <h2 id="ms_name" class="candidate-name">MISS BGFC</h2>
                        <h3 id="ms_remarks" class="candidate-remarks mb-0"></h3>
                    </div>
                </div>

                <div class="card score-card">
                    <div class="card-body score-body">
                        <div class="table-responsive">
                            <table class="table table-borderless table-lg mb-0 criteria-table ">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <ul style="padding-left: inherit; font-size: 13px !important">
                                                <li>Beauty/Substance (Pleasing and impressive qualities, attractiveness or satisfying feature, Projection & Confidence) 60%</li>
                                                <li>Intelligence/Wit 40%</li>
                                            </ul>
                                        </td>
                                        <td class="score-name text-center pt-3">RATING:</td>
                                        <td class="score-value text-center w-25 pt-3">
                                            <select class="form-control select-2" name="ms_score" id="ms_score"></select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- candidate content end -->
        </div>
        <!-- END MS Tab -->

        
    </div>
</div>