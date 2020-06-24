    <link href="<?= base_url('assets/admin') ?>/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets') ?>/img/infinity.gif" width="80">
            <p>Harap Tunggu</p>
        </div>
    </div>

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-4 col-sm-4  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="widget-heading">
                        <h5><b>Detail Tempat</b></h5>
                    </div>
                    <div class="mb-1 mt-4">
                        <div class="table-responsive">
                            <table class="table table-hover mb-4">
                                <tbody>
                                    <tr>
                                        <td width="100px">Alamat</td>
                                        <td width="50">:</td>
                                        <td class="text-center"><span class="text-success"><?= $place['alamat'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Kelurahan</td>
                                        <td>:</td>
                                        <td class="text-center"><span class="text-success"><?= $place['kel'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Kecamatan</td>
                                        <td>:</td>
                                        <td class="text-center"><span class="text-success"><?= $place['kec'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Kabupaten</td>
                                        <td>:</td>
                                        <td class="text-center"><span class="text-success"><?= $place['kab'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>:</td>
                                        <td class="text-center"><span class="text-success"><?= $place['prov'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Kode Pos</td>
                                        <td>:</td>
                                        <td class="text-center"><span class="text-success"><?= $place['kodepos'] ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-sm-8  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="widget-heading d-inline">
                        <h5><b>Ubah Detail Tempat</b></h5>
                    </div>
                    <form id="formPlace" action="javascript:void(0);">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" rows="3" name="alamat" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="keluarahn">Kelurahan</label>
                                    <input type="text" class="form-control" id="keluarahn" name="kelurahan" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" name="provinsi" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="kodepos">Kode Pos</label>
                                    <input type="text" class="form-control" id="kodepos" name="kodepos" autocomplete="off" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">© 2020 Seluruh Hak Cipta, Code of The Core Developer.</p>
        </div>
    </div>

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/datatables.js"></script>
    <script src="<?= base_url('assets/admin') ?>/plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="<?= base_url('assets'); ?>/main/place.js"></script>