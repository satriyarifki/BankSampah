<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Pengepul;
use App\Models\Penyetor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;


class TransaksisController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksis = Transaksi::all();

        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengepul = Pengepul::all()->pluck('name', 'id');
        $penyetor = Penyetor::all()->pluck('name', 'id');
        $now = now();

        return view('admin.transaksi.create', compact('pengepul', 'penyetor', 'now'));
    }

    public function store(Request $request)
    {
        $user = Transaksi::create($request->all());
        // Transaksi::create([
        //     'penyetor_id' => $request->penyetor_id,
        //     'pengepul_id' => $request->penyepul_id,
        //     'jumlahsampah' => $request->jumlahsampah,
        //     'berat' => $request->jumlahsampah*3000,
        //     'tanggal' => now(),
        // ]);
        

        return redirect()->route('admin.transaksis.index');
    }

    public function edit(Transaksi $transaksi)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengepul = Pengepul::all();
        $penyetor = Penyetor::all();

        return view('admin.transaksi.edit', compact('transaksi', 'pengepul', 'penyetor'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->update($request->all());

        return redirect()->route('admin.transaksis.index');
    }

    public function show(Transaksi $transaksi)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.transaksi.show', compact('transaksi'));
    }

    public function destroy(Transaksi $transaksis)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksis->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        transaksi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
