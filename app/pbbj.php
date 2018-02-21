<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pbbj extends Model
{
    public function Barang() {
    	return $this->hasMany('App\barang', 'id', 'id');
    }
}
