<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $guarded = ['id'];

    public function pengajuan()
    {
        return $this->belongsTo(DataPengajuan::class,'data_pengajuan_id');
    }

//      public function user()
//    {
//         return $this->hasOne(User::class, 'id', 'pemverifikasi_id');
//     }
}
