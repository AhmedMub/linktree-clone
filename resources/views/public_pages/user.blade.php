<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> {{Auth::user()->username}} Linktree</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    {{-- modernizr --}}
    <script src="{{ asset('js/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <section class="user-page">
        <div class="row m-0">
            @foreach ($user->links as $user)
            <div class="col-md-8 offset-md-2 text-center pt-5">
                <div class="avatar">
                    <img src=" {{asset('storage/'.$user->image)}} " alt="avatar">
                </div>
            </div>
            <div class="user-links">
                d
            </div>
            @endforeach
        </div>

    </section>



    {{-- Start Scripts --}}
    {{-- jquery latest version --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    {{-- bootstrap 4 js --}}
    <script src=" {{asset('js/popper.min.js')}} "></script>
    <script src=" {{ asset('js/bootstrap.min.js') }}"></script>

    {{-- Custom Script --}}
    <script src="{{ asset('js/custom.js') }}"></script>
    {{-- end Scripts --}}
</body>

</html>
