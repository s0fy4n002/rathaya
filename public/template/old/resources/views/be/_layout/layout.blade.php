<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-url-prefix="/" data-footer="true"
    @isset($html_tag_data)
        @foreach ($html_tag_data as $key=> $value) data-{{$key}}='{{$value}}' @endforeach
    @endisset
>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">{{-- CSRF Token --}}
    <title>{{$title}} | Peatland Commodities Business Hub</title>
    <meta name="description" content="{{$description}}"/>
    @include('be._layout.head')
</head>

<body>
    <div id="root">
        <div id="nav" class="nav-container d-flex" @isset($custom_nav_data) 
                                                        @foreach ($custom_nav_data as $key=> $value)
                                                            data-{{$key}}="{{$value}}"
                                                        @endforeach
                                                    @endisset>
            @include('be._layout.nav')
        </div>
        <main>
            @yield('content')
        </main>
        @include('be._layout.footer')
    </div>
    @include('be._layout.modal_settings')
    @include('be._layout.modal_search')
    @include('be._layout.scripts')
</body>

</html>
