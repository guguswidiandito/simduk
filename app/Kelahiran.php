<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    protected $fillable = ['no_akte', 'nama_anak', 'nama_orangtua', 'jenis_kelamin', 'kk_id'];

    public function kk()
    {
    	return $this->belongsTo('App\Kk');
    }
}
