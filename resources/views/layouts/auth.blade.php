<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="/images/logo.png" />

    <title>@yield('title')</title>

    {{-- style --}}
    @stack('perpend-style')
    @include('includes.style')
    @stack('addon-style')
  </head>
  <body>
{{-- navbar --}}

{{-- page content --}}
@yield('content')

{{-- footer --}}

{{-- script --}}
@include('sweetalert::alert')
@stack('perpend-script')
@include('includes.script')
@stack('addon-script')
    </body>
</html>