<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidang extends Model{
    protected $table = 'bidang';
    protected $primaryKey = 'idBidang';
    protected $fillable = ['idBidang','bidang'];


    public function bidang() {
        return  $this->hasMany('App\belanja');
    }

    public $timestamps = false;
}
