<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyetor;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class PenyetorController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penyetors = penyetor::all();

        return view('admin.penyetor.index', compact('penyetors'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = user::all();

        return view('admin.penyetor.create', compact( 'users'));
    }

    public function store(Request $request)
    {
        penyetor::create($request->all());
        

        return redirect()->route('admin.penyetors.index');
    }

    public function edit(Penyetor $penyetor)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = user::all();

        return view('admin.penyetor.edit', compact('penyetor', 'users'));
    }

    public function update(Request $request, Penyetor $penyetor)
    {
        $penyetor->update($request->all());

        return redirect()->route('admin.penyetors.index');
    }

    public function show(Penyetor $penyetor)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        return view('admin.penyetor.show', compact('penyetor'));
    }

    public function destroy(Penyetor $penyetor)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $penyetor->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        penyetor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
