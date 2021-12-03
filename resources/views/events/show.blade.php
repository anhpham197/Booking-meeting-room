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

