<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <meta name="theme-color" content="#7952b3">
    <title>Administrativo</title>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/bootstrap-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/base.css')}}" rel="stylesheet" />
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Administrativo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="@isroute('admin.*')" aria-current="page" href="{{route('admin.index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="@isroute('branch.*')" href="{{route('branch.index')}}">Filial</a>
                    </li>
                </ul>
                @auth
                <div class="text-end">
                    <form action="{{route('login.logout')}}" method="POST" onsubmit="onSubmit(event)">
                        @csrf
                        <button type="submit" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Sair do Sistema">Logout</button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </nav>
    <main class="container">
        @yield('content')
    </main>
    <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/js/jquery-3.1.1.js')}}"></script>
    <script src="{{asset('/js/web.js')}}"></script>
    @yield("scripts")
    @include('sweetalert::alert')
</body>

</html>