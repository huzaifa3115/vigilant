<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Vigilant Trading Group</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="http://fonts.cdnfonts.com/css/lemonmilk" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    
    @yield('content')
    
    @include('layouts.footer')
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="{{ asset('assets/js/vendor/jquery-slim.min.js') }}"><\/script>')</script>
  <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
  <script src="{{ asset('assets/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/vendor/holder.min.js') }}"></script>
  <script>
    Holder.addTheme('thumb', {
      bg: '#55595c',
      fg: '#eceeef',
      text: 'Thumbnail'
    });
  </script>
</body>

</html>