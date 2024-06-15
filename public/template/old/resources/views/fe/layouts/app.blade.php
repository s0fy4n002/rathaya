<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peatland Commodity Business Hub</title>

    <link rel="icon" type="image/png" href="/th/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="/th/favicon/favicon-128x128.png" sizes="128x128" />
    <link rel="icon" type="image/png" href="/th/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="/th/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/th/favicon/favicon-16x16.png" sizes="16x16" />

    <link rel="icon" href="/th/favicon/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <meta name="application-name" content="&nbsp;" />

    <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font/icon/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @stack('style')
    @vite('resources/scss/app.scss')
</head>

<body>
    @include('fe.layouts.navbar')
    <div class="min-h-[18rem]">
        @yield('content')
    </div>
    @include('fe.layouts.footer')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/owlcarousel/dist/owl.carousel.min.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        @if ($message = Session::get('success_message'))
            Swal.fire({
                title: "The Internet?",
                text: "That thing is still around?",
                icon: "question"
            });
            {{ Session::forget('success_message') }}
        @elseif ($message = Session::get('error'))
            Swal.fire({
                title: "Error",
                text: "{{ $message }}",
                icon: "error"
            });
        @endif
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    @stack('js')
</body>

</html>
