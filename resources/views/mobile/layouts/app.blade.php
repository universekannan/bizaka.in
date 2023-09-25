<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>PayApp - Finance, Banking, Wallet, Crypto Mobile PWA</title>
    <link rel="stylesheet" type="text/css" href="{!! asset('mobile/styles/bootstrap.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('mobile/fonts/bootstrap-icons.html') !!}">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&amp;family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet">
    <link rel="manifest" href="{!! asset('_manifest.json') !!}">
    <meta id="theme-check" name="theme-color" content="#FFFFFF">
    <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('mobile/app/icons/icon-192x192.html') !!}">
    </head>
<body>

  @include('mobile/layouts.header')
  @include('mobile/layouts.menu')
  
  
  @yield('mobile/content')
  
  @include('mobile/layouts.footer')
  
  @yield('mobile/third_party_scripts')
     
    <script src="{!! asset('mobile/scripts/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('mobile/scripts/custom.js') !!}"></script>
</body>
</html>
