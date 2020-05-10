    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin'); ?>/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin'); ?>/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin'); ?>/plugins/table/datatable/dt-global_style.css">
    <!-- end CSS -->

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
                        <div class="col-6">
                            <div class="widget-heading d-inline">
                                <h5 id="title-head"><b>Daftar Karyawan</b></h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row justify-content-end">
                                <button class="btn btn-info" style="margin-right: 30px;" id="addEmploye">+ Karyawan</button>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center" id="addEmployeForm">
                        <div class="col-6">
                            <form id="formAddEmploye" action="javascript:void(0);">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" class="form-control" id="nip" name="nip" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="btnCancel">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive mb-4 mt-2" id="tableEmploye">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Foto</th>
                                    <th>TTD</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($employe as $e) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $e['nip'] ?></td>
                                        <td><?= $e['nama'] ?></td>
                                        <td><?= $e['jabatan'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    <img alt="avatar" class="img-fluid rounded-circle" src="<?= base_url('assets/img/avatar') ?>/default.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    <?php if ($e['ttd'] == "") : ?>
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="<?= base_url('assets/img/') ?>/cancel.svg">
                                                    <?php else : ?>
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="<?= base_url('assets/img/') ?>/check.svg">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-success btn-sm btn-reset" data-id="<?= $e['id'] ?>">Atur Ulang Sandi</button>
                                            <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $e['id'] ?>">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

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
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/button-ext/jszip.min.js"></script>
    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script src="<?= base_url('assets'); ?>/main/employe.js"></script>