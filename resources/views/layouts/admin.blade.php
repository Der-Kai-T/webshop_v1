<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset("/assets/img/logo.png") }}" type="image/x-icon">

    <title>
        @if(isset($title))
            {{ $title }} |
        @endif
        {{ config('app.name') }}
    </title>
    @livewireStyles
    @vite("resources/js/backend.js")
    {{--    <script src="{{ asset("/assets/enable-webpush.js") }}"></script>--}}
    {!! ToastMagic::styles() !!}
</head>


<body class="layout-fixed sidebar-expand-lg  sidebar-open app-loaded" data-bs-theme="dark"> <!--begin::App Wrapper-->
<div class="app-wrapper">

    <x-app.admin.layout.header/>

    <x-app.admin.layout.sidebar/>


    <main class="app-main">
        @if(isset($header))
        <div class="app-content-header">
            <div class="container-fluid">
                {{ $header }}
            </div>
        </div>
        @endif
        <div class="app-content">
            @if ($errors->any())

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
            {{ $slot }}
        </div>

    </main>

    <x-app.admin.layout.footer/>


</div>


{{--<x-app.desktop-notification/>--}}
@livewireScripts
{!! ToastMagic::scripts() !!}
<script>
    window.addEventListener('pushState', e => {
        history.pushState({}, '', e.detail.url)
    });

    document.addEventListener('livewire:init', () => {
        Livewire.on('set-title', ({title}) => {
            document.title = title;
        });
    });


    document.addEventListener('click', () => {
        const el = document.getElementById('law-scroll-container');
        if (!el) return;

        sessionStorage.setItem('law_scroll_top', el.scrollTop);
    });


    document.addEventListener('livewire:navigated', () => {
        const el = document.getElementById('law-scroll-container');
        if (!el) return;

        const y = sessionStorage.getItem('law_scroll_top');

        if (y !== null) {
            el.scrollTop = parseInt(y);
        }
    });

</script>
</body>


</html>
