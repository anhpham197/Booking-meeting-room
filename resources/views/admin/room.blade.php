@extends('admin.layout')
@section('data-table')
    <div class="my-3"><a class="py-2 px-3 bg-blue-500 rounded-md text-white uppercase" href="{{ route('admin.rooms') }}">Back</a></div>
    <form autocomplete="on" action="{{route('rooms.update', ['id' => $room->id])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-header text-center">
                <b>ROOM INFORMATION</b>
            </div>
            <div class="card-body" style="height: 415px;">
                <div class="form-group">
                    <label for="name" class="font-semibold">Room name</label>
                    <input type="text" class="form-control" name="name" id="room" aria-describedby="nameHid" placeholder="" value="{{ $room->name }}">
                </div>
                <div class="form-group">
                    <label for="capacity" class="font-semibold">Capacity (people)</label>
                    <input type="number" class="form-control" name="capacity" id="capacity" aria-describedby="capacityHid" placeholder="" value="{{ $room->capacity }}">
                </div>
                <div class="form-group">
                    <label for="area" class="font-semibold">Area (m<sup>2</sup>)</label>
                    <input type="number" class="form-control" name="area" id="area" value="{{ $room->area }}">
                </div>
                <div class="form-group d-flex justify-content-between">
                    <div >
                        <label for="status" class="font-semibold">Status</label>
                        <select class="form-control" name="status" value="{{ $room->status }}" required>
                            <option value="Active" @if ($room->status == 'Active')
                                selected
                            @endif>Active</option>
                            <option value="Repairing" @if ($room->status == 'Repairing')
                                selected
                            @endif>Repairing</option>
                        </select>
                    </div>
                    <div>
                        <label for="facilities" class="font-semibold">Facilities</label>
                        <select class="form-control facilities" style="width: 400px ; height: 40px; text-align: center;" name="facilities[]" multiple="multiple" required>
                            @foreach ($facilities as $facility)
                                <option value="{{ $facility->id }}" @foreach ($room->facilities as $facilityWith)
                                    @if ($facilityWith->id == $facility->id)
                                        selected
                                    @endif
                                @endforeach>{{ $facility->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="text-align: center;">
                <button type="submit" class="btn btn-primary rounded-md font-semibold">ADD</button>
            </div>
        </div>
    </form>
    <script>
        $('.facilities').select2({
            allowClear: true,
        });
    </script>
@endsection
