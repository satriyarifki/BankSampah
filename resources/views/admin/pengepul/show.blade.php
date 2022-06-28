@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Pengepul Details
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengepuls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $pengepul->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            User ID
                        </th>
                        <td>
                            {{ $pengepul->users_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama Pengepul
                        </th>
                        <td>
                            {{ $pengepul->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor HP
                        </th>
                        <td>
                            {{ $pengepul->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Alamat
                        </th>
                        <td>
                            {{ $pengepul->alamat }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengepuls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection