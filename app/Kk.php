<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kk extends Model
{
    protected $fillable = ['no_kk', 'nama_kk', 'pindah_id', 'alamat_kk'];

    public function pindah()
    {
        return $this->belongsTo('App\Pindah');
    }

    public function kelahiran()
    {
        return $this->hasMany('App\Kelahiran');
    }
}
