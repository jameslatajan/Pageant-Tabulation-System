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
                window.location.href = '<?php echo site_url('logout') ?>'
            }
        })

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
    });
</script>
</body>

</html>