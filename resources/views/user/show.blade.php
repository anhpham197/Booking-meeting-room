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

            <div class="card-header text-center text-xl font-semibold uppercase">User Datails</div>

            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('kath.showUsers') }}">
                            Back
                        </a>
                        <table class="table table-bordered table-striped" id="dtOrderExample">
                            <tbody>
                                <tr>
                                    <th>
                                        <b>Full name</b>
                                    </th>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>ID</b>
                                    </th>
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Date Of Birth</b>
                                    </th>
                                    <td>
                                        {{ $user->room_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Gender</b>
                                    </th>
                                    <td>
                                        {{ $user->gender }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Company</b>
                                    </th>
                                    <td>
                                        {{ $user->company_id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Số điện thoại</b>
                                    </th>
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <b>Email</b>

                                    </th>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection

