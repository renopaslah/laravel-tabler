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
    <!-- CSS files -->
    <link href="{{ asset('/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/demo.min.css') }}" rel="stylesheet" />
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
</body>

</html>
