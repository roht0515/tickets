<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: rgba(3, 78, 3, 0.459);
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
                color: #000000;
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

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content container col-10">
                <div class="card card-outline card-success">
                    <div class=" card-header">
                        <img width="600px" height="150px" src="{{asset('img/logo.png')}}" alt="">
                    </div>
                    <div class ="card-body">
                       @foreach ($TypeClient as $item)
                        <button style="width: 150px; height:55px;  font-size: 15px;" onclick="Send({{$item->id}})" class="btn btn-success m-4 "><label for="">{{$item->name}}</label></button>
                       @endforeach
                    </div>
                    <div class="card-footer">
                        <label style="font-size: 30px" for="">Servicio:  {{$services[0]->name}}</label>
                        <a class="btn btn-success offset-4" href="/">Volver</a>
                        <input type="hidden" name="service" id="service" value="{{$services[0]->id}}">
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        function Send(id) {
            console.log("hola");
            let type_client = id;
            let Service = $('#service').val();
            $.ajax({
                type: "GET",
                url: "{{ route('generate') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    type_client: type_client,
                    service: Service,
                },
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    let id = data.data["id"];
                    console.log(id);
                    window.location.href="/imprimir" + id;
                },
                error: function (error) {
                console.log(error);
                }
            });
        }
    </script>
</html>
