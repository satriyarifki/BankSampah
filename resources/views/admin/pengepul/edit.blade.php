@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Pengepul
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pengepuls.update", [$pengepul->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="users_id">User ID</label>
                <select class="form-control select2 {{ $errors->has('users_id') ? 'is-invalid' : '' }}" name="users_id" id="users_id"  required>
                    @foreach($users as $id => $users)
                        <option value="{{ $id+1  }}"{{ (old('users_id', ) || $pengepul->users_id)  ? 'selected' : '' }} >{{ $users }}</option>
                    @endforeach
                </select>
                @if($errors->has('users '))
                    <div class="invalid-feedback">
                        {{ $errors->first('users ') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $pengepul->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_hp">No HP</label>
                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="number" name="no_hp" id="no_hp" value="{{ old('no_hp', $pengepul->no_hp) }}" required>
                @if($errors->has('no_hp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_hp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alamat">Alamat</label>
                <input class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" type="text" name="alamat" id="alamat" value="{{ old('alamat', $pengepul->alamat) }}" required>
                @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection