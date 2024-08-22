<!DOCTYPE html>
<html>

<head>
    <title>BEST IN CATEGORY RESULTS </title>
</head>
<style>
    .container {
        width: 100%;
    }

    .row {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        margin-top: 5px;
    }

    /* content */
    .row div {
        padding: 3%;
        border: 1px solid white;
        border-radius: 5px;
        text-align: right;
        color: white;
        transition: background-color 1s;
    }

    .row div:nth-child(2n):hover {
        background-color: #42A5F5;
    }

    .row div:nth-child(2n+1):hover {
        background-color: #66BB6A;
    }

    /* 1/12 */
    .col-1 {
        width: 8.33%;
    }

    /* 2/12 */
    .col-2 {
        width: 16.66%;
    }

    /* 3/12 */
    .col-3 {
        width: 25%;
    }

    /* 4/12 */
    .col-4 {
        width: 33.33%
    }

    /* 5/12 */
    .col-5 {
        width: 41.66%;
    }

    /* 6/12 */
    .col-6 {
        width: 50%;
    }

    /* 7/12 */
    .col-7 {
        width: 58.33%;
    }

    /* 8/12 */
    .col-8 {
        width: 66.66%;
    }

    /* 9/12 */
    .col-9 {
        width: 75%;
    }

    /* 10/12 */
    .col-10 {
        width: 83.33%;
    }

    /* 11/12 */
    .col-11 {
        width: 91.66%;
    }

    /* 12/12 */
    .col-12 {
        width: 100%;
    }

    body {
        margin: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
            "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif,
            "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
            "Noto Color Emoji";
        font-size: 14px;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
    }

    .container {
        min-width: 992px !important;
    }

    .container,
    .container-fluid,
    .container-lg,
    .container-md,
    .container-sm,
    .container-xl {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }

    /* .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            } */

    /* .table td,
            .table th {
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            } */

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
    }

    .table tbody+tbody {
        border-top: 2px solid #dee2e6;
    }

    .table-sm td,
    .table-sm th {
        padding: 1px;
    }

    .table-borderless {
        border: none;
    }

    .table-borderless td,
    .table-borderless th {
        border: none;
    }

    .table-borderless thead td,
    .table-borderless thead th {
        border-bottom-width: 2px;
    }

    .table-borderless tbody+tbody,
    .table-borderless td,
    .table-borderless th,
    .table-borderless thead th {
        border: 0;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-hover tbody tr:hover {
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary,
    .table-primary>td,
    .table-primary>th {
        background-color: #b8daff;
    }

    .table-primary tbody+tbody,
    .table-primary td,
    .table-primary th,
    .table-primary thead th {
        border-color: #7abaff;
    }

    .table-hover .table-primary:hover {
        background-color: #9fcdff;
    }

    .table-hover .table-primary:hover>td,
    .table-hover .table-primary:hover>th {
        background-color: #9fcdff;
    }

    .table-secondary,
    .table-secondary>td,
    .table-secondary>th {
        background-color: #d6d8db;
    }

    .table-secondary tbody+tbody,
    .table-secondary td,
    .table-secondary th,
    .table-secondary thead th {
        border-color: #b3b7bb;
    }

    .table-hover .table-secondary:hover {
        background-color: #c8cbcf;
    }

    .table-hover .table-secondary:hover>td,
    .table-hover .table-secondary:hover>th {
        background-color: #c8cbcf;
    }

    .table-success,
    .table-success>td,
    .table-success>th {
        background-color: #c3e6cb;
    }

    .table-success tbody+tbody,
    .table-success td,
    .table-success th,
    .table-success thead th {
        border-color: #8fd19e;
    }

    .table-hover .table-success:hover {
        background-color: #b1dfbb;
    }

    .table-hover .table-success:hover>td,
    .table-hover .table-success:hover>th {
        background-color: #b1dfbb;
    }

    .table-info,
    .table-info>td,
    .table-info>th {
        background-color: #bee5eb;
    }

    .table-info tbody+tbody,
    .table-info td,
    .table-info th,
    .table-info thead th {
        border-color: #86cfda;
    }

    .table-hover .table-info:hover {
        background-color: #abdde5;
    }

    .table-hover .table-info:hover>td,
    .table-hover .table-info:hover>th {
        background-color: #abdde5;
    }

    .table-warning,
    .table-warning>td,
    .table-warning>th {
        background-color: #ffeeba;
    }

    .table-warning tbody+tbody,
    .table-warning td,
    .table-warning th,
    .table-warning thead th {
        border-color: #ffdf7e;
    }

    .table-hover .table-warning:hover {
        background-color: #ffe8a1;
    }

    .table-hover .table-warning:hover>td,
    .table-hover .table-warning:hover>th {
        background-color: #ffe8a1;
    }

    .table-danger,
    .table-danger>td,
    .table-danger>th {
        background-color: #f5c6cb;
    }

    .table-danger tbody+tbody,
    .table-danger td,
    .table-danger th,
    .table-danger thead th {
        border-color: #ed969e;
    }

    .table-hover .table-danger:hover {
        background-color: #f1b0b7;
    }

    .table-hover .table-danger:hover>td,
    .table-hover .table-danger:hover>th {
        background-color: #f1b0b7;
    }

    .table-light,
    .table-light>td,
    .table-light>th {
        background-color: #fdfdfe;
    }

    .table-light tbody+tbody,
    .table-light td,
    .table-light th,
    .table-light thead th {
        border-color: #fbfcfc;
    }

    .table-hover .table-light:hover {
        background-color: #ececf6;
    }

    .table-hover .table-light:hover>td,
    .table-hover .table-light:hover>th {
        background-color: #ececf6;
    }

    .table-dark,
    .table-dark>td,
    .table-dark>th {
        background-color: #c6c8ca;
    }

    .table-dark tbody+tbody,
    .table-dark td,
    .table-dark th,
    .table-dark thead th {
        border-color: #95999c;
    }

    .table-hover .table-dark:hover {
        background-color: #b9bbbe;
    }

    .table-hover .table-dark:hover>td,
    .table-hover .table-dark:hover>th {
        background-color: #b9bbbe;
    }

    .table-active,
    .table-active>td,
    .table-active>th {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover>td,
    .table-hover .table-active:hover>th {
        background-color: rgba(0, 0, 0, 0.075);
    }

    .table .thead-dark th {
        color: #fff;
        background-color: #343a40;
        border-color: #454d55;
    }

    .table .thead-light th {
        color: #495057;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .table-dark {
        color: #fff;
        background-color: #343a40;
    }

    .table-dark td,
    .table-dark th,
    .table-dark thead th {
        border-color: #454d55;
    }

    .table-dark.table-borderless {
        border: 0;
    }

    .table-dark.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.05);
    }

    .table-dark.table-hover tbody tr:hover {
        color: #fff;
        background-color: rgba(255, 255, 255, 0.075);
    }

    .table-thick {
        border-collapse: collapse;
    }

    .table-thick th,
    td {
        border: 1px solid black;
    }

    .underline {
        text-align: center;
        font-weight: bold;
    }

    table,
    th,
    td {}
</style>

<body>

    <!-- <div class="container">
        <table style="width: 100%;;">
            <tr>
                <td align="right" style="border:none; position: relative;">
                    <img src="<?php echo base_url('assets/img/1.jpg') ?>" style="right: 0; top: 3px; width: 70px; height: 70px; float: right;" alt="" srcset="">
                </td>

                <td style="width:275px; text-align:center; font-size: 14px;border:none; ">
                    <p>Republic of the Philippines</p>
                    <p style="font-weight: bold; font-size: 15px;">Department of Tourism</p>
                    <p>Province of Surigao del Norte</p>
                    <p>Municipality of Socorro</p>
                    <p style="padding-top:5px;"></p>
                </td>

                <td align="left" style="border:none;">
                    <img src="<?php echo base_url('assets/img/2.jpg') ?>" style="margin-right:30px; position:absolute; top:3px; width: 75px; height: 75px;" alt="" srcset="">
                </td>
            </tr>
        </table>
    </div> -->

    <div style="height: 2%"></div>

    <h2 align="center" style="text-transform: uppercase; font-family: arial">Best Category Results</h2>

    
    <?php if (!empty($production) && $production[0]['total'] != 0) { ?>
        <div class="container">
            <table align="center" style="margin-top:5px; width:100%; border: 1px solid black; border-collapse: collapse; padding: 3px;">
                <tr align="center">
                    <td colspan="3" align="center" style="text-transform: uppercase;padding-left:10px; font-size:15px; background-color: #1060D1 !important; color: white">
                        <b>Best in Production Number</b>
                    </td>
                </tr>
                <?php foreach($production as $row) {
                    if($row['rank'] == 1 && $row['total'] != 0) {?>
                        <tr>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 120px;">
                                <?php echo $row['canNo'] ?>
                            </td>
                            <td align="left" style="font-size:15px; font-weight: bold; padding-left: 20px; "> Ms.
                                <?php echo $row['fullname'] ?>
                            </td>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 100px;">
                                <?php echo $row['total'] ?>
                            </td>
                        </tr>
                    <?php }
                }?>
            </table>
        </div>
    <?php } ?>
    
    <?php if (!empty($casual) && $casual[0]['total'] != 0) { ?>
        <div class="container">
            <table align="center" style="margin-top:18px; width:100%; border: 1px solid black; border-collapse: collapse; padding: 3px;">
                <tr align="center">
                    <td colspan="3" align="center" style="text-transform: uppercase;padding-left:10px; font-size:15px; background-color: #1060D1 !important; color: white">
                        <b>Best in Casual Wear</b>
                    </td>
                </tr>
                <?php foreach($casual as $row) {
                    if($row['rank'] == 1 && $row['total'] != 0) {?>
                        <tr>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 120px;">
                                <?php echo $row['canNo'] ?>
                            </td>
                            <td align="left" style="font-size:15px; font-weight: bold; padding-left: 20px; "> Ms.
                                <?php echo $row['fullname'] ?>
                            </td>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 100px;">
                                <?php echo $row['total'] ?>
                            </td>
                        </tr>
                    <?php }
                }?>
            </table>
        </div>
    <?php } ?>

    <?php if (!empty($playsuit) && $playsuit[0]['total'] != 0) { ?>
        <div class="container">
            <table align="center" style="margin-top:18px; width:100%; border: 1px solid black; border-collapse: collapse; padding: 3px;">
                <tr align="center">
                    <td colspan="3" align="center" style="text-transform: uppercase;padding-left:10px; font-size:15px; background-color: #1060D1 !important; color: white">
                        <b>Best in Playsuit</b>
                    </td>
                </tr>
                <?php foreach($playsuit as $row) {
                    if($row['rank'] == 1 && $row['total'] != 0) {?>
                        <tr>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 120px;">
                                <?php echo $row['canNo'] ?>
                            </td>
                            <td align="left" style="font-size:15px; font-weight: bold; padding-left: 20px; "> Ms.
                                <?php echo $row['fullname'] ?>
                            </td>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 100px;">
                                <?php echo $row['total'] ?>
                            </td>
                        </tr>
                    <?php }
                }?>
            </table>
        </div>
    <?php } ?>

    <?php if (!empty($sports) && $sports[0]['total'] != 0) { ?>
        <div class="container">
            <table align="center" style="margin-top:18px; width:100%; border: 1px solid black; border-collapse: collapse; padding: 3px;">
                <tr align="center">
                    <td colspan="3" align="center" style="text-transform: uppercase;padding-left:10px; font-size:15px; background-color: #1060D1 !important; color: white">
                        <b>Best in Sports Wear</b>
                    </td>
                </tr>
                <?php foreach($sports as $row) {
                    if($row['rank'] == 1 && $row['total'] != 0) {?>
                        <tr>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 120px;">
                                <?php echo $row['canNo'] ?>
                            </td>
                            <td align="left" style="font-size:15px; font-weight: bold; padding-left: 20px; "> Ms.
                                <?php echo $row['fullname'] ?>
                            </td>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 100px;">
                                <?php echo $row['total'] ?>
                            </td>
                        </tr>
                    <?php }
                }?>
            </table>
        </div>
    <?php } ?>

    <?php if (!empty($uniform) && $uniform[0]['total'] != 0) { ?>
        <div class="container">
            <table align="center" style="margin-top:18px; width:100%; border: 1px solid black; border-collapse: collapse; padding: 3px;">
                <tr align="center">
                    <td colspan="3" align="center" style="text-transform: uppercase;padding-left:10px; font-size:15px; background-color: #1060D1 !important; color: white">
                        <b>Best in Uniform</b>
                    </td>
                </tr>
                <?php foreach($uniform as $row) {
                    if($row['rank'] == 1 && $row['total'] != 0) {?>
                        <tr>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 120px;">
                                <?php echo $row['canNo'] ?>
                            </td>
                            <td align="left" style="font-size:15px; font-weight: bold; padding-left: 20px; "> Ms.
                                <?php echo $row['fullname'] ?>
                            </td>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 100px;">
                                <?php echo $row['total'] ?>
                            </td>
                        </tr>
                    <?php }
                }?>
            </table>
        </div>
    <?php } ?>

    <?php if (!empty($tourism) && $tourism[0]['total'] != 0) { ?>
        <div class="container">
            <table align="center" style="margin-top:18px; width:100%; border: 1px solid black; border-collapse: collapse; padding: 3px;">
                <tr align="center">
                    <td colspan="3" align="center" style="text-transform: uppercase;padding-left:10px; font-size:15px; background-color: #1060D1 !important; color: white">
                        <b>Best in Tourism Video</b>
                    </td>
                </tr>
                <?php foreach($tourism as $row) {
                    if($row['rank'] == 1 && $row['total'] != 0) {?>
                        <tr>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 120px;">
                                <?php echo $row['canNo'] ?>
                            </td>
                            <td align="left" style="font-size:15px; font-weight: bold; padding-left: 20px; "> Ms.
                                <?php echo $row['fullname'] ?>
                            </td>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 100px;">
                                <?php echo $row['total'] ?>
                            </td>
                        </tr>
                    <?php }
                }?>
            </table>
        </div>
    <?php } ?>

    <?php if (!empty($gown) && $gown[0]['total'] != 0) { ?>
        <div class="container">
            <table align="center" style="margin-top:18px; width:100%; border: 1px solid black; border-collapse: collapse; padding: 3px;">
                <tr align="center">
                    <td colspan="3" align="center" style="text-transform: uppercase;padding-left:10px; font-size:15px; background-color: #1060D1 !important; color: white">
                        <b>Best in Gown</b>
                    </td>
                </tr>
                <?php foreach($gown as $row) {
                    if($row['rank'] == 1 && $row['total'] != 0) {?>
                        <tr>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 120px;">
                                <?php echo $row['canNo'] ?>
                            </td>
                            <td align="left" style="font-size:15px; font-weight: bold; padding-left: 20px; "> Ms.
                                <?php echo $row['fullname'] ?>
                            </td>
                            <td align="center" style="font-size:15px; font-weight: bold; width: 100px;">
                                <?php echo $row['total'] ?>
                            </td>
                        </tr>
                    <?php }
                }?>
            </table>
        </div>
    <?php } ?>

    <div class="container table-borderless" style="padding: 3px; margin-top: 50px; border: 0px;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="width: 10%; height:  50px;"></td>
                    <td style="width: 15px;"></td>
                    <td style="width: 30%; height:  50px; padding-left: 20px; border-bottom: 1px solid black"></td>
                    <td style="width: 15px;"></td>
                    <td style="width: 10%; height:  50px;"></td>
                    <td style="width: 15px;"></td>
                    <td style="width: 30%; height:  50px; padding-left: 20px; border-bottom: 1px solid black"></td>
                    <td style="width: 15px;"></td>
                    <td style="width: 10%; height:  50px;"></td>
                </tr>
                <tr>
                    <td align="center" style="width: 10%;"></td>
                    <td></td>
                    <td align="center" style="width: 30%;">Judge 1</td>
                    <td></td>
                    <td align="center" style="width: 10%;"></td>
                    <td></td>
                    <td align="center" style="width: 30%;">Judge 2</td>
                    <td></td>
                    <td align="center" style="width: 10%;"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container table-borderless" style="padding: 3px; margin-top: 35px; border: 0px;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="width: 15px;"></td>
                    <td style="width: 30px;"></td>
                    <td style="width: 30px;"></td>
                    <td style="width: 25%;"></td>
                    <td style="width: 30%; height:  50px; padding-left: 20px; border-bottom: 1px solid black"></td>
                    <td style="width: 25%;"></td>
                    <td style="width: 30px;"></td>
                    <td style="width: 30px;"></td>
                    <td style="width: 15px;"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="center" style="width: 30%;">Judge 3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="container table-borderless" style="padding: 3px; margin-top: 35px; border: 0px;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="width: 10%; height:  50px;"></td>
                    <td style="width: 15px;"></td>
                    <td style="width: 25%; height:  50px; padding-left: 20px; border-bottom: 1px solid black"></td>
                    <td style="width: 15px;"></td>
                    <td style="width: 10%; height:  50px;"></td>
                    <td style="width: 15px;"></td>
                    <td style="width: 25%; height:  50px; padding-left: 20px; border-bottom: 1px solid black"></td>
                    <td style="width: 15px;"></td>
                    <td style="width: 10%; height:  50px;"></td>
                </tr>
                <tr>
                    <td align="center" style="width: 10%;"></td>
                    <td></td>
                    <td align="center" style="width: 25%;">Judge 4</td>
                    <td></td>
                    <td align="center" style="width: 10%;"></td>
                    <td></td>
                    <td align="center" style="width: 25%;">Judge 5</td>
                    <td></td>
                    <td align="center" style="width: 10%;"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- <div class="container table-borderless" style="padding: 3px; margin-top: 40px; border: 0px;">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td style="width: 20%; height:  50px; padding-left: 20px; border-bottom: 1px solid black"></td>
                    <td style="width: 10%; height:  50px;"></td>
                    <td style="width: 20%; height:  50px; padding-left: 20px; border-bottom: 1px solid black"></td>
                    <td style="width: 10%; height:  50px;"></td>
                    <td style="width: 20%; height:  50px; padding-left: 20px; border-bottom: 1px solid black"></td>
                    <td style="width: 10%; height:  50px;"></td>
                    <td style="width: 20%; height:  50px; padding-left: 20px; border-bottom: 1px solid black"></td>
                    <td style="width: 10%; height:  50px;"></td>
                    <td style="width: 20%; height:  50px; padding-left: 20px; border-bottom: 1px solid black"></td>
                </tr>
                <tr>
                    <td style="width: 20%; font-size:20px;" align="center">Judge 1</td>
                    <td></td>
                    <td style="width: 20%; font-size:20px;" align="center">Judge 2</td>
                    <td></td>
                    <td style="width: 20%; font-size:20px;" align="center">Judge 3</td>
                    <td></td>
                    <td style="width: 20%; font-size:20px;" align="center">Judge 4</td>
                    <td></td>
                    <td style="width: 20%; font-size:20px;" align="center">Judge 5</td>
                </tr>

               
            </tbody>
        </table>
    </div> -->
    
    <div style="position: absolute; bottom: 10; left: 38%; transform: translateX(-50%); vertical-align: middle">
        <span>Powered by: 
            <img src="<?php echo base_url('assets/img/isotech.png') ?>" alt="" srcset="" style="width: 12px; height: 12px; padding-top:20px; ">
            ISOTECH, INC.
        </span>
    </div> 

</body>

</html>