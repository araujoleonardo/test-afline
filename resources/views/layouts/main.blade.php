<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @yield('css')

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <style>
        .navbar ul li {
            border-bottom: 4px solid #4876FF;
            margin-right: 10px;
        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <!-- Navbar -->
        <div class="row bg-light">
            <div class="col rounded-3 border shadow text-end m-2 p-2">
                <nav class="container-fluid navbar">
                    <a href="{{ url('/home') }}" class="nav-link link-light p-0 pl-2">
                        <h5>Sistema</h5>
                    </a>
                    <div class="d-flex">                        
                        <nav class="navbar navbar-expand-sm bg-light navbar-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/clientes') }}">Clientes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/servicos') }}">Serviços</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('#') }}">Ordem de serviço</a>
                                </li>
                            </ul>
                        </nav>                                
                    </div>
                </nav>
            </div>
        </div>

        <div class="row bg-white" style="height: 750px;">
            <div class="col rounded-3 border shadow m-2">
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="bg-white text-center fixed-bottom">
        <div class="rounded-3 border shadow m-2 text-center p-3">
            © 2023 Copyright | Todos os direitos reservados
        </div>
    </footer>
    @include('clientes.modalCliente')
    @include('servicos.modalServico')
    <!-- JS Bootstrap + Jquery -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
    <!-- Ajax -->
    @yield('js')
</body>
</html>
