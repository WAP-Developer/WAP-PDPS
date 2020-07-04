<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table      = 'anggota_kk';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'kk_id',
        'nama',
        'nik',
        'jk',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'pendidikan',
        'pekerjaan',
        'golongan_darah',
        'status_nikah',
        'tgl_nikah',
        'hubungan',
        'kewarganegaraan',
        'paspor',
        'kitap',
        'ayah',
        'ibu',
        'status',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function getJoinAnggota()
    {
        $checkAnggota = $this->db->table('anggota_kk');
        $checkAnggota->select('anggota_kk.*, kk.nokk, ,kk.kepalakk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $checkAnggota->join('kk', 'kk.id=anggota_kk.kk_id');

        return $checkAnggota->get()->getResultArray();
    }
}
