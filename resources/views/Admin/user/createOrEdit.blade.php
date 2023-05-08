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
            @if (isset($user->id))
                <form action="{{ route('user.update', ['user' => $user]) }}" method="post">
                    @csrf
                    @method('put')
                    @else
                        <form action="{{ route('user.store') }}" method="post">
                            @csrf
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label">name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                       aria-describedby="name"
                                       value="{{ $user->name ?? old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                       aria-describedby="email"
                                       value="{{ $user->email ?? old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                       aria-describedby="password">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">new password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password"
                                       aria-describedby="password">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">city</label>
                                <select class="form-select" name="city_id" aria-label="Default select example">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ (isset($user) && $city->id == $user->city_id) ? 'selected':'' }}>{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">address</label>
                                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3">{{ $user->address ?? old('address') }}</textarea>
                            </div>
                            <div class="row mt-3">
                                <div class="ml-2">
                                    <label for="longitude" class="form-label">longitude</label>
                                    <input type="text" name="long" class="form-control"
                                           id="longitude" aria-describedby="longitude"
                                           value="{{ $user->long ?? old('long') }}">
                                </div>
                                <div>
                                    <label for="latitude" class="form-label">latitude</label>
                                    <input type="text" name="lat" class="form-control"
                                           id="latitude" aria-describedby="latitude"
                                           value="{{ $user->lat ?? old('lat') }}">
                                </div>
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
