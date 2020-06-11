<?php

namespace App\Controllers;

class Main extends BaseController
{
    public function index()
    {
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
        $data = [
            'title' => 'Dashboard',
            'name' => $this->session->get('name'),
            'role' => $this->session->get('role'),
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

            $perusahaanDB = $this->db->table("domisili_warga");
            $perusahaanDB->insert($data);

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

            $perusahaanDB = $this->db->table("sktm");
            $perusahaanDB->insert($data);

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
}
