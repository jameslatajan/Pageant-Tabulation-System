<script>
    $('#logout').on('click', function() {
        Swal.fire({
            title: 'Are you sure you want to logout?',
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?php echo site_url('login_config') ?>'
            }
        })
    });

    $('#set-initial').on('click', function() {
        Swal.fire({
            title: 'Are you sure you want to reset data?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('/config/set_initial_data') ?>",
                    data: {
                        password: 'admin'
                    },
                    dataType: "json",
                    success: function(response) {
                        window.location.replace(response.url)
                    },
                    error: function(xhr, status, text) {
                        Swal.fire({
                            icon: "error",
                            title: "Internal Server Error",
                            text: "Please contact administrator",
                        });
                    }
                });
            }
        })
    });

    function popUp(pageURL, pageTitle) {
        // Set the width and height of the new window
        let width = 1000;
        let height = 1000;

        // Calculate window position for the center of the screen
        let left = (screen.width - width) / 2;
        let top = (screen.height - height) / 2;

        // Open a new window with specified properties
        let myWindow = window.open(pageURL, pageTitle, 'resizable=yes, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);
    }
</script>

<?php if ($isAutoRefresh->value == "1") { ?>
    <script>
        function reloadPage() {
            location.reload()
        }

        setTimeout(reloadPage, 120000); // 120000 milliseconds = 2 minutes
    </script>
<?php } ?>
</body>

</html>