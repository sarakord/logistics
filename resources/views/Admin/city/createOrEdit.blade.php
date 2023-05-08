@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>create/edit Cities</h2>
        </div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
            @endforeach
        @endif
        <div class="col-8 mx-auto">
            @if (isset($city->id))
                <form action="{{ route('city.update', ['city' => $city]) }}" method="post">
                    @csrf
                    @method('put')
                    @else
                        <form action="{{ route('city.store') }}" method="post">
                            @csrf
                            @endif
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-home" type="button" role="tab"
                                            aria-controls="nav-home" aria-selected="true">city
                                    </button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-profile" type="button" role="tab"
                                            aria-controls="nav-profile" aria-selected="false">downtown
                                    </button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                     aria-labelledby="nav-home-tab">
                                    <div class="mb-3">
                                        <label for="city_name" class="form-label">city name</label>
                                        <input type="text" name="city[name]" class="form-control" id="city_name"
                                               aria-describedby="city name"
                                               value="{{ $city->name ?? old('city.name') }}">
                                    </div>
                                    <div class="form-check col-2">
                                        <input type="hidden" name="city[is_active]" value="0">
                                        <input class="form-check-input" name="city[is_active]" type="checkbox" value="1"
                                               id="flexCheckChecked" {{ (isset($city) && $city->is_active) ? 'checked':'' }}>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            active
                                        </label>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                     aria-labelledby="nav-profile-tab">
                                    <div class="row mt-3">
                                        <label for="downtown_name" class="form-label">downtown name</label>
                                        <input type="text" name="downtown[name]" class="form-control"
                                               id="downtown_name" aria-describedby="downtown name"
                                               value="{{ $city->downtown?->name ?? old('downtown.name') }}">
                                    </div>
                                    <div class="row mt-3">
                                        <div class="ml-2">
                                            <label for="longitude" class="form-label">longitude</label>
                                            <input type="text" name="downtown[long]" class="form-control"
                                                   id="longitude" aria-describedby="longitude"
                                                   value="{{ $city->downtown?->long ?? old('downtown.long') }}">
                                        </div>
                                        <div>
                                            <label for="latitude" class="form-label">latitude</label>
                                            <input type="text" name="downtown[lat]" class="form-control"
                                                   id="latitude" aria-describedby="latitude"
                                                   value="{{ $city->downtown?->lat ?? old('downtown.lat') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>

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
