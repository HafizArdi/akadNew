<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class belanja extends Model{
    protected $table = 'belanja';
    protected $primaryKey = 'idBelanja';
    protected $fillable = ['idBelanja','belanja','rincian','bidang','kelurahan','tanggalBelanja'];

    public function belanjaBidang() {
        return  $this->belongsTo('App\bidang','bidang');
    }

    public function belanjaKelurahan() {
        return  $this->belongsTo('App\kelurahan','kelurahan');
    }
    
    public $timestamps = false;
}
