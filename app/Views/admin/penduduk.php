    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin'); ?>/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin'); ?>/plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL STYLES -->

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
                                <h5><b>Daftar Penduduk</b></h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row justify-content-end">
                                <button class="btn btn-info" id="addPenduduk" style="margin-right: 30px;">+ Penduduk</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mb-4 mt-4">
                        <table id="zero-config" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No KK</th>
                                    <th>Kepala Keluarga</th>
                                    <th>Jml Anggota</th>
                                    <th>Alamat</th>
                                    <th class="no-content"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataPenduduk as $dp) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $dp['nokk']; ?></td>
                                        <td><?= $dp['kepalakk']; ?></td>
                                        <td align="center"><?= $dp['jmlanggota'] ?></td>
                                        <td><?= $dp['alamat'] ?> <?= $dp['rtrw'] ?></td>
                                        <td>
                                            <button class="btn btn-info btn-sm mb-2 btn-view" data-toggle="modal" data-target="#pendudukDetail<?= $dp['id'] ?>" id="<?= $dp['id'] ?>">Detail</button>
                                            <button class="btn btn-warning btn-sm mb-2 btn-editPenduduk" id="<?= $dp['id'] ?>">Edit</button>
                                            <button class="btn btn-danger btn-sm mb-2 btn-delete" id="<?= $dp['id'] ?>">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- modal Detail -->
            <?php foreach ($dataPenduduk as $dp) : ?>
                <div class="modal fade modal-opt" id="pendudukDetail<?= $dp['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="detail" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detail">Detail Penduduk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="table-responsive">
                                            <table class="table mb-4">
                                                <tbody>
                                                    <tr>
                                                        <td>No KK</td>
                                                        <td>:</td>
                                                        <td style="font-weight: bold;"><?= $dp['nokk']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kepala KK</td>
                                                        <td>:</td>
                                                        <td style="font-weight: bold;"><?= $dp['kepalakk']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Anggota</td>
                                                        <td>:</td>
                                                        <td style="font-weight: bold;"><?= $dp['jmlanggota']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td style="font-weight: bold;"><?= $dp['alamat']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>RT/RW</td>
                                                        <td>:</td>
                                                        <td style="font-weight: bold;"><?= $dp['rtrw']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="table-responsive">
                                            <table class="table mb-4">
                                                <tbody>
                                                    <tr>
                                                        <td>Desa/Kelurahan</td>
                                                        <td>:</td>
                                                        <td style="font-weight: bold;"><?= $dp['desa']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan</td>
                                                        <td>:</td>
                                                        <td style="font-weight: bold;"><?= $dp['kecamatan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kabupaten/Kota</td>
                                                        <td>:</td>
                                                        <td style="font-weight: bold;"><?= $dp['kabupaten']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kode Pos</td>
                                                        <td>:</td>
                                                        <td style="font-weight: bold;"><?= $dp['kodepos']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Provinsi</td>
                                                        <td>:</td>
                                                        <td style="font-weight: bold;"><?= $dp['provinsi']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <h5 id="detail">Anggota Keluarga</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped mb-4">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>JK</th>
                                                        <th>TTL</th>
                                                        <th>Status Hubungan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $anggota = model('App\Models\AnggotaModel');
                                                    $fetchAnggota = $anggota->where('kk_id', $dp['id'])->findAll();
                                                    $no = 1;

                                                    foreach ($fetchAnggota as $a) : ?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= $a['nik'] ?></td>
                                                            <td><?= $a['nama'] ?></td>
                                                            <td><?= $a['jk'] ?></td>
                                                            <td><?= $a['tempat_lahir'] . ', ' . date('d-m-Y', strtotime($a['tanggal_lahir'])) ?></td>
                                                            <td><?= $a['hubungan'] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- end Modal Detail -->

            <div class="col-xl-5 col-lg-5 col-sm-5  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="widget-heading">
                        <h5><b>Statistik Penduduk</b></h5>
                    </div>
                    <div class="mb-1 mt-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped mb-1">
                                <tbody>
                                    <tr>
                                        <td width="100px">Total KK</td>
                                        <td>:</td>
                                        <td class="text-center"><span class="text-success"><?= $jmlkk ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Laki-Laki</td>
                                        <td>:</td>
                                        <td class="text-center"><span class="text-success"><?= $jmllakilaki ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Perempuan</td>
                                        <td>:</td>
                                        <td class="text-center"><span class="text-success"><?= $jmlperempuan ?></span></td>
                                    </tr>
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
    </div>

    <script src="<?= base_url('assets/admin'); ?>/plugins/table/datatable/datatables.js"></script>
    <script src="<?= base_url('assets/main'); ?>/penduduk.js"></script>