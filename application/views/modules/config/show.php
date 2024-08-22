<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config</title>

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/image/background.png" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fa/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweetalert/sweetalert2.min.css">

    <script src="<?php echo base_url() ?>assets/jquery/jquery-3.7.1.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/fa/all.min.js"></script>
    <script src="<?php echo base_url() ?>assets/sweetalert/sweetalert2.all.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row" style="margin-top: 20px;">
            <div class="col-12">
                <h3>SET INITIAL DATA</h3>
                <form action="<?php echo site_url('/config/set_initial_data') ?>" method="post" id="formFilter">
                    <input type="password" name="set" value="" class="form-control form-control-sm" style="width: 230px; margin-bottom:10px">
                </form>
                <button type="click" class="btn btn-primary" id="set">Save</button>
            </div>
        </div>
    </div>

</body>

</html>


<script>
    $('#set').on('click', function() {
        Swal.fire({
            title: 'Confirm set initial data?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#1ecbe1',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#set').attr('disable', true);
                $('#formFilter').submit();
            }
        })
    });
</script>