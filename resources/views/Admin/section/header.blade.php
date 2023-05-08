<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header w-100">
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row justify-content-end">
        <div class="col-sm-3 col-md-2 sidebar bg-light p-0">
            <ul class="list-group p-0">
                <li class="py-3 bg-light list-group-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="py-3 bg-light list-group-item"><a href="{{ route('city.index') }}">Cities</a></li>
                <li class="py-3 bg-light list-group-item">A third item</li>
                <li class="py-3 bg-light list-group-item">A fourth item</li>
                <li class="py-3 bg-light list-group-item">And a fifth one</li>
            </ul>
        </div>
