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

            <div id="wrapperForm">
                <form autocomplete="on" id="rateForm">
                    <div class="card">
                        <div class="card-header text-center uppercase text-xl font-semibold">Assess the quality of the
                            meeting room</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="meetingId" style="margin-right: 10px;" class="font-semibold">Meeting name <span
                                        class="text-red-600">*</span></label>
                                <select name="meetingId" id="meeting-id"
                                    class="border border-black py-2 px-3 rounded-md w-2/3" required>
                                    @foreach (Auth::user()->events as $event)
                                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group flex flex-wrap gap-4 justify-between items-center">
                                <div>
                                    <label for="" style="margin-right: 10px" class="font-semibold">Starting time</label>
                                    <input type="text" value="" id="starting-time" readonly
                                        class="py-2 px-3 rounded-md border border-black">
                                </div>
                                <div>
                                    <label for="" style="margin-right: 10px" class="font-semibold">Ending time</label>
                                    <input type="text" value="08:00  29/12/2021" id="ending-time" readonly
                                        class="py-2 px-3 rounded-md border border-black">
                                </div>
                                <div>
                                    <label for="" style="margin-right: 10px;" class="font-semibold">Room</label>
                                    <input type="text" name="" id="room-name" value="" readonly
                                        class="py-2 px-3 rounded-md border border-black w-max-content">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comment" class="font-semibold">Comment <span
                                        class="text-red-600">*</span></label>
                                <textarea id="comment" class="form-control" rows="10"
                                    placeholder="Please let us know if you have any suggestions or comments..."
                                    required></textarea>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: center;">
                            <button type="submit" class="btn btn-primary" data-toggle="modal">SEND</button>
                        </div>
                        <div class="modal fade" id="saveRate" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="flex items-center" id="wrapperTitle">
                                            <div slot="avatar" id="avatar">

                                            </div>
                                            <h5 class="modal-title" id="titleMsg"></h5>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="message">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $.ajax({
            type: 'get',
            url: `/event/${$('#meeting-id').val()}/data`,
            success: function(data) {
                $('#starting-time').val(data.startingTime)
                $('#ending-time').val(data.endingTime)
                $('#room-name').val(data.roomName)
            }
        })
        $('#meeting-id').change(function() {
            // console.log(typeof $(this).val())
            let selectedId = parseInt($(this).val())
            $.ajax({
                type: 'get',
                url: `/event/${selectedId}/data`,
                success: function(data) {
                    $('#starting-time').val(data.startingTime)
                    $('#ending-time').val(data.endingTime)
                    $('#room-name').val(data.roomName)
                }
            })
        })


        $('#wrapperForm').on('submit', '#rateForm', function(e) {
            e.preventDefault();

            let meetingId = $('#meeting-id').val();
            let comment = $('#comment').val();

            $.ajax({
                url: "{{ route('event.saveRate') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    meetingId: meetingId,
                    comment: comment
                },
                success: function(response) {
                    if (response.status === 'fail') {
                        let html =
                            `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-5 h-5 mr-2">
                                                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                </svg>`
                        $('#wrapperTitle').addClass('text-red-600')
                        $('#avatar').html(html)
                    } else if (response.status === 'success') {
                        let html =
                            `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle w-5 h-5 mr-2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>`
                        $('#wrapperTitle').addClass('text-green-700')
                        $('#avatar').html(html)
                    }
                    $('#message').html(response.message)
                    $('#titleMsg').html(response.titleMsg)
                    $("#saveRate").modal();
                    setTimeout(function() { // wait for 1 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 1000);
                },
            });
        });
    </script>
@endsection
