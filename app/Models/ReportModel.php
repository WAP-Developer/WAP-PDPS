<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    function getDomisiliPerusahaan()
    {
        $builder = $this->db->table('domisili_perusahaan');
        $builder->select('domisili_perusahaan.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = domisili_perusahaan.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getDomisiliPerusahaanFilerRange($form, $to)
    {
        $builder = $this->db->table('domisili_perusahaan');
        $builder->select('domisili_perusahaan.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = domisili_perusahaan.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->where("tanggal_surat between '$form' AND '$to'");
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getDomisiliPerusahaanFilerSingle($tanggal)
    {
        $builder = $this->db->table('domisili_perusahaan');
        $builder->select('domisili_perusahaan.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = domisili_perusahaan.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->where("tanggal_surat = '$tanggal'");
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getDomisiliUsaha()
    {
        $builder = $this->db->table('domisili_usaha');
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getDomisiliUsahaFilerRange($form, $to)
    {
        $builder = $this->db->table('domisili_usaha');
        $builder->select('*');
        $builder->where("tanggal_surat between '$form' AND '$to'");
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getDomisiliUsahaFilerSingle($date)
    {
        $builder = $this->db->table('domisili_usaha');
        $builder->select('*');
        $builder->where("tanggal_surat='$date'");
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getDomisiliWarga()
    {
        $builder = $this->db->table('domisili_warga');
        $builder->select('domisili_warga.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = domisili_warga.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getDomisiliWargaFilerRange($form, $to)
    {
        $builder = $this->db->table('domisili_warga');
        $builder->select('domisili_warga.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = domisili_warga.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->where("tanggal_surat between '$form' AND '$to'");
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getDomisiliWargaFilerSingle($tanggal)
    {
        $builder = $this->db->table('domisili_warga');
        $builder->select('domisili_warga.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = domisili_warga.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->where("tanggal_surat = '$tanggal'");
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getKematian()
    {
        $builder = $this->db->table('kematian');
        $builder->select('kematian.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = kematian.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getKematianFilerRange($form, $to)
    {
        $builder = $this->db->table('kematian');
        $builder->select('kematian.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = kematian.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->where("tanggal_surat between '$form' AND '$to'");
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getKematianFilerSingle($tanggal)
    {
        $builder = $this->db->table('kematian');
        $builder->select('kematian.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = kematian.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->where("tanggal_surat = '$tanggal'");
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getSktm()
    {
        $builder = $this->db->table('sktm');
        $builder->select('sktm.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = sktm.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getSktmFilerRange($form, $to)
    {
        $builder = $this->db->table('sktm');
        $builder->select('sktm.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = sktm.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->where("tanggal_surat between '$form' AND '$to'");
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }

    function getSktmFilerSingle($tanggal)
    {
        $builder = $this->db->table('sktm');
        $builder->select('sktm.*, anggota_kk.nik, anggota_kk.nama, anggota_kk.tempat_lahir, anggota_kk.tanggal_lahir, anggota_kk.jk, kk.alamat, kk.rtrw, kk.desa, kk.kecamatan, kk.kabupaten, kk.kodepos, kk.provinsi');
        $builder->join('anggota_kk', 'anggota_kk.id = sktm.anggota_kk_id');
        $builder->join('kk', 'kk.id=anggota_kk.kk_id');
        $builder->where("tanggal_surat = '$tanggal'");
        $builder->orderBy('id', 'DESC');
        return $builder->get()->getResultArray();
    }
}
