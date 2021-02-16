<!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Laravel Basics</title>
            <!-- Bootstrap core CSS -->
            <!-- Latest compiled and minified CSS -->
            <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
            <!-- Custom styles for this template -->
            <!-- <link href="{{asset('css/starter-template.css')}}" rel="stylesheet"> -->
        </head>
        <!-- START body -->
        <body style="background-color:#304ffe">
            <!-- START nav -->
            <nav class="navbar navbar-light bg-light">
            <form class="form-inline">
                <a href="{{ url('/') }}"><button class="btn btn-outline-info" type="button">Home</button></a>
                <a href="/down"><button class="btn btn-outline-info" type="button">Down</button></a>
                <a href="/database"><button class="btn btn-outline-info" type="button">Database</button></a>
            </form>
            </nav>
            <!-- END nav -->
                @yield('content')
            <!-- START footer -->     
            <footer>   
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="{{asset('js/app.js')}}"></script>
            </footer>
            <!-- END footer --> 
        </body>  
    <!-- END Body -->
</html>
