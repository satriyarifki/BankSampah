@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Penyetor Details
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penyetors.index') }}">
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
                            {{ $penyetor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            User ID
                        </th>
                        <td>
                            {{ $penyetor->users_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nama Penyetor
                        </th>
                        <td>
                            {{ $penyetor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nomor HP
                        </th>
                        <td>
                            {{ $penyetor->no_hp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Alamat
                        </th>
                        <td>
                            {{ $penyetor->alamat }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penyetors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection