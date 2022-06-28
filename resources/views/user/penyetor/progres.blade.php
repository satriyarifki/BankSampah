@extends('layouts.user')
@section('content')
<div class="card">
    <div class="card-header">
        Transaksi Diterima
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Penyetor
                        </th>
                        <th>
                            Pengepul
                        </th>
                        <th>
                            Jumlah Sampah
                        </th>
                        <th>
                            Bayar
                        </th>
                        <th>
                            Tanggal Bayar
                        </th>
                        <th>
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksis as $key => $transaksi)
                        <tr data-entry-id="{{ $transaksi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $transaksi->penyetor->name ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->pengepul->name ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->jumlahsampah ?? '' }} Kg
                            </td>
                            <td>
                                Rp.{{ $transaksi->bayar ?? '' }}
                            </td>
                            <td>
                                {{ $transaksi->tanggal ?? '' }}
                            </td>
                            <td>
                                @if ($transaksi->status == 0)
                                    <span class="badge text-primary">Menunggu diterima</span>
                                @elseif ($transaksi->status == 1)
                                    <span class="badge text-warning">Diproses</span>
                                @elseif ($transaksi->status == 2)
                                    <span class="badge text-success">Selesai</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('permission_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.transaksis.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection