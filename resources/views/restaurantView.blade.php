@extends('template')
@section('content')
<header class="masthead text-center text-white d-flex smallmast">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                <strong>{{ $res->name }}</strong>
                </h1>
            </div>
        </div>
    </div>
</header>
<div class="container padding50">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading">{{ $res->name }}'s Dishes </h2>
            <h6>{{ $res->address }}</h6>
            <p>{{ $res->description }}</p>
        </div>
    </div>
</div>
<section class="p-0" id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
            @foreach($res->products as $product)
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="/{{ $product->image }}">
                    <img class="img-fluid" src="/{{ $product->image }}" alt="">
                    <div class="portfolio-box-caption">
                        <div class="portfolio-box-caption-content">
                            <div class="project-name">
                                {{ $product->name }}
                            </div>
                            <div class="project-category text-faded">
                                {{ $product->description }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="res-map">
    sada
</div>
@stop