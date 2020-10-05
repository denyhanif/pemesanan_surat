<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{

    protected $table = 'kategori_surats';
    protected $casts=['data_template'=>'array'];//cast
    protected $guarded = ['id'];

    public function pengajuan()
    {
        // relasi 1 to many
        return $this->hasMany(DataPengajuan::class);
    }
}
