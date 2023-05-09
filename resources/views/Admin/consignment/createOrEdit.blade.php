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
            <form action="{{ route('consignment.update', ['consignment' => $consignment]) }}" method="post">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">customer: {{ $consignment->customer?->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">status: {{ config('consignment.status')[$consignment->status] }}</h6>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="password" class="form-label">motorcycle</label>
                            <select class="form-select" name="motorcycle_id" aria-label="Default select example">
                                @foreach($motorcycles as $motorcycle)
                                    <option value="{{ $motorcycle->id }}" {{ (isset($consignment) && $motorcycle->id == $consignment->motorcycle_id) ? 'selected':'' }}>
                                        {{ $motorcycle->driver }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <p class="row">Distance estimation</p>
                            <div class="">
                                <span class="btn-sm btn-warning neshan" style="cursor: pointer">neshan</span>
                                <span class="btn-sm btn-danger map_ir"  style="cursor: pointer">map.ir</span>
                            </div>
                        </div>
                        <div>
                            <span class="result p-3 "></span>
                        </div>
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
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $("#flexCheckChecked").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', 1);
            } else {
                $(this).attr('value', 0);
            }
        });

        $('.neshan').click(function (){
            let api_key = "{{ config('consignment.distance_estimation_Api_key.neshan') }}";
            let env_url = "{!! config('consignment.distance_estimation_url.neshan') !!}";
            let url = env_url.replace("#ORIGIN", "{{ $consignment->location  }}").replace('#DESTINATION', "{{ $consignment->customer_location  }}");
            $.ajaxSetup({
                headers: { 'Api-Key': api_key  }
            });
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'JSON',
                success: function (data) {
                    console.log(data);
                },
                complete: function (data) {
                }

            });
        });

        $('.map_ir').click(function (){
            let api_key = "{{ config('consignment.distance_estimation_Api_key.map_ir') }}";
            let env_url = "{!! config('consignment.distance_estimation_url.map_ir') !!}";
            let url = env_url.replace("#ORIGIN", "{{ $consignment->location  }}").replace('#DESTINATION', "{{ $consignment->customer_location  }}");

            axios.get(url, {
                headers:{
                    'x-api-Key': api_key,
                }
            })
                .then(function (response) {
                   $('.result').text(response.data.distance ? `${response.data.distance[0].distance} km`: 0);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function () {
                });


        });
    </script>
@endpush
