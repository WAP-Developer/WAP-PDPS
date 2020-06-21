<link href="<?= base_url('assets/admin') ?>/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/admin') ?>/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
<script src="<?= base_url('assets/admin') ?>/plugins/sweetalerts/promise-polyfill.js"></script>
<link href="<?= base_url('assets/admin') ?>/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/admin') ?>/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/admin') ?>/assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/admin'); ?>/assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />

<div class="preloader">
    <div class="loading">
        <img src="<?= base_url('assets') ?>/img/infinity.gif" width="80">
        <p>Harap Tunggu</p>
    </div>
</div>
<div class="layout-px-spacing">

    <div class="row layout-spacing">

        <!-- Content -->
        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 layout-top-spacing">

            <div class="user-profile layout-spacing">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="">Profile</h3>
                        <span class="mt-2 edit-profile"></span>
                    </div>
                    <div class="text-center user-info">
                        <img src="<?= base_url('assets/img/avatar') . "/" . $profile['foto'] ?>" alt="avatar" width="250">
                        <p class=""><?= $profile['nama'] ?></p>
                    </div>
                    <div class="user-info-list">

                        <div class="">
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
                                    <table>
                                        <tr>
                                            <td width="100">NIP</td>
                                            <td>:</td>
                                            <td><?= $profile['nip'] ?></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="contacts-block__item">
                                    <table>
                                        <tr>
                                            <td width="100">Jabatan</td>
                                            <td>:</td>
                                            <td><?= $profile['jabatan'] ?></td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="contacts-block__item">
                                    <table>
                                        <tr>
                                            <td width="100">Tanda Tangan</td>
                                            <td>:</td>
                                            <td>
                                                <?php if (!$profile['ttd']) {
                                                    echo "Belum Terupload";
                                                } else {
                                                    echo "Terupload";
                                                } ?>
                                            </td>
                                        </tr>
                                    </table>
                                </li>
                                <li class="contacts-block__item">
                                    <table>
                                        <tr>
                                            <td width="100">Kata Sandi</td>
                                            <td>:</td>
                                            <td><?= $profile['password'] ?></td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 layout-top-spacing">

            <div class="skills layout-spacing ">
                <div class="widget-content widget-content-area br-6">
                    <h3 class="">Tanda Tangan</h3>
                    <form id="ttd" action="javascript:void(0);" method="post" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Upload Tanda Tangan</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="uploadttd" name="uploadttd" required>
                                        <label class="custom-file-label labelttd" for="uploadttd">Pilih file..</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end mr-1">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="skills layout-spacing ">
                <div class="widget-content widget-content-area br-6">
                    <h3 class="">Avatar</h3>
                    <form id="avatar" action="javascript:void(0);" method="post" enctype="multipart/form-data">
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Upload Foto</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="avatarInput" name="avatar" required>
                                        <label class="custom-file-label labelavatar" for="avatarInput">Pilih file..</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end mr-1">
                            <button type="submit" class="btn btn-info">Simpan</button>
                        </div>
                    </form>
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
<!-- BEGIN THEME GLOBAL STYLE -->
<script src="<?= base_url('assets/admin') ?>/assets/js/scrollspyNav.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/sweetalerts/sweetalert2.min.js"></script>
<script src="<?= base_url('assets/admin') ?>/plugins/sweetalerts/custom-sweetalert.js"></script>
<!-- END THEME GLOBAL STYLE -->
<script src="<?= base_url('assets'); ?>/main/profile.js"></script>