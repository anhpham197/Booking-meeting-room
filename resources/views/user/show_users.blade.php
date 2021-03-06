@extends('layouts.app')

@section('content')
    <div class="wrapper">
        @include('booking.sidebar')
        <div id="content" class="leading-snug">
            <nav class="navbar navbar-light bg-light flex justify-between" style="height: 70px;">
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
                            placeholder="Search..."
                            style="font-family: 'Font Awesome 5 Free', 'system-ui'; border: 1px solid #4f4f4f">
                    </div>
                </div>
                <div class="text-black font-semibold flex gap-2 items-center py-2 px-3 rounded-md"
                    style="background: #D9CAB3">
                    <i class="far fa-clock text-lg"></i>
                    <span id="ct"></span>
                </div>
            </nav>

            <div class="text-center py-3 font-semibold text-xl uppercase">{{ Auth::user()->company->name }} company</div>
            <div class="px-2 max-w-full overflow-x-auto relative table-responsive scroller">
                <button class="float-right py-2 px-3 rounded-md text-white font-semibold mb-3" style="background: #1ED760">
                    <i class="far fa-file-excel"></i>
                    <a href="{{ route('kath.export')}}" class="text-white">Export</a>
                </button>
                <table id="dtOrderExample" class="table table-hover table-bordered table-sm" cellspacing="0" width="100%">
                    <thead class="table-idea">
                        <tr>

                            <th id="th-name" class="lg:w-48 font-semibold uppercase">
                                FULL NAME
                            </th>
                            <th id="th-mail" class="lg:w-52 font-semibold uppercase">
                                MAIL
                            <th class="lg:w-32 font-semibold uppercase">
                                PHONE
                            </th>
                        </tr>
                    </thead>
                    <tbody id="data">
                        @foreach ($users as $key => $user)
                            <tr>
                                {{-- <td>{{ $users->firstItem() + $key }}</td> --}}
                                <td><a href="#" data-toggle="modal"
                                        data-target="#modal-{{ $user->id }}">{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- <div>{{ $users->links() }}</div> --}}

                @foreach ($users as $user)
                    <div class="modal fade" id="modal-{{ $user->id }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $user->name }}'s upcoming meetings</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered table-sm text-center">
                                        <thead>
                                            <tr>
                                                <th class="font-semibold">Meeting name</th>
                                                <th class="font-semibold">Starting time</th>
                                                <th class="font-semibold">Ending time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->events as $event)
                                                <tr>
                                                    <td>{{ $event->name }}</td>
                                                    <td>{{ date('H:i', strtotime($event->starting_time)) }} &bull;
                                                        {{ date('d/m/Y', strtotime($event->starting_time)) }}</td>
                                                    <td>{{ date('H:i', strtotime($event->ending_time)) }} &bull;
                                                        {{ date('d/m/Y', strtotime($event->ending_time)) }}</td>
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
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            console.log($value)
            $.ajax({
                type: 'get',
                url: '{{ route('kath.searchUsers') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    let html = '';
                    console.log(data)
                    for (let item of data) {
                        let htmlItem =
                            `<tr>
                                    <td><a href="#" data-toggle="modal"
                                            data-target="#modal-${item.id }">${item.name}</a></td>
                                    <td>${item.email}</td>
                                    <td>${item.phone ? item.phone : ''}</td>
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
