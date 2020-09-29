<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste - @yield('title')</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">

    <link href="{{url('assets/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{url('assets/fontawesome/css/brands.css')}}" rel="stylesheet">
    <link href="{{url('assets/fontawesome/css/solid.css')}}" rel="stylesheet">

    <script src="{{url('assets/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('assets/bootstrap/js/bootstrap.min.js')}}"></script>

    

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{url('')}}">Teste-Optima</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="margin-left: auto;">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('idiomas')}}">Idiomas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('moedas')}}">Moedas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('paises')}}">Países</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('body')

    <script src="{{url('assets/js/javascript.js')}}"></script>
</body>

</html>