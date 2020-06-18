    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?= base_url('assets/admin') ?>/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/admin') ?>/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <!-- END THEME GLOBAL STYLES -->

    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets') ?>/img/infinity.gif" width="80">
            <p>Harap Tunggu</p>
        </div>
    </div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6" id="layout-one">
                    <div class="row" id="searchNIK">
                        <div class="col-12">
                            <form id="formCheckerPelapor" action="javascript:void(0);" class="form-inline">
                                <h5 class="mr-2">Masukan NIK Pelapor :</h5>
                                <div class="form-group mr-2">
                                    <input name="nik" class="form-control flatpickr flatpickr-input active" type="text" style="width: 260px" placeholder="Masukan NIK" required>
                                </div>
                                <button type="submit" class="btn btn-info">
                                    <svg id="loading-button" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2">
                                        <line x1="12" y1="2" x2="12" y2="6"></line>
                                        <line x1="12" y1="18" x2="12" y2="22"></line>
                                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                        <line x1="2" y1="12" x2="6" y2="12"></line>
                                        <line x1="18" y1="12" x2="22" y2="12"></line>
                                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                    </svg>
                                    Cari</button>
                            </form>
                        </div>
                    </div>

                    <div class="row" id="searchNIKMeninggal">
                        <div class="col-12">
                            <form id="formCheckerMeninggal" action="javascript:void(0);" class="form-inline">
                                <h5 class="mr-2">Masukan NIK Meninggal :</h5>
                                <div class="form-group mr-2">
                                    <input name="nik" class="form-control flatpickr flatpickr-input active" type="text" style="width: 260px" placeholder="Masukan NIK" required>
                                </div>
                                <button type="submit" class="btn btn-info">
                                    <svg id="loading-button2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2">
                                        <line x1="12" y1="2" x2="12" y2="6"></line>
                                        <line x1="12" y1="18" x2="12" y2="22"></line>
                                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                        <line x1="2" y1="12" x2="6" y2="12"></line>
                                        <line x1="18" y1="12" x2="22" y2="12"></line>
                                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                    </svg>
                                    Cari</button>
                            </form>
                        </div>
                    </div>


                    <div class="row" id="contentFoundPelapor">
                        <div class="col-12">
                            <table class="headtable-detail mt-4">
                                <tr>
                                    <td>No KK</td>
                                    <td width="20px" align="center">:</td>
                                    <td><b><span class="nokkPelapor"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Kepala KK</td>
                                    <td width="20px" align="center">:</td>
                                    <td><b><span class="kepalakkPelapor"></span></b></td>
                                </tr>
                            </table>
                            <div class="table-responsive mt-1">
                                <table class="tablePelapor table table-bordered">
                                </table>
                            </div>
                            <div id="finding" class="text-center" style="padding: 50px 0px;">
                                <img width="200" height="200" src="<?= base_url('assets') ?>/img/finding.svg" alt="not found">
                                <p>Cari Data Pelapor Terlebih Dahulu !</p>
                            </div>
                            <div id="notfound" class="text-center" style="padding: 50px 0px;">
                                <img width="200" height="200" src="<?= base_url('assets') ?>/img/empty.svg" alt="not found">
                                <p>Data Tidak Ditemukan!</p>
                            </div>
                            <div id="loading" class="text-center" style="padding: 50px 0px;">
                                <img class=" ls-is-cached lazyloaded" width="90" height="90" src="<?= base_url('assets') ?>/img/infinity.gif" alt="please wait">
                                <p>Harap Tunggu Sedang Mengambil Data</p>
                            </div>
                        </div>
                    </div>


                    <div class="row" id="contentFoundMeninggal">
                        <div class="col-12">
                            <table class="headTableMeninggal headtable-detail mt-4">
                                <tr>
                                    <td>No KK</td>
                                    <td width="20px" align="center">:</td>
                                    <td><b><span class="nokkMeninggal"></span></b></td>
                                </tr>
                                <tr>
                                    <td>Kepala KK</td>
                                    <td width="20px" align="center">:</td>
                                    <td><b><span class="kepalakkMeninggal"></span></b></td>
                                </tr>
                            </table>
                            <div class="table-responsive mt-1">
                                <table class="tableMeninggal table table-bordered">
                                </table>
                            </div>

                            <div class="row justify-content-end mr-3" id="buttonBack">
                                <button type="button" class="btn btn-danger" id="back2">Kembali</button>
                            </div>


                            <div id="findingMeninggal" class="text-center" style="padding: 50px 0px;">
                                <img width="200" height="200" src="<?= base_url('assets') ?>/img/finding.svg" alt="not found">
                                <p>Cari Data Meninggal Terlebih Dahulu !</p>
                            </div>
                            <div id="notFoundMeninggal" class="text-center" style="padding: 50px 0px;">
                                <img width="200" height="200" src="<?= base_url('assets') ?>/img/empty.svg" alt="not found">
                                <p>Data Tidak Ditemukan!</p>
                            </div>
                            <div id="loadingMeninggal" class="text-center" style="padding: 50px 0px;">
                                <img class=" ls-is-cached lazyloaded" width="90" height="90" src="<?= base_url('assets') ?>/img/infinity.gif" alt="please wait">
                                <p>Harap Tunggu Sedang Mengambil Data</p>
                            </div>
                        </div>
                    </div>

                    <form id="formKematian" action="javascript:void(0);">
                        <div class="row" id="createSurat">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nik">Nama Pelapor</label>
                                    <input type="text" class="form-control" id="namaPelapor" disabled>
                                    <input type="hidden" id="idPelapor" name="idpelapor">
                                    <input type="hidden" id="idMeninggal" name="idmeninggal">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Meninggal</label>
                                    <input type="text" class="form-control" id="namaMeninggal" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="hubungan">Hubungan Pelapor</label>
                                    <input type="text" class="form-control" id="hubungan" name="hubungan" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                    <input type="text" class="form-control" id="hari" name="hari" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input id="basicFlatpickr" class="form-control flatpickr flatpickr-input" type="text" id="tanggal" name="tanggal" placeholder="Pilih Tanggal.." readonly="readonly" required>
                                </div>
                                <div class="form-group">
                                    <label for="jam">Jam Meninggal</label>
                                    <input id="timeFlatpickr" class="form-control flatpickr flatpickr-input" type="text" id="jam" name="jam" placeholder="Pilih Jam.." readonly="readonly" required>
                                </div>
                                <div class="form-group">
                                    <label for="di">Meninggal di</label>
                                    <input type="text" class="form-control" id="di" name="lokasi" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end mr-3" id="buttonSurat">
                            <button type="button" class="btn btn-danger mr-2" id="back">Kembali</button>
                            <button type="submit" class="btn btn-warning" tar>Buat Surat</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">© 2020 Seluruh Hak Cipta, Code of The Core Developer.</p>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/datatables.js"></script>
    <script src="<?= base_url('assets/admin') ?>/plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="<?= base_url('assets/admin') ?>/plugins/flatpickr/flatpickr.js"></script>

    <script>
        var f4 = flatpickr(document.getElementById('timeFlatpickr'), {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i"
        });

        var f1 = flatpickr(document.getElementById('basicFlatpickr'));
    </script>

    <script src="<?= base_url('assets/main/surat'); ?>/kematian.js"></script>