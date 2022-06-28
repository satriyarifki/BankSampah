<?php

namespace App\Http\Controllers\Penyetor;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Transaksi;
use App\Models\Penyetor;
use App\Models\Pengepul;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('penyetor'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $pengepul = Pengepul::all()->pluck('name', 'id');

        return view('user.penyetor.transaksi', compact('pengepul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('penyetor'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $auth_id =  Penyetor::where('users_id',Auth::id())->first();
        $user = Transaksi::create([
            'pengepul_id' => $request->pengepul_id,
            'penyetor_id' => $auth_id->id,
            'jumlahsampah' => $request->jumlahsampah,
            'bayar' => $request->bayar,
            'tanggal' => $request->tanggal,
            'status' => 0,
        ]);

        return redirect()->route('penyetor.transaksis.index');
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $auth_id =  Penyetor::where('users_id',Auth::id())->first();
        $transaksis = Transaksi::where('penyetor_id', $auth_id->id)->get();
        return view('user.penyetor.progres', compact('transaksis'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
