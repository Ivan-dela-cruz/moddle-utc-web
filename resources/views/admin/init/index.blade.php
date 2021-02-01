<!DOCTYPE html>
<html lang="es">

<head>
    <title>UTC Virtual Classrooms-Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content=""/>
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('admin.init.css')
</head>
<body class="">
@include('admin.init.load')
@include('admin.init.navbar')
@include('admin.init.header')
@yield('content')

@include('admin.init.scripts')
</body>

</html>
