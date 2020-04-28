<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/styles/atom-one-dark.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
                    
                    @if($errors->count()>0)
                        <ul class="list-group-item">
                        @foreach($errors->all() as $error)
                                <li class="list-group-item text-danger">{{$error}}</li>
                        @endforeach
                        </ul>
                    @endif
                   <br><br>
        <main class="py-4">
           <div class="container">
               <div class="row">
                   <div class="col-lg-4">
                       <a href="{{route('discussions.create')}}" class="form-control btn btn-primary">create a new discussion</a>
                       <br><br>
                       <div class="card card-default "  style="width: 22rem;">
                           <div class="card-body">
                                <ul class="list-group list-group-flush">
                               <li class="list-group-item">
                               <a href="/forum"> HOME </a>
                               </li>
                               <li class="list-group-item">
                               <a href="/forum?filter=me"> My Discussions </a>
                               </li>
                               <li class="list-group-item">
                               <a href="/forum?filter=solved"> Closed Discussions </a>
                               </li>
                               <li class="list-group-item">
                               <a href="/forum?filter=unsolved"> Open Discussions </a>
                               </li>
                                </ul>
                           </div>
                       </div>
                       <br><br>
                       @if(Auth::check())
                       @if(Auth::user()->admin)

                       <div class="card-body">
                                <ul class="list-group list-group-flush">
                               <li class="list-group-item">
                               <a href="/channels"> All channels </a>
                               </li>
                                </ul>
                           </div>
                       @endif
                       @endif

                       <div class="card card-default "  style="width: 22rem;">
                           <div class="card-header">
                               Channel
                           </div>
                           <div class="card-body">
                                <ul class="list-group list-group-flush">
                                 @foreach($channels as $channel)
                                    <li class="list-group-item"> 
                                    <a href="{{route('channel',['slug'=>$channel->slug])}}">{{$channel->title}}</a>
                                    
                                    </li>
                                 @endforeach
                                </ul>
                           </div>
                       </div>
                      
                   </div>
                   <div class="col-lg-8">
                   @yield('content')
                   </div>
               </div>
           </div>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/toastr.min.js') }}" ></script>
    <script>
     @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
    @endif
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.18.1/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>

</html>
