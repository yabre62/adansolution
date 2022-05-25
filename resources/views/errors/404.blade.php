@extends('errors::minimal')

{{--@section('title', __('Not Found'))
@section('code', '404')--}}

@section('message')
    <style>
        .for-margin {
            margin: auto;

            margin-bottom: 10%;
        }

        .for-margin {

        }

        .page-not-found {
            margin-top: 30px;
            font-weight: 600;
            text-align: center;
        }
    </style>
    <div class="container ">
        <div class="col-md-3"></div>
        <div class="col-md-6 for-margin">
            <div class="for-image">
                <img style="" src="{{asset("png/404.png")}}" alt="">
            </div>
            <h2 class="page-not-found">Page NoN Trouvée</h2>

            <p style="text-align: center;">We are sorry, the page you requested could not be found <br> Plese go back to
                the homepage</p>
            <div style="text-align: center;">
                <a class="btn btn-primary" href="{{ route('home') }}"> Accueil</a>
            </div>

        </div>
        <div class="col-md-3"></div>
    </div>
@endsection
