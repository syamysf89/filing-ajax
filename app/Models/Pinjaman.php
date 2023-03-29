<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = "pinjaman";


    public function fail_r() {
        return $this->belongsTo('App\Models\File','fail');
    }

    public function files_r() {
        return $this->belongsTo('App\Models\File','fail');
    }



    public function user_r() {
        return $this->belongsTo('App\Models\User','peminjam');
    }

    public function status_r(){
        return $this->belongsTo('App\Models\Status','status','code');
    }
}
