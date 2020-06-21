<?php

namespace App\Controllers;

class Main extends BaseController
{
    public function index()
    {
        if ($this->session->get('role') == 'employe') {
            $fetchEmploye = $this->employes->where('id', $this->session->get('id'))->first();
            if ($fetchEmploye['password'] == md5('12345678')) {
                return redirect()->to('/login/confirmPassword');
            }
        }

        if (!$this->session->get('password')) {
            return redirect()->to('/lockscreen');
        }

        if (!$this->session->get('name')) {

            $this->session->setFlashdata('notif', '<div class="alert alert-danger mb-4" style="margin-top: -30px;" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg></button>
            Anda Belum Login, Silakan Login Dulu. </button>
        </div>');
            return redirect()->to('/');
        }

        $fetchData = $this->employes->where('id', $this->session->get('id'))->first();

        $data = [
            'title' => 'Dashboard',
            'name' => $this->session->get('name'),
            'role' => $this->session->get('role'),
            'avatar' => $fetchData['foto']
        ];

        echo view('template/header', $data);
        echo view('template/navbar', $data);
        echo view('template/sidebar');
        echo view('template/main', $data);
        echo view('template/footer');
    }

    public function dashboard()
    {
        echo view('admin/dashboard');
    }

    // ==========================================================
    // Penduduk
    // ==========================================================

    public function penduduk()
    {
        $data = [
            'dataPenduduk' => $this->kk->findAll(),
            'jmlkk' => $this->kk->countAllResults(),
            'jmllakilaki' => $this->anggota->where('jk', 'Laki-Laki')->countAllResults(),
            'jmlperempuan' => $this->anggota->where('jk', 'Perempuan')->countAllResults()
        ];
        echo view('admin/penduduk', $data);
    }

    public function deletePendudukProcess()
    {
        $id = $this->request->getPost('id');

        $this->anggota->where('kk_id', $id)->delete();
        $this->kk->delete($id);

        echo "success";
    }

    public function addPenduduk()
    {
        echo view('admin/addtemplate/addPenduduk');
    }

    public function addPendudukProcess()
    {
        $nokk = $this->request->getPost('nokk');
        $kepala = $this->request->getPost('kepala');
        $anggota = $this->request->getPost('anggota');
        $alamat = $this->request->getPost('alamat');
        $rt = $this->request->getPost('rt');
        $desa = $this->request->getPost('desa');
        $kec = $this->request->getPost('kec');
        $kab = $this->request->getPost('kab');
        $pos = $this->request->getPost('pos');
        $provinsi = $this->request->getPost('provinsi');

        $data = [
            'nokk' => $nokk,
            'kepalakk' => $kepala,
            'jmlanggota' => $anggota,
            'alamat' => $alamat,
            'rtrw' => $rt,
            'desa' => $desa,
            'kecamatan' => $kec,
            'kabupaten' => $kab,
            'kodepos' => $pos,
            'provinsi' => $provinsi
        ];

        $checkNoKK = $this->kk->where('nokk', $nokk)->first();
        if (!$checkNoKK) {
            $this->kk->insert($data);
            echo 'success';
        } else {
            echo "failed";
        }
    }

    public function updatePenduduk()
    {
        $id = $this->request->getPost('id');
        $data = [
            $this->request->getPost('table') =>  $this->request->getPost('value')
        ];

        $this->kk->update($id, $data);

        echo "success";
    }

    public function fetchNoKK()
    {
        $nokk = $this->request->getPost('nokk');
        $checkNoKK = $this->kk->where('nokk', $nokk)->first();

        echo $checkNoKK['id'];
    }

    public function fetchAnggota()
    {
        $id = $this->request->getPost('kkid');

        $check = $this->anggota->where('kk_id', $id)->findAll();

        echo json_encode($check);
    }

    public function addAnggota()
    {
        $kkid = $this->request->getPost('idkk');
        $nama = $this->request->getPost('nama');
        $nik = $this->request->getPost('nik');
        $jk = $this->request->getPost('jk');
        $tempatlahir = $this->request->getPost('tempatlahir');
        $tanggallahir = $this->request->getPost('tanggallahir');
        $agama = $this->request->getPost('agama');
        $pendidikan = $this->request->getPost('pendidikan');
        $pekerjaan = $this->request->getPost('pekerjaan');
        $goldarah = $this->request->getPost('goldarah');
        $statuskawin = $this->request->getPost('statuskawin');
        $tglkawin = $this->request->getPost('tglkawin');
        $hubungan = $this->request->getPost('hubungan');
        $kewarganegaraan = $this->request->getPost('kewarganegaraan');
        $paspor = $this->request->getPost('paspor');
        $kitap = $this->request->getPost('kitap');
        $ayah = $this->request->getPost('ayah');
        $ibu = $this->request->getPost('ibu');

        $data = [
            'kk_id' => $kkid,
            'nama' => $nama,
            'nik' => $nik,
            'jk' => $jk,
            'tempat_lahir' => $tempatlahir,
            'tanggal_lahir' => $tanggallahir,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'golongan_darah' => $goldarah,
            'status_nikah' => $statuskawin,
            'tgl_nikah' => $tglkawin,
            'hubungan' => $hubungan,
            'kewarganegaraan' => $kewarganegaraan,
            'paspor' => $paspor,
            'kitap' => $kitap,
            'ayah' => $ayah,
            'ibu' => $ibu
        ];

        $checkNIK = $this->anggota->where('nik', $nik)->first();
        if (!$checkNIK) {
            $this->anggota->insert($data);
            echo 'success';
        } else {
            echo "failed";
        }
    }

    public function editPenduduk()
    {
        $id = $this->request->uri->getSegment(3);
        $data = [
            'dataPenduduk' => $this->kk->where('id', $id)->first()
        ];
        echo view('admin/editTemplate/editPenduduk', $data);
    }

    public function updateAnggota()
    {
        $id = $this->request->getPost('id');

        $fetchAnggota = $this->anggota->where('id', $id)->first();

        echo json_encode($fetchAnggota);
    }

    public function updateAnggotaProccess()
    {
        $id = $this->request->getPost('id');
        $kkid = $this->request->getPost('idkk');
        $nama = $this->request->getPost('nama');
        $nik = $this->request->getPost('nik');
        $jk = $this->request->getPost('jk');
        $tempatlahir = $this->request->getPost('tempatlahir');
        $tanggallahir = $this->request->getPost('tanggallahir');
        $agama = $this->request->getPost('agama');
        $pendidikan = $this->request->getPost('pendidikan');
        $pekerjaan = $this->request->getPost('pekerjaan');
        $goldarah = $this->request->getPost('goldarah');
        $statuskawin = $this->request->getPost('statuskawin');
        $tglkawin = $this->request->getPost('tglkawin');
        $hubungan = $this->request->getPost('hubungan');
        $kewarganegaraan = $this->request->getPost('kewarganegaraan');
        $paspor = $this->request->getPost('paspor');
        $kitap = $this->request->getPost('kitap');
        $ayah = $this->request->getPost('ayah');
        $ibu = $this->request->getPost('ibu');

        $data = [
            'kk_id' => $kkid,
            'nama' => $nama,
            'nik' => $nik,
            'jk' => $jk,
            'tempat_lahir' => $tempatlahir,
            'tanggal_lahir' => $tanggallahir,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'golongan_darah' => $goldarah,
            'status_nikah' => $statuskawin,
            'tgl_nikah' => $tglkawin,
            'hubungan' => $hubungan,
            'kewarganegaraan' => $kewarganegaraan,
            'paspor' => $paspor,
            'kitap' => $kitap,
            'ayah' => $ayah,
            'ibu' => $ibu
        ];

        $this->anggota->update($id, $data);

        echo 'success';
    }

    public function deleteAnggota()
    {
        $id = $this->request->getPost('id');

        $this->anggota->delete($id);

        echo 'success';
    }

    // ========================================================
    // Pegawai
    // ========================================================
    public function employe()
    {
        $data = [
            'employe' => $this->employes->findAll()
        ];
        echo view('admin/employe', $data);
    }

    public function addEmploye()
    {
        $nip = $this->request->getPost('nip');
        $nama = $this->request->getPost('nama');
        $jabatan = $this->request->getPost('jabatan');

        $data = [
            'nip' => $nip,
            'nama' => $nama,
            'jabatan' => $jabatan,
            'foto' => 'default.png',
            'password' => md5('12345678')
        ];

        $fetchNip = $this->employes->where('nip', $nip)->first();
        if (!$fetchNip) {
            $this->employes->insert($data);
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function resetEmploye()
    {
        $id = $this->request->getPost('id');

        $data = [
            'password' => md5('12345678')
        ];

        $this->employes->update($id, $data);

        echo "success";
    }

    public function deleteEmploye()
    {
        $id = $this->request->getPost('id');
        $this->employes->where('id', $id)->delete();

        echo "success";
    }

    // ========================================================
    // Surat
    // ========================================================

    public function getDataNik()
    {
        $nik = $this->request->getPost('nik');

        $anggotakk = $this->anggota->where('nik', $nik)->first();
        $anggotaId = $anggotakk['kk_id'];

        if ($anggotakk['kk_id'] != "") {
            $fetchData = $this->db->query("SELECT a.*, b.nokk, b.kepalakk FROM anggota_kk a, kk b WHERE a.kk_id=b.id AND a.kk_id=$anggotaId");
            echo json_encode($fetchData->getResultArray());
        } else {
            echo json_encode('');
        }
    }

    public function getDataAnggota()
    {
        $id = $this->request->getPost('id');
        $anggotakk = $this->anggota->where('id', $id)->first();

        echo json_encode($anggotakk);
    }

    public function suratPerusahaan()
    {
        echo view('admin/surat/perusahaan');
    }

    public function noSuratPerusahaan()
    {
        $countOfYear = $this->db->query("SELECT * FROM domisili_perusahaan WHERE YEAR(tanggal_surat) = YEAR(CURDATE())");
        $nomorSurat = count($countOfYear->getResultArray()) + 1;
        $nomorSuratDes = sprintf("%03d", $nomorSurat);

        echo $nomorSuratDes . '/' . date('Y') . '/SKDP/Kel';
    }

    public function prosesPerusahaan()
    {
        $id = $this->request->getPost('id');
        $nosurat = $this->request->getPost('noSurat');
        $naper = $this->request->getPost('namaper');
        $bidang = $this->request->getPost('bidang');
        $status = $this->request->getPost('status');
        $tjawab = $this->request->getPost('bidang');
        $penper = $this->request->getPost('penPer');
        $alamat = $this->request->getPost('alamat');

        if ($nosurat) {
            $data = [
                'anggota_kk_id' => $id,
                'no_surat' => $nosurat,
                'nama_perusahaan' => $naper,
                'bidang' => $bidang,
                'status_bangunan' => $status,
                'pendirian' => $penper,
                'penanggung' => $tjawab,
                'alamat_perusahaan' => $alamat,
                'tanggal_surat' => date("Y-m-d"),
                'masa_berlaku' => date('Y-m-d', strtotime('+3 month', strtotime(date('Y-m-d')))),
                'created_by' => $this->session->get('id'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];

            $perusahaanDB = $this->db->table("domisili_perusahaan");
            $perusahaanDB->insert($data);

            $fetchPerusahaan = $this->db->query("SELECT * FROM domisili_perusahaan WHERE no_surat='$nosurat'");
            $perusahaan = $fetchPerusahaan->getRowArray();

            $this->session->set('idComp', $perusahaan['id']);
            $this->session->set('idAnggota', $perusahaan['anggota_kk_id']);

            echo "success";
        }
    }

    public function printPerusahaan()
    {
        $id = $this->session->get('idComp');
        $idAnggota = $this->session->get('idAnggota');

        $checkAnggota = $this->db->table('anggota_kk');
        $checkAnggota->select('anggota_kk.*, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $checkAnggota->join('kk', 'kk.id=anggota_kk.kk_id');
        $checkAnggota->where('anggota_kk.id', $idAnggota);

        $fetchPerusahaan = $this->db->query("SELECT * FROM domisili_perusahaan WHERE id='$id'");

        $data = [
            'title' => "Cetak Domisili Perusahaan",
            'datadiri' => $checkAnggota->get()->getRowArray(),
            'detail' => $fetchPerusahaan->getRowArray()
        ];

        if ($fetchPerusahaan->getRowArray()) {
            echo view('template/surat/perusahaan', $data);
        }
    }

    public function suratUsaha()
    {
        echo view('admin/surat/usaha');
    }

    public function prosesUsaha()
    {
        $countOfYear = $this->db->query("SELECT * FROM domisili_usaha WHERE YEAR(tanggal_surat) = YEAR(CURDATE())");
        $nomorSurat = count($countOfYear->getResultArray()) + 1;
        $nomorSuratDes = sprintf("%03d", $nomorSurat);

        $nosurat = $nomorSuratDes . '/' . date('Y') . '/SKDU/Kel';

        $id = $this->request->getPost('id');
        $jenisUsaha = $this->request->getPost('jenis');
        $mulaiUsaha = $this->request->getPost('mulai');
        $alamatUsaha = $this->request->getPost('alamat');

        $data = [
            'anggota_kk_id' => $id,
            'no_surat' => $nosurat,
            'jenis_usaha' => $jenisUsaha,
            'mulai_usaha' => $mulaiUsaha,
            'alamat_usaha' => $alamatUsaha,
            'masa_berlaku' => date('Y-m-d', strtotime('+3 month', strtotime(date('Y-m-d')))),
            'tanggal_surat' => date("Y-m-d"),
            'created_by' => $this->session->get('id'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $usahaDB = $this->db->table("domisili_usaha");
        $usahaDB->insert($data);

        $fetchUsaha = $this->db->query("SELECT * FROM domisili_usaha WHERE no_surat='$nosurat'");
        $usaha = $fetchUsaha->getRowArray();

        $this->session->set('idUsaha', $usaha['id']);
        $this->session->set('idAnggota', $usaha['anggota_kk_id']);

        echo "success";
    }

    public function printUsaha()
    {
        $id = $this->session->get('idUsaha');
        $idAnggota = $this->session->get('idAnggota');

        $checkAnggota = $this->db->table('anggota_kk');
        $checkAnggota->select('anggota_kk.*, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $checkAnggota->join('kk', 'kk.id=anggota_kk.kk_id');
        $checkAnggota->where('anggota_kk.id', $idAnggota);

        $fetchUsaha = $this->db->query("SELECT * FROM domisili_usaha WHERE id='$id'");

        $data = [
            'title' => "Cetak Domisili Usaha",
            'detail' => $fetchUsaha->getRowArray(),
            'datadiri' => $checkAnggota->get()->getRowArray()
        ];

        if ($fetchUsaha->getRowArray()) {
            echo view('template/surat/usaha', $data);
        }
    }

    public function suratWarga()
    {
        echo view('admin/surat/warga');
    }

    public function prosesWarga()
    {
        $countOfYear = $this->db->query("SELECT * FROM domisili_warga WHERE YEAR(tanggal_surat) = YEAR(CURDATE())");
        $nomorSurat = count($countOfYear->getResultArray()) + 1;
        $nomorSuratDes = sprintf("%03d", $nomorSurat);

        $nosurat = $nomorSuratDes . '/' . date('Y') . '/SKDW/Kel';

        $id = $this->request->getPost('id');

        if ($id) {
            $data = [
                'anggota_kk_id' => $id,
                'no_surat' => $nosurat,
                'tanggal_surat' => date("Y-m-d"),
                'masa_berlaku' => date('Y-m-d', strtotime('+3 month', strtotime(date('Y-m-d')))),
                'created_by' => $this->session->get('id'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];

            $wargaDB = $this->db->table("domisili_warga");
            $wargaDB->insert($data);

            $fetchWarga = $this->db->query("SELECT * FROM domisili_warga WHERE no_surat='$nosurat'");
            $warga = $fetchWarga->getRowArray();

            $this->session->set('idWarga', $warga['id']);
            $this->session->set('idAnggota', $warga['anggota_kk_id']);

            echo "success";
        }
    }

    public function printWarga()
    {
        $id = $this->session->get('idWarga');
        $idAnggota = $this->session->get('idAnggota');

        $checkAnggota = $this->db->table('anggota_kk');
        $checkAnggota->select('anggota_kk.*, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $checkAnggota->join('kk', 'kk.id=anggota_kk.kk_id');
        $checkAnggota->where('anggota_kk.id', $idAnggota);

        $fetchWarga = $this->db->query("SELECT * FROM domisili_warga WHERE id='$id'");

        $data = [
            'title' => "Cetak Domisili Warga",
            'datadiri' => $checkAnggota->get()->getRowArray(),
            'detail' => $fetchWarga->getRowArray()
        ];

        if ($fetchWarga->getRowArray()) {
            echo view('template/surat/warga', $data);
        }
    }

    public function suratKematian()
    {
        echo view('admin/surat/kematian');
    }

    public function prosesKematian()
    {
        $countOfYear = $this->db->query("SELECT * FROM kematian WHERE YEAR(tanggal_surat) = YEAR(CURDATE())");
        $nomorSurat = count($countOfYear->getResultArray()) + 1;
        $nomorSuratDes = sprintf("%03d", $nomorSurat);

        $nosurat = $nomorSuratDes . '/' . date('Y') . '/SKK/Kel';

        $idPelapor = $this->request->getPost('idpelapor');

        $idMeninggal = $this->request->getPost('idmeninggal');
        $fetchNikMeninggal = $this->db->query("SELECT * FROM anggota_kk WHERE id='$idMeninggal'");
        $nikMeninggal = $fetchNikMeninggal->getRowArray();

        $hari = $this->request->getPost('hari');
        $bin = $this->request->getPost('bin');
        $tanggal = $this->request->getPost('tanggal');
        $jam = $this->request->getPost('jam');
        $lokasi = $this->request->getPost('lokasi');
        $hubungan = $this->request->getPost('hubungan');

        if ($idPelapor) {
            $data = [
                'no_surat' => $nosurat,
                'anggota_kk_id' => $idPelapor,
                'nik_meninggal' => $nikMeninggal['nik'],
                'bin' => $bin,
                'hari' => $hari,
                'tanggal' => $tanggal,
                'jam' => $jam,
                'lokasi' => $lokasi,
                'hubungan' => $hubungan,
                'tanggal_surat' => date("Y-m-d"),
                'created_by' => $this->session->get('id'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];

            $kematianDB = $this->db->table("kematian");
            $kematianDB->insert($data);

            $fetchKematian = $this->db->query("SELECT * FROM kematian WHERE no_surat='$nosurat'");
            $kematian = $fetchKematian->getRowArray();

            $this->session->set('idKematian', $kematian['id']);
            $this->session->set('idAnggota', $kematian['anggota_kk_id']);
            $this->session->set('nikMeninggal', $kematian['nik_meninggal']);

            echo "success";
        }
    }

    public function printKematian()
    {
        $id = $this->session->get('idKematian');
        $idAnggota = $this->session->get('idAnggota');
        $nikMeninggal = $this->session->get('nikMeninggal');

        $checkPelapor = $this->db->table('anggota_kk');
        $checkPelapor->select('anggota_kk.*, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $checkPelapor->join('kk', 'kk.id=anggota_kk.kk_id');
        $checkPelapor->where('anggota_kk.id', $idAnggota);

        $checkMeninggal = $this->db->table('anggota_kk');
        $checkMeninggal->select('anggota_kk.*, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $checkMeninggal->join('kk', 'kk.id=anggota_kk.kk_id');
        $checkMeninggal->where('anggota_kk.nik', $nikMeninggal);

        $fetchKematian = $this->db->query("SELECT * FROM kematian WHERE id='$id'");

        $data = [
            'title' => "Cetak Keterangan Kematian",
            'datadiri' => $checkPelapor->get()->getRowArray(),
            'datameninggal' => $checkMeninggal->get()->getRowArray(),
            'detail' => $fetchKematian->getRowArray()
        ];

        if ($fetchKematian->getRowArray()) {
            echo view('template/surat/kematian', $data);
        }
    }

    public function suratPindah()
    {
        echo view('admin/surat/pindah');
    }

    public function prosesPindah()
    {
        $countOfYear = $this->db->query("SELECT * FROM pindah WHERE YEAR(tanggal_surat) = YEAR(CURDATE())");
        $nomorSurat = count($countOfYear->getResultArray()) + 1;
        $nomorSuratDes = sprintf("%03d", $nomorSurat);

        $nosurat = $nomorSuratDes . '/' . date('Y') . '/SKP/Kel';

        $id = $this->request->getPost('id');
        $alasan = $this->request->getPost('alasan');
        $klasifikasi = $this->request->getPost('klasifikasi');
        $jenis = $this->request->getPost('jenis');
        $alamat = $this->request->getPost('alamat');
        $rt = $this->request->getPost('rt');
        $desa = $this->request->getPost('desa');
        $kecamatan = $this->request->getPost('kecamatan');
        $kab = $this->request->getPost('kab');
        $provinsi = $this->request->getPost('prov');
        $tanggal = $this->request->getPost('tanggal');

        if ($id) {
            $data = [
                'anggota_kk_id' => $id,
                'no_surat' => $nosurat,
                'alasan' => $alasan,
                'klasifikasi' => $klasifikasi,
                'jenis_kepindahan' => $jenis,
                'alamat_tujuan' => $alamat,
                'rt_tujuan' => $rt,
                'desa_tujuan' => $desa,
                'kecamatan_tujuan' => $kecamatan,
                'kabupaten_tujuan' => $kab,
                'provinsi' => $provinsi,
                'tanggal_pindah' => $tanggal,
                'tanggal_surat' => date("Y-m-d"),
                'created_by' => $this->session->get('id'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];

            $pindahDB = $this->db->table("pindah");
            $pindahDB->insert($data);

            $fetchPindah = $this->db->query("SELECT * FROM pindah WHERE no_surat='$nosurat'");
            $pindah = $fetchPindah->getRowArray();

            $this->session->set('idPindah', $pindah['id']);
            $this->session->set('idAg', $pindah['anggota_kk_id']);

            echo $pindah['id'];
        }
    }

    public function insertPindahAnggota()
    {
        $idPindah = $this->request->getPost('idPindah');
        $idAnggota = $this->request->getPost('idAg');

        $fetchAnggota = $this->anggota->where('id', $idAnggota)->first();

        $nik = $fetchAnggota['nik'];

        $fetchPindah = $this->db->query("SELECT * FROM pindah_anggota WHERE nik='$nik'");

        if (!$fetchPindah->getRowArray()) {
            $data = [
                'pindah_id' => $idPindah,
                'nik' => $fetchAnggota['nik'],
                'nama' => $fetchAnggota['nama'],
                'jk' => $fetchAnggota['jk'],
                'status' => $fetchAnggota['status_nikah'],
                'hdk' => $fetchAnggota['hubungan']
            ];

            $insertPindahDB = $this->db->table("pindah_anggota");
            $insertPindahDB->insert($data);
        } else {
            $deletePindahDB = $this->db->table("pindah_anggota");
            $deletePindahDB->delete(['nik' => $nik]);
        }
    }

    public function printPindah()
    {
        $id = $this->session->get('idPindah');
        $idAg = $this->session->get('idAg');

        $checkAnggota = $this->db->table('anggota_kk');
        $checkAnggota->select('anggota_kk.*, kk.nokk, kk.kepalakk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $checkAnggota->join('kk', 'kk.id=anggota_kk.kk_id');
        $checkAnggota->where('anggota_kk.id', $idAg);

        $fetchPindah = $this->db->query("SELECT * FROM pindah WHERE id='$id'");

        $detailAnggota = $this->db->query("SELECT * FROM pindah_anggota WHERE pindah_id='$id'");

        $data = [
            'title' => "Cetak Keterangan Pindah",
            'datadiri' => $checkAnggota->get()->getRowArray(),
            'detail' => $fetchPindah->getRowArray(),
            'detailAnggota' => $detailAnggota->getResultArray()
        ];

        if ($fetchPindah->getRowArray()) {
            echo view('template/surat/pindah', $data);
        }
    }

    public function suratSktm()
    {
        echo view('admin/surat/sktm');
    }

    public function prosesSktm()
    {
        $countOfYear = $this->db->query("SELECT * FROM sktm WHERE YEAR(tanggal_surat) = YEAR(CURDATE())");
        $nomorSurat = count($countOfYear->getResultArray()) + 1;
        $nomorSuratDes = sprintf("%03d", $nomorSurat);

        $nosurat = $nomorSuratDes . '/' . date('Y') . '/SKTM/Kel';

        $id = $this->request->getPost('id');

        if ($id) {
            $data = [
                'anggota_kk_id' => $id,
                'no_surat' => $nosurat,
                'tanggal_surat' => date("Y-m-d"),
                'created_by' => $this->session->get('id'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];

            $sktmDB = $this->db->table("sktm");
            $sktmDB->insert($data);

            $fetchSktm = $this->db->query("SELECT * FROM sktm WHERE no_surat='$nosurat'");
            $sktm = $fetchSktm->getRowArray();

            $this->session->set('idSktm', $sktm['id']);
            $this->session->set('idAnggota', $sktm['anggota_kk_id']);

            echo "success";
        }
    }

    public function printSktm()
    {
        $id = $this->session->get('idSktm');
        $idAnggota = $this->session->get('idAnggota');

        $checkAnggota = $this->db->table('anggota_kk');
        $checkAnggota->select('anggota_kk.*, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $checkAnggota->join('kk', 'kk.id=anggota_kk.kk_id');
        $checkAnggota->where('anggota_kk.id', $idAnggota);

        $fetchSktm = $this->db->query("SELECT * FROM sktm WHERE id='$id'");

        $data = [
            'title' => "Cetak Domisili Warga",
            'datadiri' => $checkAnggota->get()->getRowArray(),
            'detail' => $fetchSktm->getRowArray()
        ];

        if ($fetchSktm->getRowArray()) {
            echo view('template/surat/sktm', $data);
        }
    }

    // ========================================================
    // Report
    // ========================================================

    public function domisiliPerusahaan()
    {
        echo view('admin/report/domisiliPerusahaan');
    }

    public function getDomisiliPerusahaan()
    {
        $tanggal = $this->request->getPost('date');

        if ($tanggal == "") {
            $check = $this->report->getDomisiliPerusahaan();
        } else if (strlen($tanggal) == 10) {
            $check = $this->report->getDomisiliPerusahaanFilerSingle($tanggal);
        } else {
            $check = $this->report->getDomisiliPerusahaanFilerRange(substr($tanggal, 0, 10), substr($tanggal, 14));
        }
        echo json_encode($check);
    }

    public function rePrintCompProcess()
    {
        $id = $this->request->getPost('id');

        $builder = $this->db->table('domisili_perusahaan');
        $fetchComp = $builder->where('id', $id);
        $comp = $fetchComp->get()->getRowArray();

        $this->session->set('idComp', $id);
        $this->session->set('idAnggota', $comp['anggota_kk_id']);

        echo 'success';
    }

    public function domisiliUsaha()
    {
        echo view('admin/report/domisiliUsaha');
    }

    public function getDomisiliUsaha()
    {
        $tanggal = $this->request->getPost('date');

        if ($tanggal == "") {
            $check = $this->report->getDomisiliUsaha();
        } else if (strlen($tanggal) == 10) {
            $check = $this->report->getDomisiliUsahaFilerSingle($tanggal);
        } else {
            $check = $this->report->getDomisiliUsahaFilerRange(substr($tanggal, 0, 10), substr($tanggal, 14));
        }
        echo json_encode($check);
    }

    public function rePrintUsahaProcess()
    {
        $id = $this->request->getPost('id');

        $builder = $this->db->table('domisili_usaha');
        $fetchComp = $builder->where('id', $id);
        $comp = $fetchComp->get()->getRowArray();

        $this->session->set('idUsaha', $id);
        $this->session->set('idAnggota', $comp['anggota_kk_id']);

        echo 'success';
    }

    public function domisiliWarga()
    {
        echo view('admin/report/domisiliWarga');
    }

    public function getDomisiliWarga()
    {
        $tanggal = $this->request->getPost('date');

        if ($tanggal == "") {
            $check = $this->report->getDomisiliWarga();
        } else if (strlen($tanggal) == 10) {
            $check = $this->report->getDomisiliWargaFilerSingle($tanggal);
        } else {
            $check = $this->report->getDomisiliWargaFilerRange(substr($tanggal, 0, 10), substr($tanggal, 14));
        }
        echo json_encode($check);
    }

    public function rePrintWargaProcess()
    {
        $id = $this->request->getPost('id');

        $builder = $this->db->table('domisili_warga');
        $fetchWarga = $builder->where('id', $id);
        $warga = $fetchWarga->get()->getRowArray();

        $this->session->set('idWarga', $id);
        $this->session->set('idAnggota', $warga['anggota_kk_id']);

        echo 'success';
    }

    public function kematian()
    {
        echo view('admin/report/kematian');
    }

    public function getKematian()
    {
        $tanggal = $this->request->getPost('date');

        if ($tanggal == "") {
            $check = $this->report->getKematian();
        } else if (strlen($tanggal) == 10) {
            $check = $this->report->getKematianFilerSingle($tanggal);
        } else {
            $check = $this->report->getKematianFilerRange(substr($tanggal, 0, 10), substr($tanggal, 14));
        }
        echo json_encode($check);
    }

    public function rePrintKematianProcess()
    {
        $id = $this->request->getPost('id');

        $builder = $this->db->table('kematian');
        $fetchComp = $builder->where('id', $id);
        $comp = $fetchComp->get()->getRowArray();

        $this->session->set('idKematian', $id);
        $this->session->set('idAnggota', $comp['anggota_kk_id']);
        $this->session->set('nikMeninggal', $comp['nik_meninggal']);

        echo 'success';
    }

    public function reportPindah()
    {
        echo view('admin/report/pindah');
    }

    public function getPindah()
    {
        $tanggal = $this->request->getPost('date');

        if ($tanggal == "") {
            $check = $this->report->getPindah();
        } else if (strlen($tanggal) == 10) {
            $check = $this->report->getPindahFilerSingle($tanggal);
        } else {
            $check = $this->report->getPindahFilerRange(substr($tanggal, 0, 10), substr($tanggal, 14));
        }
        echo json_encode($check);
    }

    public function getPindahAnggota()
    {
        $id = $this->request->getPost('id');

        $builder = $this->db->table('pindah_anggota');
        $getAnggota = $builder->where('pindah_id', $id);

        echo json_encode($getAnggota->get()->getResultArray());
    }

    public function rePrintPindahProcess()
    {
        $id = $this->request->getPost('id');

        $builder = $this->db->table('pindah');
        $fetchPindah = $builder->where('id', $id);
        $pindah = $fetchPindah->get()->getRowArray();

        $this->session->set('idPindah', $id);
        $this->session->set('idAg', $pindah['anggota_kk_id']);

        echo 'success';
    }

    public function sktm()
    {
        echo view('admin/report/sktm');
    }

    public function getSktm()
    {
        $tanggal = $this->request->getPost('date');

        if ($tanggal == "") {
            $check = $this->report->getSktm();
        } else if (strlen($tanggal) == 10) {
            $check = $this->report->getSktmFilerSingle($tanggal);
        } else {
            $check = $this->report->getSktmFilerRange(substr($tanggal, 0, 10), substr($tanggal, 14));
        }
        echo json_encode($check);
    }

    public function rePrintSktmProcess()
    {
        $id = $this->request->getPost('id');

        $builder = $this->db->table('sktm');
        $fetchSktm = $builder->where('id', $id);
        $sktm = $fetchSktm->get()->getRowArray();

        $this->session->set('idSktm', $id);
        $this->session->set('idAnggota', $sktm['anggota_kk_id']);

        echo 'success';
    }

    // ========================================================
    // Profile
    // ========================================================

    public function profile()
    {
        $data = [
            'profile' => $this->employes->where('id', $this->session->get('id'))->first()
        ];
        echo view('admin/profile', $data);
    }

    public function processUploadAvatar()
    {

        $validated = $this->validate([
            'avatar' => 'uploaded[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png]|max_size[avatar,2048]'
        ]);

        if ($validated == FALSE) {
            echo 'Gagal';
        } else {

            $getData = $this->employes->where('id', $this->session->get('id'))->first();

            if ($getData['foto'] != "default.png") {
                unlink(FCPATH . '/assets/img/avatar/' . $getData['foto']);
            }

            $avatar = $this->request->getFile('avatar');
            $name = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/assets/img/avatar', $name);

            $data = [
                'foto' => $avatar->getName()
            ];

            $this->employes->update($this->session->get('id'), $data);

            echo "success";
        }
    }

    public function processUploadTtd()
    {

        $validated = $this->validate([
            'uploadttd' => 'uploaded[uploadttd]|mime_in[uploadttd,image/jpg,image/jpeg,image/gif,image/png]|max_size[uploadttd,2048]'
        ]);

        if ($validated == FALSE) {
            echo 'Gagal';
        } else {

            $getData = $this->employes->where('id', $this->session->get('id'))->first();

            if ($getData['ttd']) {
                unlink(FCPATH . '/assets/img/ttd/' . $getData['foto']);
            }

            $ttd = $this->request->getFile('uploadttd');
            $name = $ttd->getRandomName();
            $ttd->move(ROOTPATH . 'public/assets/img/ttd', $name);

            $data = [
                'ttd' => $ttd->getName()
            ];

            $this->employes->update($this->session->get('id'), $data);

            echo "success";
        }
    }

    public function getAvatarEmploye()
    {
        $getData = $this->employes->where('id', $this->session->get('id'))->first();

        echo json_encode($getData);
    }

    // ========================================================
    // Logout
    // ========================================================
    public function logout()
    {
        $this->session->remove('name');

        if ($this->session->get('role') == 'admin') :
            $this->session->remove('username');
            return redirect()->to('/cp-admin');
        else :
            $this->session->remove('nip');
            return redirect()->to('/');
        endif;
    }

    public function logoff()
    {
        $this->session->remove('password');

        return redirect()->to('/lockscreen');
    }
}
