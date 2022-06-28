@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Add Transaksi
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("penyetor.transaksis.store") }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label class="required" for="pengepul_id">Pengepul</label>
                <select class="form-control select2 {{ $errors->has('pengepul_id') ? 'is-invalid' : '' }}" name="pengepul_id" id="pengepul_id" required>
                    @foreach($pengepul as $id => $pengepul)
                        <option value="{{ $id }}"{{ old('pengepul_id', '' ) ? 'selected' : '' }} >{{ $pengepul }}</option>
                    @endforeach
                </select>
                @if($errors->has('pengepul '))
                    <div class="invalid-feedback">
                        {{ $errors->first('pengepul ') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jumlahsampah">Jumlah Sampah (Kg)</label>
                <input class="form-control {{ $errors->has('jumlahsampah') ? 'is-invalid' : '' }}" type="number" name="jumlahsampah" id="jumlahsampah" value="{{ old('jumlahsampah', '') }}" required>
                @if($errors->has('jumlahsampah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlahsampah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="bayar">Bayar (IDR)</label>
                <input class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" type="number" name="bayar" id="bayar" value=" {{ old('bayar', '') }}" readonly required>
                @if($errors->has('jumlahsampah'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlahsampah') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.permission.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal">Tanggal</label>
                <input class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', '') }}" required>
                @if($errors->has('tanggal'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal') }}
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

@section('scripts')
<script>
    const jum = document.getElementById('jumlahsampah');
    jum.addEventListener('change', (event) => {
        const jum = document.getElementById('jumlahsampah');
        document.getElementById('bayar').value = jum.value * 2000;
    });

    const date = new Date();

    let day = date.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    let currentDate = '${day}/${month}/${year}';

    document.getElementById('tanggal').value = currentDate;

</script>


@endsection