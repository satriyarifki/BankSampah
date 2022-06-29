<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Penyetor;
use App\Models\Pengepul;
use Illuminate\Support\Facades\Auth;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $cek = Pengepul::where('users_id' , auth()->user()->id);
        $cek2 = Penyetor::where('users_id', auth()->user()->id);
        if ($cek==null && $cek2==null) {
            if (auth()->user()->roles()->first()->id==3){
                Pengepul::create([
                    'users_id' => auth()->user()->id,
                    'name' => auth()->user()->name,
                    'no_hp' => '',
                    'alamat' => '',
                ]);
            } else if (auth()->user()->roles()->first()->id==4){
                Penyetor::create([
                    'users_id' => auth()->user()->id,
                    'name' => auth()->user()->name,
                    'no_hp' => '',
                    'alamat' => '',
                ]);
            }
        };
        $penyetor = Penyetor::where('users_id', Auth::id())->first();
        $pengepul = Pengepul::where('users_id', Auth::id())->first();


        return view('auth.passwords.edit', compact('pengepul', 'penyetor'));
    }

    public function update(UpdatePasswordRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()->route('profile.password.edit')->with('message', __('global.change_password_success'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());
        
        if (auth()->user()->roles()->first()->id==3){
            $pengepul = Pengepul::where('users_id', Auth::id())->first();
            $pengepul->update($request->validated());
        } else if (auth()->user()->roles()->first()->id==4){
            $penyetor = Penyetor::where('users_id', Auth::id())->first();
            $penyetor->update($request->validated());
        }

        return redirect()->route('profile.password.edit')->with('message', __('global.update_profile_success'));
    }

    public function destroy()
    {
        $user = auth()->user();

        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')->with('message', __('global.delete_account_success'));
    }
}
