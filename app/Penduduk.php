<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $fillable = ['no_ktp', 'nama', 'agama', 'alamat', 'pendidikan_terakhir', 'status', 'pekerjaan'];

    public function pendatang()
    {
        return $this->hasMany('App\Pendatang');
    }

    public function pindah()
    {
        return $this->hasMany('App\Pindah');
    }

    public function kematian()
    {
        return $this->hasOne('App\Kematian');
    }
}
