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
                                <h5><b>Tambah Penduduk</b></h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row justify-content-end">
                                <button class="btn btn-success mr-3" id="selesai" onclick="loadPenduduk()">Selesai</button>
                            </div>
                        </div>
                    </div>

                    <form id="formAddMain" action="javascript:void(0);" novalidate>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-sm-6 mt-4">
                                <div class="form-group">
                                    <label for="">No KK</label>
                                    <input type="text" class="form-control" id="nokk" name="nokk">
                                    <div id="nokkError" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Kepala KK</label>
                                    <input type="text" class="form-control" id="kepala" name="kepala">
                                    <div id="kepalaError" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Anggota</label>
                                    <input type="text" class="form-control" id="anggota" name="anggota">
                                    <div id="anggotaError" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                    <div id="alamatError" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">RT/RW</label>
                                    <input type="text" class="form-control" id="rt" name="rt">
                                    <div id="rtError" class="invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-sm-6 mt-4">
                                <div class="form-group">
                                    <label for="">Desa/Kelurrahan</label>
                                    <input type="text" class="form-control" id="desa" name="desa">
                                    <div id="desaError" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Kecamatan</label>
                                    <input type="text" class="form-control" id="kec" name="kec">
                                    <div id="kecError" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Kabupaten/Kota</label>
                                    <input type="text" class="form-control" id="kab" name="kab">
                                    <div id="kabError" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Kode Pos</label>
                                    <input type="text" class="form-control" id="pos" name="pos">
                                    <div id="posError" class="invalid-feedback"></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" name="provinsi">
                                    <div id="provError" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group mr-3">
                                <button type="submit" class="btn btn-info mt-3 mr-3" onclick="addMainPenduduk()"><svg id="loading-button" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2">
                                        <line x1="12" y1="2" x2="12" y2="6"></line>
                                        <line x1="12" y1="18" x2="12" y2="22"></line>
                                        <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line>
                                        <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line>
                                        <line x1="2" y1="12" x2="6" y2="12"></line>
                                        <line x1="18" y1="12" x2="22" y2="12"></line>
                                        <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line>
                                        <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line>
                                    </svg> Simpan Data</button>
                            </div>
                        </div>
                    </form>

                    <div class="row justify-content-center">
                        <div id="daftarAnggota" class="col-xl-12 col-lg-12 col-sm-12">

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
                                    <tbody>
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
                                                            <input type="hidden" id="idkk" name="idkk">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nik">NIK</label>
                                                            <input type="text" class="form-control" id="nik" name="nik" required>
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
                                                            <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggallahir">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required>
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
                                                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pekerjaan">Jenis Pekerjaan</label>
                                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
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
                                                            <input type="text" class="form-control" id="statuskawin" name="statuskawin" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tglkawin">Tanggal Perkawinan</label>
                                                            <input type="text" class="form-control" id="tglkawin" name="tglkawin" placeholder="Contoh : 24-06-1990" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hubungan">Hubungan Dalam Keluarga</label>
                                                            <input type="text" class="form-control" id="hubungan" name="hubungan" required>
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
                                                            <input type="text" class="form-control" id="paspor" name="paspor" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kitap">No. KITAP</label>
                                                            <input type="text" class="form-control" id="kitap" name="kitap" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ayah">Ayah</label>
                                                            <input type="text" class="form-control" id="ayah" name="ayah" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ibu">Ibu</label>
                                                            <input type="text" class="form-control" id="ibu" name="ibu" required>
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
                                                            <input type="text" class="form-control" id="editnama" name="nama" required>
                                                            <input type="hidden" id="editidkk" name="idkk">
                                                            <input type="hidden" id="idag" name="id">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nik">NIK</label>
                                                            <input type="text" class="form-control" id="editnik" name="nik" required>
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
                                                            <input type="text" class="form-control" id="edittempatlahir" name="tempatlahir" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tanggallahir">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" id="edittanggallahir" name="tanggallahir" required>
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
                                                            <input type="text" class="form-control" id="editpendidikan" name="pendidikan" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pekerjaan">Jenis Pekerjaan</label>
                                                            <input type="text" class="form-control" id="editpekerjaan" name="pekerjaan" required>
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
                                                            <input type="text" class="form-control" id="editstatuskawin" name="statuskawin" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tglkawin">Tanggal Perkawinan</label>
                                                            <input type="text" class="form-control" id="edittglkawin" name="tglkawin" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hubungan">Hubungan Dalam Keluarga</label>
                                                            <input type="text" class="form-control" id="edithubungan" name="hubungan" required>
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
                                                            <input type="text" class="form-control" id="editpaspor" name="paspor" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kitap">No. KITAP</label>
                                                            <input type="text" class="form-control" id="editkitap" name="kitap" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ayah">Ayah</label>
                                                            <input type="text" class="form-control" id="editayah" name="ayah" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ibu">Ibu</label>
                                                            <input type="text" class="form-control" id="editibu" name="ibu" required>
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

    <script src="<?= base_url('assets/admin') ?>/login/js/scrollspyNav.js"></script>
    <script src="<?= base_url('assets/admin') ?>/plugins/notification/snackbar/snackbar.min.js"></script>
    <script src="<?= base_url('assets') ?>/main/addpenduduk.js"></script>