<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pindah extends Model
{
    protected $fillable = ['no_pindah', 'penduduk_id', 'tgl_pindah', 'alamat_tuju','keterangan'];

    public function penduduk()
    {
    	return $this->belongsTo('App\Penduduk');
    }

    public function kk()
    {
    	return $this->hasMany('App\Pindah');
    }
}
