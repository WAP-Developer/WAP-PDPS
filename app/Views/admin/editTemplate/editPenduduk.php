    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin'); ?>/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin'); ?>/plugins/table/datatable/dt-global_style.css">
    <!-- END PAGE LEVEL STYLES -->

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="widget-heading d-inline">
                                <h5><b>Edit Penduduk</b></h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row justify-content-end">
                                <button class="btn btn-success mr-3" id="selesai">Selesai</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-6 mt-4">
                            <div class="table-responsive">
                                <table class="table mb-4">
                                    <tbody>
                                        <tr>
                                            <td>No KK</td>
                                            <td>:</td>
                                            <td id="data-table" style="font-weight: bold;" width="250px" data-column="nokk" contenteditable="true"><?= $dataPenduduk['nokk']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kepala KK</td>
                                            <td>:</td>
                                            <td id="data-table" style="font-weight: bold;" width="250px" data-column="kepalakk" contenteditable="true"><?= $dataPenduduk['kepalakk'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Anggota</td>
                                            <td>:</td>
                                            <td id="data-table" style="font-weight: bold;" width="250px" data-column="jmlanggota" contenteditable="true"><?= $dataPenduduk['jmlanggota'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td id="data-table" style="font-weight: bold;" width="250px" data-column="alamat" contenteditable="true"><?= $dataPenduduk['alamat'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>RT/RW</td>
                                            <td>:</td>
                                            <td id="data-table" style="font-weight: bold;" width="250px" data-column="rtrw" contenteditable="true"><?= $dataPenduduk['rtrw'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-sm-6 mt-4">
                            <div class="table-responsive">
                                <table class="table mb-4">
                                    <tbody>
                                        <tr>
                                            <td>Desa/Kelurahan</td>
                                            <td>:</td>
                                            <td id="data-table" style="font-weight: bold;" width="250px" data-column="desa" contenteditable="true"><?= $dataPenduduk['desa'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td>:</td>
                                            <td id="data-table" style="font-weight: bold;" width="250px" data-column="kecamatan" contenteditable="true"><?= $dataPenduduk['kecamatan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten/Kota</td>
                                            <td>:</td>
                                            <td id="data-table" style="font-weight: bold;" width="250px" data-column="kabupaten" contenteditable="true"><?= $dataPenduduk['kabupaten'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kode Pos</td>
                                            <td>:</td>
                                            <td id="data-table" style="font-weight: bold;" width="250px" data-column="kodepos" contenteditable="true"><?= $dataPenduduk['kodepos'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td>:</td>
                                            <td id="data-table" style="font-weight: bold;" width="250px" data-column="provinsi" contenteditable="true"><?= $dataPenduduk['provinsi'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-sm-12">
                            <div style="margin-top: -10px;">
                                <b><i>*Jika terdapat data yang salah, silakan langsung edit di data yang salah tersebut.</i></b>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-xl-12 col-lg-12 col-sm-12">

                            <div class="widget-heading">
                                <h5><b>Daftar Anggota</b></h5>
                            </div>

                            <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addAnggota">+ Anggota</button>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>JK</th>
                                            <th>TTL</th>
                                            <th>Status KK</th>
                                            <th class="no-content"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabel-anggota">
                                    </tbody>
                                </table>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="addAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="formAddAnggota" action="javascript:void(0);">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="nama">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                                            <input type="hidden" id="idkk" name="idkk" value="<?= $dataPenduduk['id']; ?>" autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nik">NIK</label>
                                                            <input type="text" class="form-control" id="nik" name="nik" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama">Jenis Kelamin</label>
                                                            <select class="form-control" id="jk" name="jk" required>
                                                                <option>---Pilih---</option>
                                                                <option value="Laki-Laki">Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tempatlahir">Tempat Lahir</label>
                                                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggallahir">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="agama">Agama</label>
                                                            <select class="form-control" id="agama" name="agama" required>
                                                                <option>---Pilih---</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Konghucu">Kong Hu Cu</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pendidikan">Pendidikan</label>
                                                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pekerjaan">Jenis Pekerjaan</label>
                                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="goldar">Golongan Darah</label>
                                                            <select class="form-control" id="goldarah" name="goldarah" required>
                                                                <option>---Pilih---</option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="AB">AB</option>
                                                                <option value="O">O</option>
                                                                <option value="Tidak Tahu">Tidak Tahu</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="statuskawin">Status Perkawinan</label>
                                                            <input type="text" class="form-control" id="statuskawin" name="statuskawin" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tglkawin">Tanggal Perkawinan</label>
                                                            <input type="text" class="form-control" id="tglkawin" name="tglkawin" autocomplete="off" placeholder="Contoh : 24-06-1990" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hubungan">Hubungan Dalam Keluarga</label>
                                                            <input type="text" class="form-control" id="hubungan" name="hubungan" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kewarganegaraan">Kewarganegaraan</label>
                                                            <select class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                                                                <option>---Pilih---</option>
                                                                <option value="WNI">WNI</option>
                                                                <option value="WNA">WNA</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paspor">No. Paspor</label>
                                                            <input type="text" class="form-control" id="paspor" name="paspor" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kitap">No. KITAP</label>
                                                            <input type="text" class="form-control" id="kitap" name="kitap" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ayah">Ayah</label>
                                                            <input type="text" class="form-control" id="ayah" name="ayah" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ibu">Ibu</label>
                                                            <input type="text" class="form-control" id="ibu" name="ibu" autocomplete="off" required>
                                                        </div>
                                                        <span><i><b>Catatan </b></i></span><br>
                                                        <span><i>* Jika Belum Menikah isi dengan (<b>-</b>)</i></span><br>
                                                        <span><i>* Jika No Paspor & No KITAP tidak ada isi dengan (<b>-</b>)</i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->

                            <!-- edit Anggota Modal -->
                            <div class="modal fade" id="editAnggota" tabindex="-1" role="dialog" aria-labelledby="editAnggota" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editAnggota">Edit Anggota</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="formEditAnggota" action="javascript:void(0);">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="nama">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="editnama" name="nama" autocomplete="off" required>
                                                            <input type="hidden" id="editidkk" name="idkk">
                                                            <input type="hidden" id="idag" name="id">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nik">NIK</label>
                                                            <input type="text" class="form-control" id="editnik" name="nik" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama">Jenis Kelamin</label>
                                                            <select class="form-control" id="jk" name="jk" required>
                                                                <option id="editjk"></option>
                                                                <option>---Pilih---</option>
                                                                <option value="Laki-Laki">Laki-Laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tempatlahir">Tempat Lahir</label>
                                                            <input type="text" class="form-control" id="edittempatlahir" name="tempatlahir" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggallahir">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" id="edittanggallahir" name="tanggallahir" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="agama">Agama</label>
                                                            <select class="form-control" id="agama" name="agama" required>
                                                                <option id="editAgama"></option>
                                                                <option>---Pilih---</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Konghucu">Kong Hu Cu</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pendidikan">Pendidikan</label>
                                                            <input type="text" class="form-control" id="editpendidikan" name="pendidikan" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pekerjaan">Jenis Pekerjaan</label>
                                                            <input type="text" class="form-control" id="editpekerjaan" name="pekerjaan" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="goldar">Golongan Darah</label>
                                                            <select class="form-control" id="goldarah" name="goldarah" required>
                                                                <option id="editgoldarah"></option>
                                                                <option>---Pilih---</option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="AB">AB</option>
                                                                <option value="O">O</option>
                                                                <option value="Tidak Tahu">Tidak Tahu</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="statuskawin">Status Perkawinan</label>
                                                            <input type="text" class="form-control" id="editstatuskawin" name="statuskawin" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tglkawin">Tanggal Perkawinan</label>
                                                            <input type="text" class="form-control" id="edittglkawin" name="tglkawin" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hubungan">Hubungan Dalam Keluarga</label>
                                                            <input type="text" class="form-control" id="edithubungan" name="hubungan" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kewarganegaraan">Kewarganegaraan</label>
                                                            <select class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                                                                <option id="editkewarganegaraan"></option>
                                                                <option>---Pilih---</option>
                                                                <option value="WNI">WNI</option>
                                                                <option value="WNA">WNA</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="paspor">No. Paspor</label>
                                                            <input type="text" class="form-control" id="editpaspor" name="paspor" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kitap">No. KITAP</label>
                                                            <input type="text" class="form-control" id="editkitap" name="kitap" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ayah">Ayah</label>
                                                            <input type="text" class="form-control" id="editayah" name="ayah" autocomplete="off" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ibu">Ibu</label>
                                                            <input type="text" class="form-control" id="editibu" name="ibu" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- End edit Anggota Modal -->

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

    <script src="<?= base_url('assets/admin') ?>/plugins/table/datatable/datatables.js"></script>
    <script src="<?= base_url('assets/admin') ?>/plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="<?= base_url('assets') ?>/main/editpenduduk.js"></script>