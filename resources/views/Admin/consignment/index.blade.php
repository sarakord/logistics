@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>Consignment</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center table-striped">
                <thead>
                <tr>
                    <th>name</th>
                    <th>city</th>
                    <th>driver</th>
                    <th>status</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($consignments as $consignment)
                    <tr>
                        <td>{{ $consignment->customer?->name }}</td>
                        <td>{{ $consignment->city }}</td>
                        <td>{{ $consignment->motorcycle?->driver }}</td>
                        <td>{{ config('consignment.status')[$consignment->status] }}</td>
                        <td>
                            <div class="row justify-content-center">
                                <form class="w-auto mx-2 formDelete" action="{{route('consignment.destroy' , $consignment)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn-sm btn-danger alert_type">Delete</button>
                                </form>
                                <a href="{{ route('consignment.edit', $consignment) }}" class="btn-sm btn-warning w-auto">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{ $consignments->links() }}
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
