<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model{
    protected $table = 'status';
    protected $primaryKey = 'idStatus';
    protected $fillable = ['idStatus','status',];

    public function statusnya() {
        return  $this->hasMany('App\laporan');
    }
    
    public $timestamps = false;
}
