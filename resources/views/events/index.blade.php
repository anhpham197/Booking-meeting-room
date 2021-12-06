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

            <div class="py-3 text-center text-xl font-semibold uppercase">Your meetings</div>

            <div class="px-2 max-w-full overflow-x-auto relative table-responsive">
                <table class="table table-hover table-bordered table-sm" id="dtOrderExample">
                    <thead class="table-idea">
                        <tr>
                            <th>
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Meeting title</span>
                            </th>
                            <th>
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Starting time</span>
                                <i class="fas fa-sort" id="rl-sc"></i>
                            </th>
                            <th>
                                <span style="margin-right: 2px;" class="uppercase font-semibold">Ending time</span>
                                <i class="fas fa-sort" id="rl-sp"></i>
                            </th>
                            <th>
                                <span style="margin-right: 2px;" class="uppercase font-semibold">File</span>
                            </th>
                            <th class="uppercase font-semibold">
                                <span class="uppercase font-semibold">Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td style="font-weight: 400;" class="w-1/3">{{ $event->name }}</td>
                            <td>{{ date('H:i', strtotime($event->starting_time)) }} &bull; {{ date('d/m/Y', strtotime($event->starting_time)) }}</td>
                            <td>{{ date('H:i', strtotime($event->ending_time)) }} &bull; {{ date('d/m/Y', strtotime($event->ending_time)) }}</td>
                            <td>nnnnnnnnnnnnnnnnnnnnn</td>
                            <td>
                                <div class="flex flex-wrap gap-2 justify-center">
                                    <a href="{{ route('event.edit', ['id'=>$event->id]) }}" title="Edit"><i class="fas fa-edit text-blue-600 cursor-pointer"></i></a>
                                    <a href="{{ route('event.delete', ['id'=>$event->id]) }}" title="Delete"><i class="fas fa-trash-alt text-red-600 cursor-pointer"></i></a>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pb-2">{{ $events->links() }}</div>
            </div>
        </div>
        <script>
            let eventsLinks = {!! json_encode($events) !!}
            console.log(eventsLinks)
        </script>
    @endsection
