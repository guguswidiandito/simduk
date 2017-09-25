<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    protected $fillable = ['no_kematian', 'penduduk_id', 'tgl_kematian', 'tempat_meninggal', 'sebab_meninggal'];

    public function penduduk()
    {
        return $this->belongsTo('App\Penduduk');
    }
}
