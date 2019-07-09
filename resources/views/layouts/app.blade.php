<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--meta name="csrf-token" content="{{ csrf_token() }}"-->
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <!--script src="{{ asset('js/app.js') }}"></script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->



{{-- dataTables --}}
   <!--link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet"-->

  {{-- SweetAlert2 --}}
 <!--script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"--><!--/script-->
{{--   <link href="{{ asset('public/assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"> --}}


    {{-- dataTables --}}

    <!--script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script-->

    {{-- Validator --}}
    <!--script src="{{ asset('assets/validator/validator.min.js') }}"--><!--/script-->


</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <main class="py-4">
            <div class="container">
                @include("inc.messages")
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
