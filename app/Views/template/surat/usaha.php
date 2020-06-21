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
                    <div class="jenis-surat">SURAT KETERANGAN DOMISILI USAHA</div>
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
                                    <td width="210">NIK</td>
                                    <td>:</td>
                                    <td><?= $datadiri['nik'] ?></td>
                                </tr>
                                <tr>
                                    <td width="210">Jenis Kelamin</td>
                                    <td>:</td>
                                    <td><?= $datadiri['jk'] ?></td>
                                </tr>
                                <tr>
                                    <td width="210">Pekerjaan</td>
                                    <td>:</td>
                                    <td><?= $datadiri['pekerjaan'] ?></td>
                                </tr>
                                <tr>
                                    <td width="210" style="vertical-align: top;">Alamat</td>
                                    <td style="vertical-align: top;">:</td>
                                    <td><?= $datadiri['alamat'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div style="margin-top: 10px;">Berdasarkan keterangan dari ketua RT/RW dan surat pernyataan dari
                            pemilik usaha, bahwa nama tersebut benar pemilik usaha dibawah ini :</div>
                        <div class="data-pemohon" style="margin-top: 10px;">
                            <table>
                                <tr>
                                    <td width="210">Jenis Usaha</td>
                                    <td>:</td>
                                    <td><?= $detail['jenis_usaha'] ?></td>
                                </tr>
                                <tr>
                                    <td width="210">Mulai Usaha</td>
                                    <td>:</td>
                                    <td><?= tanggal_indonesia($detail['mulai_usaha']) ?></td>
                                </tr>
                                <tr>
                                    <td width="210" style="vertical-align: top;">Alamat Usaha</td>
                                    <td style="vertical-align: top;">:</td>
                                    <td><?= $detail['alamat_usaha'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="pembukaan" style="margin-top: 10px;">Masa berlaku sampai dengan tanggal : <b><?= tanggal_indonesia($detail['masa_berlaku']) ?></b></div>
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
                        <td width="439" align="center">Yang Bersangkutan,</td>
                        <td width="439" align="center">Lurah Karangpawitan</td>
                    </tr>
                    <tr>
                        <td width="439" align="center">
                            <div class="namattd"><?= $datadiri['nama'] ?></div>
                        </td>
                        <td width="439" align="center">
                            <div class="namattd">Nama Bersangkutan</div>
                        </td>
                    </tr>
                    <tr>
                        <td width="439" align="center"></td>
                        <td width="439" align="center"><b>NIP. 1516564165156165</b></td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>
</body>

</html>