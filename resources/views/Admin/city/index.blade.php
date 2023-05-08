@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>Cities</h2>
            <p><a href="{{ route('city.create') }}" class="btn btn-primary">Add new city </a></p>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center table-striped">
                <thead>
                <tr>
                    <th>city</th>
                    <th>downtown</th>
                    <th>status</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->downtown?->name }}</td>
                        <td>{{ $city->is_active ? 'active':'inactive' }}</td>
                        <td>
                            <div class="row justify-content-center">
                                <form class="w-auto mx-2 formDelete" action="{{route('city.destroy' , $city)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn-sm btn-danger alert_type">Delete</button>
                                </form>
                                <a href="{{ route('city.edit', $city) }}" class="btn-sm btn-warning w-auto">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{ $cities->links() }}
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.alert_type').click(function (){
            let form = $(this).closest('form');
            swal.fire({
                title: 'delete item?',
                showConfirmButton:true,
                showCancelButton:true,
                confirmButton: 'yes',
                cancelButton: 'no',
            }).then(({value}) => {
                if (value) {
                    form.submit();
                }
            });
        });

    </script>
@endpush
