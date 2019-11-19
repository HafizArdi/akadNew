<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model{
    protected $table = 'kecamatan';
    protected $primaryKey = 'idKecamatan';
    protected $fillable = ['idKecamatan','kecamatan'];

    public function kelurahan() {

    return  $this->hasMany('App\kelurahan');
    }

    public function users() {

    return  $this->hasMany('App\User');
    }

    public function laporanKecamatannya() {

        return  $this->hasMany('App\laporan');
    }

    public $timestamps = false;
}
