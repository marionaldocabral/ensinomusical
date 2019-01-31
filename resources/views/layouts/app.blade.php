<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{url('clave.png')}}" type="image/x-icon" />

    <title>Ensino Musical</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  
</head>
<body id="app-layout">
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Ensino Musical
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @auth
                        @include('admin.menu')                        
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Entrar</a></li>
                        <!--<li><a href="{{ route('register') }}">Cadastrar-se</a></li>-->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Sair
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    
</body>
<script>
    $(document).ready(function(){

        $('.tel').val(function(){
            var numeros = $(this).val()
            var telefone = ''
            if(numeros.length > 0 && numeros.length <= 10)
                telefone = '(' + numeros.substring(0, 2) + ') ' + numeros.substring(2, 6) + '-' + numeros.substring(6, 10)
            else if(numeros.length > 10)
                telefone = '(' + numeros.substring(0, 2) + ') ' + numeros.charAt(2) + numeros.substring(3, 7) + '-' + numeros.substring(7, 11)
            
            if(numeros != '')
                return telefone
        })
                
        $('.tel').keyup(function(){
            var telefone = $(this).val()
            var numeros = ''
            for(var i = 0; i < telefone.length; i++){
                if(telefone.charAt(i) == 0 || telefone.charAt(i) == 1 || telefone.charAt(i) == 2 || telefone.charAt(i) == 3 || telefone.charAt(i) == 4 || telefone.charAt(i) == 5 || telefone.charAt(i) == 6 || telefone.charAt(i) == 7 || telefone.charAt(i) == 8 || telefone.charAt(i) == 9)
                    numeros += telefone.charAt(i)
            }
            var mascara = ''
            for(var i = 0; i < numeros.length; i++){
                if(i == 0)
                    mascara = '(' + numeros.charAt(i)
                else if(i == 3 || i == 4 || i == 5 || i == 8 || i == 9 || i == 10 || i == 11)
                    mascara += numeros.charAt(i)
                else if(i == 1)
                    mascara = mascara + numeros.charAt(i) + ') '
                else if(i == 6 && numeros.length < 12)
                    mascara = mascara + numeros.charAt(i) + '-'
                else if(i == 6)
                    mascara = mascara + numeros.charAt(i)
                else if(i == 7 && numeros.length >= 12)
                    mascara = mascara + numeros.charAt(i) + '-'
                else if(i == 7)
                    mascara = mascara + numeros.charAt(i)               
            }
            $(this).val(mascara)
        })
    })
</script>
</html>
