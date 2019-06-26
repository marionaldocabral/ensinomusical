<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ensino Musical</title>

        <link rel="shortcut icon" href="{{url('clave.png')}}" type="image/x-icon" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Entrar</a>
                       <!-- <a href="{{ route('register') }}">Cadastrar-se</a>-->
                    @endauth
                </div>
            @endif

            <div class="content">
                <img src="{{ url('welcome.jpg') }}" style="width: 300px;">
                <div class="title m-b-md">
                    Ensino Musical
                </div>

                <div class="links">
                    <a href="https://drive.google.com/file/d/0Bxuw124KRxp_M3l5ZWx3UEJXU3c/view?usp=sharing">MTS</a>
                    <a href="https://drive.google.com/file/d/0Bxuw124KRxp_aU5PX2d4dGJpVlU/view?usp=sharing">Hinario em PDF</a>
                    <a href="https://drive.google.com/drive/folders/0Bxuw124KRxp_NHNxOFlSeGVlRXc?usp=sharing">Hinario em MID</a>
                </div>
            </div>
        </div>
    </body>
</html>
