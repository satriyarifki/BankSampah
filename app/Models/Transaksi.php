<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public $table = 'transaksi';

    protected $fillable = [
        'pengepul_id',
        'penyetor_id',
        'tanggal',
        'jumlahsampah',
        'bayar',
        'keterangan',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function pengepul(){
        return $this->belongsTo(pengepul::class);
    }
    public function penyetor(){
        return $this->belongsTo(penyetor::class);
    }
}
