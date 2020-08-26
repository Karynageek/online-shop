<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Bank</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/1091/PNG/512/bank_78392.png" type="image/x-icon">

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
                        <a href="{{ route('home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <img src="data:image/png;base64,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" alt="Money">
                <div class="title m-b-md">
                    Bank
                </div>
                <div class="links">
                    <a href="{{ route('deposit-view')}}">Cabinet</a>
                </div>
            </div>
        </div>
    </body>
</html>
