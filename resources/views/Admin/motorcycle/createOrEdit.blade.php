@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>create/edit motorcycle</h2>
        </div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <div class="col-8 mx-auto">
            @if (isset($motorcycle->id))
                <form action="{{ route('motorcycle.update', ['motorcycle' => $motorcycle]) }}" method="post">
                    @csrf
                    @method('put')
                    @else
                        <form action="{{ route('motorcycle.store') }}" method="post">
                            @csrf
                            @endif

                            <div class="mb-3">
                                <label for="driver" class="form-label">driver name</label>
                                <input type="text" name="driver" class="form-control" id="driver"
                                       aria-describedby="driver"
                                       value="{{ $motorcycle->driver ?? old('driver') }}">
                            </div>
                            <div class="mb-3">
                                <label for="license_plate" class="form-label">license_plate</label>
                                <input type="text" name="license_plate" class="form-control" id="license_plate"
                                       aria-describedby="license_plate"
                                       value="{{ $motorcycle->license_plate ?? old('license_plate') }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">city</label>
                                <select class="form-select" name="city_id" aria-label="Default select example">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ (isset($motorcycle) && $motorcycle->city_id == $city->id) ? 'selected':'' }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-check col-2">
                                <input type="hidden" name="in_downtown" value="0">
                                <input class="form-check-input" name="in_downtown" type="checkbox" value="1"
                                       id="flexCheckChecked" {{ (isset($motorcycle) && $motorcycle->in_downtown) ? 'checked':'' }}>
                                <label class="form-check-label" for="flexCheckChecked">
                                    in downtown
                                </label>
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $("#flexCheckChecked").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', 1);
            } else {
                $(this).attr('value', 0);
            }
        });
    </script>
@endpush
