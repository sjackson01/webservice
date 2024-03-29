<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Laravel Basics</title>
        <!-- Bootstrap core CSS -->
        <!-- Latest compiled and minified CSS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    </head>
    <!-- START body -->
    <body style="background-color:#304ffe">
        <!-- START nav -->
        <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
            <a href="{{ url('/') }}"><button class="btn btn-outline-info" type="button">Moodle Settings</button></a>
            <a href="/endpoint"><button class="btn btn-outline-info" type="button">Endpoint Settings</button></a>
            <a href="/import"><button class="btn btn-outline-info" type="button">Import Settings</button></a>
            <a href="/dataview"><button class="btn btn-outline-info" type="button">Data View</button></a>
            <a href="/functions"><button class="btn btn-outline-info" type="button">Functions</button></a>
            <a href="/up"><button class="btn btn-outline-info" type="button">Up Test</button></a>
        </form>
        </nav>
        <!-- END nav -->
            @yield('content')
        <!-- START footer -->     
        <footer>   
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <!-- <script src="{{asset('js/app.js')}}"></script> -->
        </footer>
        <!-- END footer --> 
    </body>  
    <!-- END Body -->
</html>
