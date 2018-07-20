<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Nico</title>
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script"      rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Economica:700"       rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada"rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC:700"       rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Corben:700"          rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower"        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand"           rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayad" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script"      rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Caveat"              rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Homemade+Apple"   
        
        
        <link href="https://fonts.googleapis.com/css?family=Covered+By+Your+Grace" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Teko" rel="stylesheet">
       <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
        
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    </head>
    <body>
        @include('commons.navbar')

        @yield('cover')

        <div class="container">
            @include('commons.error_messages')
            @yield('content')
        </div>

        @include('commons.footer')
    </body>
</html>