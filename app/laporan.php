<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model{
    protected $table = 'laporan';
    protected $primaryKey = 'idLaporan';
    protected $fillable = ['idLaporan','laporan','users','status','fotoLaporan','kecamatan','kelurahan','created_at','updated_at',];

    public function user() {
        return  $this->belongsTo('App\User','users');
    }

    public function statusLaporan() {
        return  $this->belongsTo('App\status','status');
    }

    public function laporanKecamatan() {
        return  $this->belongsTo('App\kecamatan','kecamatan');
    }

    public function laporanKelurahan() {
        return  $this->belongsTo('App\kelurahan','kelurahan');
    }

    public function komentar(){
        return $this->hasMany('App\bidang');
    }

    public function komen(){
        return $this->hasMany('App\komen');
    }
    
    public $timestamps = false;
}
