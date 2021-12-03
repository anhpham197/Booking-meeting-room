@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content" class="leading-snug">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 70px;">
                <div class="flex gap-6">
                    <button type="button" id="sidebarCollapse" class="cursor-pointer rounded-md">
                        <i class="fas fa-angle-double-left text-2xl font-normal text-gray-400"></i>
                    </button>
                </div>
            </nav>

            <div class="card-header text-center text-xl font-semibold uppercase">Chi tiết cuộc họp</div>

            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('event.view') }}">
                            Quay trở lại
                        </a>
                        <table class="table table-bordered table-striped" id="dtOrderExample">
                            <tbody>
                                <tr>
                                    <th>
                                        <b>Tiêu đề</b>
                                    </th>
                                    <td>
                                        {{ $event->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>ID</b>
                                    </th>
                                    <td>
                                        {{ $event->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Room ID</b>
                                    </th>
                                    <td>
                                        {{ $event->room_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>User ID</b>
                                    </th>
                                    <td>
                                        {{ $event->user_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Người đặt</b>
                                    </th>
                                    <td>
                                        {{ $event->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Số điện thoại</b>
                                    </th>
                                    <td>
                                        {{ $event->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Email</b>

                                    </th>
                                    <td>
                                        {{ $event->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Ngày bắt đầu</b>
                                    </th>
                                    <td>
                                        {{ $event->start_day }}
                                    </td>
                                </tr>
                                <tr>
                                <th>
                                    <b>Ngày kết thúc</b>
                                </th>
                                <td>
                                    {{ $event->end_day }}
                                </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Mô tả</b>
                                    </th>
                                    <td>
                                        {{ $event->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>File</b>
                                    </th>
                                    <td>
                                        {{ $event->file }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Ghi chú</b>
                                    </th>
                                    <td>
                                        {{ $event->note }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
    @parent
    <script>
        $(function () {
      let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
      let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
      let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.events.massDestroy') }}",
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

      $.extend(true, $.fn.dataTable.defaults, {
        orderCellsTop: true,
        order: [[ 1, 'desc' ]],
        pageLength: 100,
      });
      let table = $('.datatable-Event:not(.ajaxTable)').DataTable({ buttons: dtButtons })
      $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
          $($.fn.dataTable.tables(true)).DataTable()
              .columns.adjust();
      });

    let visibleColumnsIndexes = null;
    $('.datatable thead').on('input', '.search', function () {
          let strict = $(this).attr('strict') || false
          let value = strict && this.value ? "^" + this.value + "$" : this.value

          let index = $(this).parent().index()
          if (visibleColumnsIndexes !== null) {
            index = visibleColumnsIndexes[index]
          }

          table
            .column(index)
            .search(value, strict)
            .draw()
      });
    table.on('column-visibility.dt', function(e, settings, column, state) {
          visibleColumnsIndexes = []
          table.columns(":visible").every(function(colIdx) {
              visibleColumnsIndexes.push(colIdx);
          });
      })
    })

    </script>
    @endsection
