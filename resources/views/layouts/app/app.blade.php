<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Dashboard - {{ config('constant.title') }} - {{ config('constant.description') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS files -->
    <link href="{{ asset('/css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/demo.min.css?1684106062') }}" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css"/>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body >
    <script src="{{ asset('/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page">
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
    <script src="{{ asset('/libs/apexcharts/apexcharts.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('/js/tabler.min.js') }}"></script>
    <script src="{{ asset('/js/demo.min.js') }}"></script>
    @stack('scripts')
  </body>
</html>