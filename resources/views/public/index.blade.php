@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
@endsection
@section('h1')
    <h1 class="mt-3">Nuestros proyectos</h1>
@endsection
@section('content')
    <div class="container">
        <div class="box brutto perdersi"><img class="img-fluid" src="{{asset('img/1.png')}}" alt=""></div>
        <div class="box bello vivere"><img class="img-fluid" src="{{asset('img/2.png')}}" alt=""></div>
        <div class="box spettacolare vivere"><img class="img-fluid" src="{{asset('img/3.png')}}" alt=""></div>
        <div class="box brutto spettacolare vivere"><img class="img-fluid" src="{{asset('img/4.png')}}" alt=""></div>
        <div class="box perdersi spettacorale brutto"><img class="img-fluid" src="{{asset('img/5.png')}}" alt=""></div>
        <div class="box brutto bello spettacolare vivere perdersi"><img class="img-fluid" src="{{asset('img/6.png')}}" alt=""></div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.submenu-link').on('click', function (e) {

                if($(this).hasClass("text-danger")){
                    $(this).removeClass('text-danger');
                } else {
                    $(this).addClass('text-danger')
                }

                e.preventDefault();
                let name = $(this).prop('id');
                let classSelected = '';
                if (name === "Perdersi all'orizzonte") {
                    classSelected = 'perdersi';
                } else if (name === "Brutto") {
                    classSelected = 'brutto';
                } else if (name === "Bello") {
                    classSelected = 'bello';
                } else if (name === "Spettacolare") {
                    classSelected = 'spettacolare';
                } else if (name === "Vivere bene") {
                    classSelected = 'vivere';
                } else {
                    classSelected = '';
                }
                $('.' + classSelected).each(function (index) {
                    $(this).toggle();
                });
            })
        })
    </script>
@endsection

