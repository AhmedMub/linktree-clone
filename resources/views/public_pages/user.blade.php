<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Linktree</title>

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

@foreach ($userLinks as $ubg)

<body class=" {{$ubg->background_color}} ">
    @endforeach

    <section class="container">
        <div class="row m-0">
            @foreach ($userLinks as $user)
            <div class="col-md-12">
                <div class="avatar text-center mt-5">
                    <img class="img-responsive" src=" {{asset($user->image)}} " alt="avatar">
                    <div class="username mt-3"> {{"@".$user->username}} </div>
                </div>
            </div>
            <div class="col-md-12">
                @foreach ($user->links as $ulink)
                <div class="user-links  text-center">
                    <a style="color:{{$user->text_color}}; background-color:{{$user->text_bg}}"
                        class="user-link btn usr-btn btn-primary btn-flat text-capitalize" href="{{$ulink->link}}"
                        target="_blank" link-id="{{$ulink->id}}">
                        {{$ulink->name}}
                    </a>
                </div>
                @endforeach
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
