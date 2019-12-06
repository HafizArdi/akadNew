<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model{
    protected $table = 'kelurahan';
    protected $primaryKey = 'idKelurahan';
    protected $fillable = ['idKelurahan','kelurahan','kecamatan','sekdes','luas','utara','timur','barat','selatan','penduduk','pajakDaerah','pendapatan','alokasiDana','danaDesa','belanja'];

    public function kecamatanX() {
        return  $this->belongsTo('App\kecamatan','kecamatan');
    }

    public function user() {
        return  $this->hasMany('App\User');
    }

    public function laporanKelurahan() {
        return  $this->hasMany('App\laporan');
    }

    public function belanja() {
        return  $this->hasMany('App\belanja');
    }

    public $timestamps = false;
}
