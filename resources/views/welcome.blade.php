<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Memoria de labores</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
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
                        <a href="{{ route('login') }}">Login</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Memoria de Labores
                </div>
                <div class="content">
                    <h2><img src="vendor/adminlte/dist/img/Minerva.png" class="img-circle" alt="Cinque Terre" width="200" height="400"></h2>
                </div>
            </div>
        </div>
    </body>
<div class="content">
<footer id="footer" class="py-1 bg-inverse">
   <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info">
                        <h5 class="nopadding">Contáctanos</h5>
                        <p>Av. Principal XXXXXXXXXXXXXXXX, XXXXXXXXXXXXXXXXXXXXXXXXX</p>
                        <p><i class="fa fa-phone-square"></i>Phone : (503) xxxx-xxxx, xxxx-xxxx</p>
                        <p><i class="fa fa-envelope"></i>E-mail : <a class="mail-link"> XXXXXXXXX@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-foot">
        <div class="container">
                <p>Copyright &copy; 2022 - GRUPO 8 TESIS</p>
        </div>
    </div>
</footer>
</div>

</html>
