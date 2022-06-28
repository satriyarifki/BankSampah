<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengepul;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class PengepulController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengepuls = pengepul::all();

        return view('admin.pengepul.index', compact('pengepuls'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = user::all();

        return view('admin.pengepul.create', compact( 'users'));
    }

    public function store(Request $request)
    {
        pengepul::create($request->all());
        

        return redirect()->route('admin.pengepuls.index');
    }

    public function edit(pengepul $pengepul)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = user::all()->pluck('id');

        return view('admin.pengepul.edit', compact('pengepul', 'users'));
    }

    public function update(Request $request, pengepul $pengepul)
    {
        $pengepul->update($request->all());

        return redirect()->route('admin.pengepuls.index');
    }

    public function show(pengepul $pengepul)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.pengepul.show', compact('pengepul'));
    }

    public function destroy(pengepul $pengepul)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $pengepul->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        pengepul::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
