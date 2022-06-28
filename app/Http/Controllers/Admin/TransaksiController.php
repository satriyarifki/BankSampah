<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class TransaksiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksi = Transaksi::all();

        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.transaksi.create');
    }

    public function store(Request $request)
    {
        $user = Transaksi::create($request->all());
        

        return redirect()->route('admin.transaksi.index');
    }

    public function edit(Transaksi $transaksi)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.users.edit', compact('transaksi'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->update($request->all());

        return redirect()->route('admin.transaksi.index');
    }

    public function show(Transaksi $transaksi)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.transaksi.show', compact('transaksi'));
    }

    public function destroy(Transaksi $transaksi)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksi->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        transaksi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
