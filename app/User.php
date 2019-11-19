<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'alamat', 'kelurahan', 'kecamatan','noKTP','level','foto','noTelepon'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lev() {
      return $this-> belongsTo('App\level','level');
    }

    public function kelurahanTinggal() {
        return  $this->belongsTo('App\kelurahan','kelurahan');
    }

    public function kecamatanTinggal() {
        return  $this->belongsTo('App\kecamatan','kecamatan');
    }

    public function laporanUser() {
        return  $this->hasMany('App\laporan');
    }

    public function komenUser(){
        return $this->hasMany('App\bidang');
    }

    public function senderkomen(){
        return $this->hasMany('App\komen');
    }

    public function friendsOfMine(){
        return $this->belongsToMany('App\User','chat', 'user_id', 'friend_id');
    }

    public function friendOf(){
        return $this->belongsToMany('App\User','chat', 'friend_id', 'user_id');
    }

    public function friends(){
        return $this->friendsOfMine->merge($this->friendOf);
    }
}
