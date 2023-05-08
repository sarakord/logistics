<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <style>
        body, html {
            direction: rtl;
            margin: 0;
            padding: 0;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
</head>

<body>

<div id="app">
    @include('Admin.section.header')
    @yield('content')
</div>

@include('Admin.section.footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>


</html>
