<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
   
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    
    <script> jQuery(document).ready(function($){
        
        
        $('#product_list').DataTable(); 
        
    });

    </script>

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
                    @guest
                    @else

                        @if( Auth::user()->user_types == 1 )

                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('travellers') }}">{{ __('Travellers') }}</a>
                        </li>
                    
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('clinical_records') }}">{{ __('Clinical Records') }}</a>
                        </li>
                    
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('drug_test') }}">{{ __('Drug Test') }}</a>
                        </li>
                    
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('radiology') }}">{{ __('Radiology') }}</a>
                        </li>
                    
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('physical') }}">{{ __('Physical Examination') }}</a>
                        </li>
                    
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('remarks') }}">{{ __('Remarks') }}</a>
                        </li>

                        
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users') }}">{{ __('Users') }}</a>
                        </li>
                    
                    
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user_types') }}">{{ __('User Types') }}</a>
                        </li>
                    
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('agency') }}">{{ __('Agency') }}</a>
                        </li>

                     @elseif( Auth::user()->user_types == 2 )   

                     <li class="nav-item">
                                    <a class="nav-link" href="{{ route('travellers') }}">{{ __('Travellers') }}</a>
                        </li>
                    
                    @elseif( Auth::user()->user_types == 3 )

                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('clinical_records') }}">{{ __('Clinical Records') }}</a>
                        </li>
                    
                    
                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('drug_test') }}">{{ __('Drug Test') }}</a>
                        </li>

                        @elseif( Auth::user()->user_types == 4 )

                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('radiology') }}">{{ __('Radiology') }}</a>
                        </li>

                        @elseif( Auth::user()->user_types == 5 )

                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('physical') }}">{{ __('Physical Examination') }}</a>
                        </li>

                        @elseif( Auth::user()->user_types == 6 )

                        <li class="nav-item">
                                    <a class="nav-link" href="{{ route('remarks') }}">{{ __('Remarks') }}</a>
                        </li>

                    
                        @endif
                    @endguest

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
            @yield('content')
        </main>
    </div>
</body>
</html>
