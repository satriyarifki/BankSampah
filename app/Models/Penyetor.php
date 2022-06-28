<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyetor extends Model
{
    use HasFactory;
    public $table = 'penyetor';
    protected $fillable = [
        'users_id',
        'name',
        'no_hp',
        'alamat',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
