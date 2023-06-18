<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS files -->
    <link href="{{ asset('/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/demo.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css"/>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    
</head>

<body>
    <div class="wrapper">
        @include('layouts.app.sidebar')
        @include('layouts.app.header')
        <div class="page-wrapper">
            @yield('subtitle')
            <div class="page-body">
                @yield('content')
            </div>
            @include('layouts.app.footer')
        </div>
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('/dist/js/tabler.min.js') }}"></script>
    <script src="{{ asset('/dist/js/demo.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
