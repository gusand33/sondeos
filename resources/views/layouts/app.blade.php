<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if (count($errors) > 0)
            <div class="alert alert-warning alert-dismissible text-white fade show" role="alert">
                <span class="alert-icon align-middle">
                  <span class="material-icons text-md">
                    thumb_up_off_alt
                  </span>
                </span>
                <strong>Whoops!</strong> Algo Salio Mal<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> 
@stack('js')
<script>
    $(document).ready(function() {
        $("#form").validate({
        highlight: function(element, errorClass, validClass) {
        $(element).parents("div.input-group").addClass("is-invalid");

        },
        unhighlight: function(element, errorClass, validClass) {
        $(element).parents(".error").removeClass("is-invalid");
        $(element).parents("div.input-group").removeClass("is-invalid");
        },
        submitHandler: function (form) {
            $('button[type="submit"]').html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Guardando...');
            $('button[type="submit"]').attr("disabled", true);
            form.submit();
        }
    });

    $.extend(jQuery.validator.messages, {
                required: "Este campo es requerido.",
                remote: "Por favor arregla este campo.",
                email: "Por favor, introduce una dirección de correo electrónico válida.",
                url: "Por favor, introduce una URL válida.",
                date: "Por favor introduzca una fecha valida.",
                dateISO: "Introduce una fecha válida (ISO)",
                number: "Por favor ingrese un número valido.",
                digits: "Por favor ingrese solo dígitos.",
                creditcard: "Por favor, introduzca un número de tarjeta de crédito válida.",
                equalTo: "Por favor, introduzca el mismo valor de nuevo.",
                accept: "Introduzca un valor con una extensión válida.",
                maxlength: $.validator.format("Introduzca no más de {0} caracteres."),
                minlength: $.validator.format("Introduzca al menos {0} caracteres."),
                rangelength: $.validator.format("Introduzca un valor entre {0} y {1} caracteres de longitud."),
                range: $.validator.format("Introduzca un valor entre {0} y {1}."),
                max: $.validator.format("Introduzca un valor inferior o igual a {0}."),
                min: $.validator.format("Introduzca un valor superior o igual a {0}.")
            });
    });

</script>
</html>
