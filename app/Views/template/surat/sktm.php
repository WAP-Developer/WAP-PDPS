<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="bsi icon" type="image/x-icon" href="favicon.ico">
    <title>Cetak Surat Domisili</title>
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
                                PEMERINTAH KABUPATEN KARAWANG <br>
                                KECAMATAN KARAWANG BARAT <br>
                                <b>KELURAHAN KARANGPAWITAN</b> <br>
                                Jl. Malabar No. 19F Karawang 41815
                            </div>
                        </td>
                    </tr>
                </table>

                <hr class="baseline">

                <div style="width:884px;">
                    <div class="jenis-surat">SURAT KETERANGAN TIDAK MAMPU</div>
                    <div class="nomor-surat">Nomor: <?= $detail['no_surat'] ?></div>
                    <div class="isi">
                        <div class="pembukaan">
                            <p>Yang bertanda tangan dibawah ini Kepala Kelurahan Karangpawitan Kecamatan Karawang Barat
                                Kabupaten Karawang dengan ini menerangkan, bahwa :</p>
                        </div>
                        <div class="data-pemohon">
                            <table>
                                <tr>
                                    <td width="210">Nama</td>
                                    <td>:</td>
                                    <td><?= $datadiri['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td width="210">Tempat, Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><?= $datadiri['tempat_lahir'] ?>, <?= tanggal_indonesia($datadiri['tanggal_lahir']) ?></td>
                                </tr>
                                <tr>
                                    <td width="210">Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= $datadiri['jk'] ?></td>
                                </tr>
                                <tr>
                                    <td width="210">Agama</td>
                                    <td>:</td>
                                    <td><?= $datadiri['agama'] ?></td>
                                </tr>
                                <tr>
                                    <td width="210">Status Perkawinan</td>
                                    <td>:</td>
                                    <td><?= $datadiri['status_nikah'] ?></td>
                                </tr>
                                <tr>
                                    <td width="210">Pekerjaan</td>
                                    <td>:</td>
                                    <td><?= $datadiri['pekerjaan'] ?></td>
                                </tr>
                                <tr>
                                    <td width="210" style="vertical-align: top;">Alamat</td>
                                    <td style="vertical-align: top;">:</td>
                                    <td><?= $datadiri['alamat'] . " RT/RW. " . $datadiri['rtrw'] . " Desa. " . $datadiri['desa'] . " Kecamatan. " . $datadiri['kecamatan'] . " Kabupaten. " . $datadiri['kabupaten'] . " " . $datadiri['kodepos'] ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="pembukaan" style="margin-top: 20px;">Benar nama yang tercantum diatas adalah warga
                            Kelurahan Karawang Pawitan Kecamatan Karawang Barat Kabupaten Karawang. Dengan sepengetahuan
                            kami dan sesuai data yang ada di kantor Lurah orang tersebut diatas benar keluarga kurang
                            mampu <b><i>(KELUARGA BERPENGHASILAN RENDAH).</i></b></div>
                        <div class="pembukaan" style="margin-top: 10px;">Demikian Surat Keterangan ini kami buat dengan
                            sebenarnya dan dapat dipergunakan sebagaimana mestinya. </div>
                    </div>
                </div>

                <table style="margin-top:100px;">
                    <tr>
                        <td width="439" align="center"></td>
                        <td width="439" align="center">Karawang, <?= tanggal_indonesia($detail['tanggal_surat']) ?></td>
                    </tr>
                    <tr>
                        <td width="439" align="center"></td>
                        <td width="439" align="center">Lurah Karangpawitan</td>
                    </tr>
                    <tr>
                        <td width="439" align="center">
                            <div class="namattd"></div>
                        </td>
                        <td width="439" align="center">
                            <div class="namattd">Nama Bersangkutan</div>
                        </td>
                    </tr>
                    <tr>
                        <td width="439" align="center"></td>
                        <td width="439" align="center"><b>NIP 15165641 651561 6 522</b></td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>

</html>