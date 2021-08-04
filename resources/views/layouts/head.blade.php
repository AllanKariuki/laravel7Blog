<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AllanTrial') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/w3v3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/laravelstyles.css') }}" rel="stylesheet">
    <link href="{{asset('css/css/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/css/css/mdb.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('css/css/css/style.css')}}" type="text/css" rel="stylesheet">

</head>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
        </script>
