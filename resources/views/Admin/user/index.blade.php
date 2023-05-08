@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="page-header head-section">
            <h2>Users</h2>
            <p><a href="{{ route('user.create') }}" class="btn btn-primary">Add new user </a></p>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center table-striped">
                <thead>
                <tr>
                    <th>name</th>
                    <th>city</th>
                    <th>address</th>
                    <th>email</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->city?->name }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="row justify-content-center">
                                <form class="w-auto mx-2 formDelete" action="{{route('user.destroy' , $user)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn-sm btn-danger alert_type">Delete</button>
                                </form>
                                <a href="{{ route('user.edit', $user) }}" class="btn-sm btn-warning w-auto">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{ $users->links() }}
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
