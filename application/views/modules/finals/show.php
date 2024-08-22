<div class="container-fluid">
    <!-- controller page  -->
    <input type="hidden" name="controller_page" id="controller_page" value="<?php echo $controller_page ?>">
    <!-- miss routes -->
    <input type="hidden" name="get_miss" id="get_miss" value="<?php echo $get_miss ?>">
    <input type="hidden" name="get_miss_rating" id="get_miss_rating" value="<?php echo $get_miss_rating ?>">
    <input type="hidden" name="save_miss_rating" id="save_miss_rating" value="<?php echo $save_miss_rating ?>">
    <input type="hidden" name="judgeID" id="judgeID" value="<?php echo $judgeID ?>">


    <!-- <div class="row">
        <div class="col-12 heading my-2">
            <h1 class="module-title"><?php echo strtoupper($module_title) ?></h1>
        </div>
    </div> -->

    <div class="row nav-pills ms-ul pills-tab">
        <!-- START MS link -->
        <div class="col-4 ms_start">
            <h5 class="text-center mb-0 candidates-label mt-5">CANDIDATES</h5>
            <ul class="nav" id="pills-tab1">
                <?php foreach ($miss_can as $miss) { ?>
                    <li class="nav-item ms-item ms_tab">
                        <button class="nav-link ms-link candidate-links-final mx-1" type="button" id="ms_<?php echo $miss->canNo ?>" title="<?php echo $miss->canNo ?>" data-bs-toggle="pill"><?php echo $miss->canNo ?></button>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <!-- START MS Tab -->
        <div class="col-8 ms_start">
            <div class="text-center heading mt-2">
                <h1 class="module-title"><?php echo strtoupper($module_title) ?></h1>
            </div>

            <!-- <div class="candidate-content" id="ms_content">
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
                                                <li>Content of the answer 50%</li>
                                                <li>Delivery of speech 25%</li>
                                                <li>Confidence and Overall Presence 25%</li>
                                            </ul>
                                        </td>
                                        <td class="score-name text-center">RATING:</td>
                                        <td class="score-value text-center w-25">
                                            <select class="form-control select-2" name="ms_score" id="ms_score"></select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->
            
            <!-- candidate content start -->
            <div class="card candidate-content" id="ms_content">
                <div class="image-box d-flex justify-content-center">
                    <span class="notify-badge">
                        <p class="notify-text" id="ms_badge"></p>
                    </span>
                    <img src="" alt="" class="can_image card-img-top" id="ms_img" ver=1>
                </div>
                <div class="card-body p-0">
                    <div class="candidate-name-card text-center">
                        <h2 id="ms_name" class="candidate-name">MISS BGFC</h2>
                        <h3 id="ms_remarks" class="candidate-remarks mb-0"></h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless table-lg mb-0 criteria-table ">
                            <tbody>
                                <tr>
                                    <td style="width:240px">
                                        <ul style="padding-left: inherit; font-size: 13px !important">
                                            <li>Content of the answer 50%</li>
                                            <li>Delivery of speech 25%</li>
                                            <li>Confidence and Overall Presence 25%</li>
                                        </ul>
                                    </td>
                                    <td class="score-name text-center" style="width:157px">RATING:</td>
                                    <td class="score-value text-center">
                                        <div class="d-flex">
                                            <span class="wrapper loading py-3"></span>
                                            <div class="score-value-select w-75">
                                                <select class="form-control select-2 " name="ms_score" id="ms_score"></select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- candidate content end -->
        </div>
        <!-- END MS Tab -->
    </div>
</div>