<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pbbj extends Model
{
    public function Pegawai() {
    	return $this->belongsTo('App\pegawai', 'id_pegawai', 'id_pegawai');
    }

    public function Units() {
    	return $this->belongsTo('App\unitkerja', 'id_unit', 'id_unit');
    }
}
