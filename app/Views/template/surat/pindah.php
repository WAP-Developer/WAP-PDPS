<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="bsi icon" type="image/x-icon" href="favicon.ico">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/main/css') ?>/surat.css">
    <?php
    function tanggal_indonesia($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        );

        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
    ?>

    <script>
        window.print();
    </script>
</head>

<body>

    <table align="center">
        <tr>
            <td>
                <table class="header-cop">
                    <tr>
                        <td>
                            <img src="<?= base_url('assets/img') ?>/karawang.png" width="80px" class="logo" />
                        </td>
                        <td>
                            <div class="kop-title">
                                PEMERINTAH KABUPATEN <?= strtoupper($detaildesa['kab']); ?> <br>
                                KECAMATAN <?= strtoupper($detaildesa['kec']); ?> <br>
                                <b>KELURAHAN <?= strtoupper($detaildesa['kel']); ?></b> <br>
                                <?= $detaildesa['alamat']; ?> Kode Pos <?= $detaildesa['kodepos']; ?>
                            </div>
                        </td>
                    </tr>
                </table>

                <hr class="baseline">

                <div style="width:884px;">

                    <table>
                        <tr>
                            <td width="210">PROVINSI</td>
                            <td>:</td>
                            <td><?= strtoupper($detaildesa['prov']); ?></td>
                        </tr>
                        <tr>
                            <td width="210">KABUPATEN/KOTA</td>
                            <td>:</td>
                            <td><?= strtoupper($detaildesa['kab']); ?></td>
                        </tr>
                        <tr>
                            <td width="210">KECAMATAN</td>
                            <td>:</td>
                            <td><?= strtoupper($detaildesa['kec']); ?></td>
                        </tr>
                        <tr>
                            <td width="210">DESA/KELURAHAN</td>
                            <td>:</td>
                            <td><?= strtoupper($detaildesa['kel']); ?></td>
                        </tr>
                    </table>

                    <div class="jenis-surat">SURAT KETERANGAN PINDAH</div>
                    <div class="nomor-surat">Nomor: <?= $detail['no_surat'] ?></div>
                    <div class="isi">
                        <div>
                            <p><b>DATA DAERAH ASAL :</b></p>
                        </div>
                        <div class="data-pemohon">
                            <table>
                                <tr>
                                    <td width="240">1. Nomor KK</td>
                                    <td>:</td>
                                    <td><?= $datadiri['nokk'] ?></td>
                                </tr>
                                <tr>
                                    <td width="240">2. Nama Kepala Keluarga</td>
                                    <td>:</td>
                                    <td><?= $datadiri['kepalakk'] ?></td>
                                </tr>
                                <tr>
                                    <td width="240" style="vertical-align: top;">3. Alamat Asal</td>
                                    <td style="vertical-align: top;">:</td>
                                    <td><?= $datadiri['alamat'] . " RT/RW. " . $datadiri['rtrw'] . " Desa. " . $datadiri['desa'] . " Kecamatan. " . $datadiri['kecamatan'] . " Kabupaten. " . $datadiri['kabupaten'] . " " . $datadiri['kodepos'] ?></td>
                                </tr>
                                <tr>
                                    <td width="240">4. Nama Pemohon</td>
                                    <td>:</td>
                                    <td><?= $datadiri['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td width="210">5. NIK Pemohon</td>
                                    <td>:</td>
                                    <td><?= $datadiri['nik'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div style="margin-top: 10px;">
                            <p><b>DATA KEPINDAHAN:</b></p>
                        </div>
                        <div class="data-pemohon" style="margin-top: 10px;">
                            <table>
                                <tr>
                                    <td width="240">1. Alasan Pindah</td>
                                    <td>:</td>
                                    <td><?= $detail['alasan'] ?></td>
                                </tr>
                                <tr>
                                    <td width="240">2. Alamat Tujuan Pindah</td>
                                    <td>:</td>
                                    <td><?= $detail['alamat_tujuan'] ?></td>
                                </tr>
                                <tr>
                                    <td width="240">3. Klasifikasi Pindah</td>
                                    <td>:</td>
                                    <td><?= $detail['klasifikasi'] ?></td>
                                </tr>
                                <tr>
                                    <td width="240">4. Jenis Kepindahan</td>
                                    <td>:</td>
                                    <td><?= $detail['jenis_kepindahan'] ?></td>
                                </tr>
                                <tr>
                                    <td width="240">5. Rencana Tanggal Pindah</td>
                                    <td>:</td>
                                    <td><?= date('d-m-Y', strtotime($detail['tanggal_pindah'])) ?></td>
                                </tr>
                                <tr>
                                    <td width="240">6. Keluarga Yang Pindah</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div style="margin-top: 20px;">
                        </div>
                    </div>
                    <center>
                        <table style="border: 1px solid black; border-collapse: collapse; font-size: 23px;">
                            <tr style="border: 1px solid black;">
                                <th style="border: 1px solid black; padding: 10px;">No</th>
                                <th style="border: 1px solid black; padding: 10px;">NIK</th>
                                <th style="border: 1px solid black; padding: 10px;">Nama Anggota Keluarga</th>
                                <th style="border: 1px solid black; padding: 10px;">L/P</th>
                                <th style="border: 1px solid black; padding: 10px;">Status</th>
                                <th style="border: 1px solid black; padding: 10px;">HDK</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($detailAnggota as $da) : ?>
                                <tr style="border: 1px solid black;">
                                    <td style="border: 1px solid black; padding: 8px;" align="center"><?= $no++ ?></td>
                                    <td style="border: 1px solid black; padding: 8px;"><?= $da['nik'] ?></td>
                                    <td style="border: 1px solid black; padding: 8px;"><?= $da['nama'] ?></td>
                                    <td style="border: 1px solid black; padding: 8px;"><?= $da['jk'] ?></td>
                                    <td style="border: 1px solid black; padding: 8px;"><?= $da['status'] ?></td>
                                    <td style="border: 1px solid black; padding: 8px;"><?= $da['hdk'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </center>
                </div>



                <table style="margin-top:100px;">
                    <tr>
                        <td width="439" align="center">Pemohon,</td>
                        <td width="439" align="center">Karawang, <?= tanggal_indonesia($detail['tanggal_surat']) ?></td>
                    </tr>
                    <tr>
                        <td width="439" align="center">
                            Nomor: <?= $detail['no_surat'] ?>
                        </td>
                        <td width="439" align="center" style="vertical-align: top;">Lurah <?= $detaildesa['kel']; ?></td>
                    </tr>
                    <tr>
                        <td width="439" align="center">
                            <div class="namattd" style="vertical-align: top;"><?= $datadiri['nama'] ?></div>
                        </td>
                        <td width="439" align="center">
                            <div class="namattd"><?= $lurah['nama']; ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td width="439" align="center"><b>NIK. <?= $datadiri['nik'] ?></b></td>
                        <td width="439" align="center"><b>NIP. <?= $lurah['nip']; ?></b></td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>

</html>