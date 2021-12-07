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
                </div>
                <div class="text-black font-semibold flex gap-2 items-center py-2 px-3 rounded-md"
                    style="background: #D9CAB3">
                    <i class="far fa-clock text-lg"></i>
                    <span id="ct"></span>
                </div>
            </nav>

            <div class="py-3 text-center text-xl font-semibold uppercase">Your meetings</div>

            <div class="flex justify-center items-center pb-3 px-4 rounded-md text-red-700" style="display: none"
                id="success-notification">
                <div slot="avatar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-alert-octagon w-5 h-5 mx-2">
                        <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                        </polygon>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                </div>
                <div class="font-semibold max-w-full flex-initial">Xóa thành công</div>
            </div>

            <div class="px-2 max-w-full overflow-x-auto relative table-responsive scroller">          
                <table class="table table-hover table-bordered">
                    <thead class="table-idea">
                        <tr>
                            <th class="th-sm">
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Meeting title</span>
                            </th>
                            <th class="th-sm">
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Starting time</span>
                            </th>
                            <th class="th-sm">
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Ending time</span>
                            </th>
                            <th class="th-sm">
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Room</span>
                            </th>
                            <th class="th-sm">
                                <span style="margin-right: 2px;" class="uppercase font-semibold">File</span>
                            </th>
                            <th class="th-sm">
                                <span class="uppercase font-semibold">Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="data">
                        @foreach ($events as $event)
                            <tr>
                                <td style="font-weight: 400;" class="w-1/3">{{ $event->name }}</td>
                                <td>{{ date('H:i', strtotime($event->starting_time)) }} &bull;
                                    {{ date('d/m/Y', strtotime($event->starting_time)) }}</td>
                                <td>{{ date('H:i', strtotime($event->ending_time)) }} &bull;
                                    {{ date('d/m/Y', strtotime($event->ending_time)) }}</td>
                                <td>{{ $event->room->name }}</td>
                                <td>
                                    <div class="flex flex-wrap gap-2 justify-center">
                                        @if ($event->file != null)
                                            <a href="{{ route('file.download', ['file' => $event->file]) }}"
                                                class="hover:text-blue-600">Download</a>
                                            <i class="fas fa-download"></i>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if (strtotime($event->starting_time) > strtotime($now))
                                        <div class="flex flex-wrap gap-2 justify-center">
                                            <a href="{{ route('event.edit', ['id' => $event->id]) }}" title="Edit"><i
                                                    class="fas fa-edit text-blue-600 cursor-pointer"></i></a>
                                            <a href="#" data-id="{{ $event->id }}" title="Delete" id="delete-meeting"><i
                                                    class="fas fa-trash-alt text-red-600 cursor-pointer"></i></a>

                                        </div>
                                    @else
                                        <div>
                                            <a href="{{ route('event.edit', ['id' => $event->id]) }}" title="Detail"><i
                                                    class="fas fa-eye"></i></a>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="pb-2">{{ $events->links() }}</div> --}}
        </div>
        {{-- <script>
            let eventsLinks = {!! json_encode($events) !!}
            console.log(eventsLinks)
        </script> --}}
        <script>
            $("#data").on('click', '#delete-meeting', function(e) {
                e.preventDefault();
                var id = $('#delete-meeting').data("id");
                console.log(id)
                var token = $("meta[name='csrf-token']").attr("content");
                if (!confirm("Do you really want to cancel this meeting?")) {
                    return false;
                }

                $.ajax({
                    url: "/event/" + id + "/delete",
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function() {
                        // console.log("Deleted")
                        $('#success-notification').fadeIn('slow', function() {
                            $('#success-notification').delay(3000).fadeOut()
                        })
                        setTimeout(function() { // wait for 1 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 1000);
                    }
                });

            });
        </script>
    @endsection
