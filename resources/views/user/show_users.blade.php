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
                    <div class="relative flex w-full flex-wrap items-stretch">
                        <span
                            class="z-10 h-full leading-snug font-normal absolutetext-center text-gray-400 absolute bg-transparent rounded items-center justify-center pl-3 py-2">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="search" id="search" name="search" class="form-input placeholder-gray-400 w-72 pl-10"
                            placeholder="Tìm kiếm..."
                            style="font-family: 'Font Awesome 5 Free', 'system-ui'; border: 1px solid #4f4f4f">
                    </div>
                </div>
            </nav>

            <div class="text-center py-3 font-semibold text-xl uppercase">{{ Auth::user()->company->name }}</div>

            <div class="">
                <div class="scroller" style="height: 500px;">
                    <table id="dtOrderExample" class="table table-bordered table-hover table-sm" cellspacing="0"
                        width="100%" style="text-align: center">
                        <thead class="table-idea">
                            <tr>
                                <th id="th-id" style="line-height: 40px;" class="lg:w-16">
                                    STT
                                </th>
                                <th id="th-name" style="line-height: 40px;" class="lg:w-48">
                                    HỌ VÀ TÊN
                                </th>
                                <th id="th-mail" style="line-height: 40px;" class="lg:w-52">
                                    MAIL
                                <th style="line-height: 40px;" class="lg:w-32">
                                    SỐ ĐIỆN THOẠI
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody id="data">
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $key }}</td>
                                    <td><a href="#" data-toggle="modal"
                                            data-target="#modal-{{ $user->id }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ route('user.show', $user->id) }}">
                                            View
                                        </a>
                                        <a class="btn btn-xs btn-primary" href="{{ route('kath.edit', $user->id) }}">
                                            Edit
                                        </a>
                                        <a class="btn btn-xs btn-primary" href="{{ route('kath.delete', $user->id) }}">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}

                    @foreach ($users as $user)
                        <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Lịch họp của {{ $user->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Tên cuộc họp</th>
                                                    <th>Ngày bắt đầu</th>
                                                    <th>Ngày kết thúc</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user->events as $event)
                                                    <tr>
                                                        <td>{{ $event->name }}</td>
                                                        <td>{{ $event->start_day }}</td>
                                                        <td>{{ $event->end_day }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            console.log($value)
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    let html = '';
                    for (let item of data) {
                        let htmlItem =
                                `<tr>
                                    <td>{{ $users->firstItem() + $key }}</td>
                                    <td><a href="#" data-toggle="modal"
                                            data-target="#modal-${item.id }">${item.name}</a></td>
                                    <td>${item.email}</td>
                                    <td>${item.phone}</td>
                                </tr>`

                        html += htmlItem
                    }
                    $('#data').html(html);
                }
            });
        })


        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
@endsection
