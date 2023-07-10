<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masakan extends Model {

    public $fillable = [
        'nama', 'harga', 'deskripsi'
    ];
}