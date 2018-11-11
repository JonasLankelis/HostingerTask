<!DOCTYPE html>
<html>
    <head> 
        <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    </head>
    <body>
        <h1>Laravel Quickstart</h1>
        @yield('content')
        @include('create_new_cat')
        @include('notification')
    </body>
</html>