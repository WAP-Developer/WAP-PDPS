</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?= base_url('assets/admin'); ?>/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="<?= base_url('assets/admin'); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url('assets/admin'); ?>/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url('assets/admin'); ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/admin'); ?>/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets/admin'); ?>/assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="<?= base_url('assets/admin'); ?>/assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<script src="<?= base_url('assets/admin'); ?>/assets/js/scrollspyNav.js"></script>
<script src="<?= base_url('assets/admin'); ?>/plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/admin'); ?>/plugins/sweetalerts/custom-sweetalert.js"></script>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.preloader').fadeOut();
        }, 1000);
    })
</script>

<script src="<?= base_url('assets'); ?>/main/main.js"></script>

</body>

</html>