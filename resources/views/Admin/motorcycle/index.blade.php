@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>Motorcycles</h2>
            <p><a href="{{ route('motorcycle.create') }}" class="btn btn-primary">Add new motorcycle </a></p>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center table-striped">
                <thead>
                <tr>
                    <th>driver</th>
                    <th>license plate</th>
                    <th>location</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($motorcycles as $motorcycle)
                    <tr>
                        <td>{{ $motorcycle->driver }}</td>
                        <td>{{ $motorcycle->license_plate }}</td>
                        <td>{{ $motorcycle->location }}</td>
                        <td>
                            <div class="row justify-content-center">
                                <form class="w-auto mx-2 formDelete" action="{{route('motorcycle.destroy' , $motorcycle)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn-sm btn-danger alert_type">Delete</button>
                                </form>
                                <a href="{{ route('motorcycle.edit', $motorcycle) }}" class="btn-sm btn-warning w-auto">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{ $motorcycles->links() }}
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
