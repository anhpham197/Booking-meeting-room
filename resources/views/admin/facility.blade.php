@extends('admin.layout')
@section('data-table')
    <div class="my-3"><a class="py-2 px-3 bg-blue-500 rounded-md text-white uppercase" href="{{ route('admin.facilities') }}">Back</a></div>
    <form autocomplete="on" action="{{route('facilities.upload')}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card">
            <div class="card-header text-center uppercase text-xl font-semibold">FACILITY INFORMATION</div>
            <div class="card-body" style="height: 415px;">
                <div class="form-group">
                    <label for="name" class="font-semibold">Facility name</label>
                    <select name="facilities[]" class="facilities form-control bg-white" multiple="multiple">
                        <option value="" class="bg-white"></option>
                    </select>
                </div>
            </div>
            <div class="card-footer" style="text-align: center;">
                <button type="submit" class="btn btn-primary" style="height: 40px">ADD</button>
            </div>
        </div>
    </form>
    <script>
        $('.facilities').select2({
            placeholder: 'Type facilities...',
            tags: true,
            allowClear: true,
        });
    </script>
@endsection
