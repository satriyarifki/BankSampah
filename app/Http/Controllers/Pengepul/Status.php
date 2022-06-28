<?php

namespace App\Http\Controllers\Pengepul;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use App\Models\Transaksi;
use App\Models\Pengepul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Status extends Controller
{
    public function update(Transaksi $transaksi)
    {

        $tambah = 1;
        dd($transaksi);
        $transaksi->update([
            'status' => $transaksi->status + 1,
        ]);
        if ($transaksi->status <= 2) {
            
        }
        
        return redirect()->route('pengepul.transaksis.index');
    }
}
