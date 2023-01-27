@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="row">
        <div class="col">
            <h3 class="m-5">AVISO!</h3>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <img src="/img/home.svg" style="width: 300px;" alt="home">
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <h4>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Facilis suscipit atque ea corporis nemo a quia sequi numquam, 
                        sint, labore quo distinctio! Voluptatum dignissimos consectetur in eius. 
                        Excepturi, harum ex.
                    </h4>
                </div>
            </div>            
        </div>        
    </div>

@endsection