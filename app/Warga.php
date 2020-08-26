<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Warga extends Authenticatable
{
    use Notifiable;
    protected $table = 'wargas';
    protected $guarded = ['id'];

    public function pengajuan()
    {
        return $this->hasMany(DataPengajuan::class);
    }
//
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
