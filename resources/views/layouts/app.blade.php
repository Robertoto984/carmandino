<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{asset('favicon.ico')}}">
  <title>Dashboard - CARIFY</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
 @include('styles')
@yield('style')
</head>

<body class="vertical  light rtl ">
  <div class="wrapper">
    @include('header')
    {{-- @include('sidebar') --}}

    <main role="main" class="main-content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center" style="gap:30px;margin-top:50px;">
          @yield('content')
          @include('modal')
        </div>
      </div>
    </main>

    @include('scripts')
    @yield('scripts')
</body>

</html>