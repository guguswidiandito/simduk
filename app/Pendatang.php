<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendatang extends Model
{
    protected $fillable = ['no_pendatang', 'penduduk_id', 'tgl_datang', 'alamat_asal','keterangan'];

    public function penduduk()
    {
    	return $this->belongsTo('App\Penduduk');
    }
}
