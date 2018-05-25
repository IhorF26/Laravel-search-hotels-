<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->

    <link href="{{ URL::asset('/css/style.css')}}" rel="stylesheet">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script type="text/javascript" src="{{ asset('/js/hotels.js') }}"></script>

</head>
<body>
<div class="container">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/') }}">Search Hotels</a>
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        @endif
    </div>
    <div class="row">
        <div id="divLoading"></div>
        <p style="font-weight: bold; text-align: center">
            Search Hotels
        </p>
        <hr>

        <div class="col-md-4 panel panel-success">
            <p style="font-weight: bold; text-align: center">
                Enter data for search, please
            </p>
            <form id="mysearchForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="price1">Low price:</label>
                    <input type="number" class="form-control" id="price1">
                </div>
                <div class="form-group">
                    <label for="price2">High price:</label>
                    <input type="number" class="form-control" id="price2">
                </div>
                <div class="form-group">
                    <label for="bedrooms">Bedrooms:</label>
                    <input type="number" class="form-control" id="bedrooms">
                </div>
                <div class="form-group">
                    <label for="bathrooms">Bathrooms:</label>
                    <input type="number" class="form-control" id="bathrooms">
                </div>
                <div class="form-group">
                    <label for="storeys">Storeys:</label>
                    <input type="number" class="form-control" id="storeys">
                </div>
                <div class="form-group">
                    <label for="garages">Garages:</label>
                    <input type="number" class="form-control" id="garages">
                </div>

                <button class="btn btn-primary" id="ajaxSearchHotels">Search Hotels</button>
            </form>

        </div>
        <div id="result_search" class="col-md-8 panel panel-info" style="display: none"></div>
    </div>
</div>
</body>
</html>