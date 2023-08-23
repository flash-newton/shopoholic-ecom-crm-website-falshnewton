@extends('layouts.app')

@section('mycss')
 <link rel="stylesheet" href="../css/slider.css">   
@endsection
@section('content')


@section('content')

    <div class="slider-container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../slider/vege2slider.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../slider/fruitsslider.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../slider/vegeslider.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="slider-content">
            <!-- Add your content here -->
        </div>
        <div class="balls">
            <div class="ball">
                <div class="ballframe">
                    <img src="../slider/balls/salad.png" alt="">
                </div>
            </div>
            <div class="ball">
                <div class="ballframe">
                    <img src="../slider/balls/fish.png" alt="">
                </div>
            </div>
            <div class="ball">
                <div class="ballframe">
                    <img src="../slider/balls/drink.png" alt="">
                </div>
            </div>
            <div class="ball">
                <div class="ballframe">
                    <img src="../slider/balls/vege.png" alt="">
                </div>
            </div>
            <div class="ball">
                <div class="ballframe">
                    <img src="../slider/balls/milk.png" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

@endsection