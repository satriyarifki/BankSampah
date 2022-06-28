<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengepul extends Model
{
    use HasFactory;
    public $table = 'pengepul';
    protected $fillable = [
        'users_id',
        'name',
        'no_hp',
        'alamat',
    ];

    public function users(){
        return $this->hasOne(user::class);
    }
    public function transaksi(){
        return $this->hasMany(transaksi::class);
    }
}
