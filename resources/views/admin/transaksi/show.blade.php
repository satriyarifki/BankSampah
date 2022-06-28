@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.permission.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transaksis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Penyetor 
                        </th>
                        <td>
                            {{ $transaksi->penyetor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Pengepul 
                        </th>
                        <td>
                            {{ $transaksi->pengepul_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Jumlah Sampah
                        </th>
                        <td>
                            {{ $transaksi->jumlahsampah }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Bayar
                        </th>
                        <td>
                            {{ $transaksi->bayar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tanggal
                        </th>
                        <td>
                            {{ $transaksi->tanggal }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transaksis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection