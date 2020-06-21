    <link rel="stylesheet" href="<?= base_url('assets/main') ?>/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin'); ?>/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin'); ?>/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin'); ?>/plugins/table/datatable/dt-global_style.css">

    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets') ?>/img/infinity.gif" width="80">
            <p>Harap Tunggu</p>
        </div>
    </div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row">
                        <div class="col-12">
                            <form id="formFilter" action="javascript:void(0);" class="form-inline">
                                <h5 class="mr-2">Filter Tanggal :</h5>
                                <div class="form-group mr-2">
                                    <input id="datePicker" name="date" value="Pilih Tanggal" class="form-control flatpickr flatpickr-input active" type="text" style="width: 260px" placeholder="Select Date.." required>
                                </div>
                                <button type="submit" class="btn btn-info">Lihat</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div id="loading" class="text-center" style="padding: 50px 0px;">
                                <img class=" ls-is-cached lazyloaded" width="90" height="90" src="<?= base_url('assets') ?>/img/infinity.gif" alt="please wait">
                                <p>Harap Tunggu Sedang Mengambil Data</p>
                            </div>
                            <div class="mb-4 mt-4" id="table-report">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="selectPindah" tabindex="-1" role="dialog" aria-labelledby="selectPindah" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="selectPindah">Daftar Anggota</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-anggota">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal -->

        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">© 2020 Seluruh Hak Cipta, Code of The Core Developer.</p>
            </div>
        </div>
    </div>

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/datatables.js"></script>
    <script src="<?= base_url('assets/admin') ?>/plugins/notification/snackbar/snackbar.min.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/button-ext/buttons.print.min.js"></script>

    <script src="<?= base_url('assets/main') ?>/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/main') ?>/js/responsive.bootstrap4.min.js" type="text/javascript"></script>

    <script src="<?= base_url('assets/admin'); ?>/plugins/flatpickr/flatpickr.js"></script>
    <script>
        var f3 = flatpickr(document.getElementById('datePicker'), {
            mode: "range"
        });
    </script>
    <script src="<?= base_url('assets/main/report'); ?>/pindah.js"></script>