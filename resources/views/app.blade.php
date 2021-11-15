<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Livewire Click Event Demo</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href=" {{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/css/Sidebar-Cool-SB-Admin-Inspirate.css')}}">
</head>

<body>

<div>
    @livewire('resource')
</div>

<script src=" {{asset('assets/js/jquery.min.js')}}"></script>
<script src=" {{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

@livewireScripts

</html>
