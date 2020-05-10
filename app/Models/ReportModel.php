<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    function getDomisiliPerusahaan()
    {
        $builder = $this->db->table('domisili_perusahaan');
        $builder->select('domisili_perusahaan.*, anggota_kk.nik, anggota_kk.nama');
        $builder->join('anggota_kk', 'anggota_kk.id = domisili_perusahaan.anggota_kk_id');
        return $builder->get()->getResultArray();
    }

    function getDomisiliPerusahaanFiler($form, $to)
    {
        $builder = $this->db->table('domisili_perusahaan');
        $builder->select('domisili_perusahaan.*, anggota_kk.nik, anggota_kk.nama');
        $builder->join('anggota_kk', 'anggota_kk.id = domisili_perusahaan.anggota_kk_id');
        $builder->where("tanggal_surat between '$form' AND '$to'");
        return $builder->get()->getResultArray();
    }

    function getDomisiliPerusahaanByID($id)
    {
        $builder = $this->db->table('domisili_perusahaan');
        $builder->select('domisili_perusahaan.*, anggota_kk.nik, anggota_kk.nama');
        $builder->join('anggota_kk', 'anggota_kk.id = domisili_perusahaan.anggota_kk_id');
        $builder->where("domisili_perusahaan.id=$id");
        return $builder->get()->getRowArray();
    }
}
