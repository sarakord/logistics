<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="#">Users management</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="#">Cities</a></li>
                <li><a href="#">Motorcycle<span class="badge">0</span></a></li>
                <li><a href="#">Consignment<span class="badge">0</span></a></li>
            </ul>
        </div>
