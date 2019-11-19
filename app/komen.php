<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komen extends Model{
    protected $table = 'komen';
    public $timestamps = false;
    protected $primaryKey = 'comment_id';
    protected $fillable = ['comment_id','comment','comment_sender','posttime','laporan','idSender'];
    
    public function komensender() {
        return  $this->belongsTo('App\User','idSender');
    }

    public function komenlaporan() {
        return  $this->belongsTo('App\laporan','idLaporan');
    }
}
