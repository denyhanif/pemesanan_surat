<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPengajuan extends Model
{
    protected $table = 'data_pengajuans';
    protected $guarded = ['id'];

    protected $appends = ['status_label'];


    public function kategori()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_surat_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function pesanan()
    {
        return $this->hasOne(Pesanan::class, 'data_pengajuan_id', 'id');
    }

    public function tanggal_jadi()
    {
        if(empty($this->pesanan->tanggal_jadi))
        {
            return 'Belum';
        }
            return $this->pesanan->tanggal_jadi;
    }

    public function getStatusLabelAttribute()
    {
        // $status = $this->pesanan->status;
        if ($this->pesanan->status == 0) {
            return '<span class="badge badge-secondary">Proses</span>';
        } elseif ($this->pesanan->status == 1) {
            return '<span class="badge badge-primary">Verifikasi</span>';
        } elseif ($this->pesanan->status == 2) {
            return '<span class="badge badge-info">Jadi</span>';
        }elseif ($this->pesanan->status == 3) {
            return '<span class="badge badge-danger">Ditolak</span>';
        }
        return '<span class="badge badge-success">Selesai</span>';
    }

}
