<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Livewire Click Event Demo</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href=" {{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href=" {{asset('assets/css/Sidebar-Cool-SB-Admin-Inspirate.css')}}">

    <style>

        body {
            font-family: 'Open Sans', San-Serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1 {
            margin-top:80px;
            font-weight: bold;
        }

        p {
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .btn {
            margin-left: 10px;
            margin-right: 10px;
        }

        .social-card-header{
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: center;
            justify-content: center;
            height: 96px;
        }
        .social-card-header i {
            font-size: 32px;
            color:#FFF;
        }
        .bg-facebook {
            background-color:#3b5998;
        }
        .text-facebook {
            color:#3b5998;
        }
        .bg-google-plus{
            background-color:#dd4b39;
        }
        .text-google-plus {
            color:#dd4b39;
        }
        .bg-twitter {
            background-color:#1da1f2;
        }
        .text-twitter {
            color:#1da1f2;
        }
        .bg-pinterest {
            background-color:#bd081c;
        }
        .text-pinterest {
            color:#bd081c;
        }
        .share:hover {
            text-decoration: none;
            opacity: 0.8;
        }
    </style>
</head>

<body>

<div>
    @livewire('resource')
</div>

<script>
    function selectAwardingBody(awardingBodyId) {
        window.livewire.emit('selectAwardingBody', awardingBodyId)
    }
</script>

<script src=" {{asset('assets/js/jquery.min.js')}}"></script>
<script src=" {{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/filter.js') }}"></script>
</body>

@livewireScripts

</html>
