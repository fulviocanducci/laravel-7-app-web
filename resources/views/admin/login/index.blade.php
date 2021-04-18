<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Login - Administrativo</title>
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/signin.css')}}" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">
</head>

<body class="text-center">
    <main class="form-signin">
        @include('_layout.errors.error')
        <form name="form1" id="form1" action="{{route('login.authenticate')}}" method="POST">
            @csrf
            <img class="mb-4" src="{{asset('/img/admin.png')}}" alt="" width="72">
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="form-floating">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Senha</label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me" name="remember" value="1"> Lembrar
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
        </form>
    </main>
    <script src="{{asset('/js/jquery-3.1.1.js')}}"></script>
    <script src="{{asset('/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/js/localization/messages_pt_BR.js')}}"></script>
    <script src="{{asset('/js/forms/validate-login.js')}}"></script>
</body>

</html>